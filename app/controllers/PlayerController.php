<?php

/**
 * For all player related stuff
 */
class PlayerController extends BaseController {

    public function showProfile($id)
    {
        $user = User::find($id);

        if (!$user)
        	App::abort(404);

        $player = $user->player;
        
        return View::make("players/player", array('user' => $user, 'player' => $player));
    }


    public function showPlayerSettings()
    {
		if (!Auth::check())
			return Redirect::route("index");

		$currentUser = Auth::user();
		$currentPlayer = $currentUser->player;

        return View::make("players/settings", array('user' => $currentUser, 'player' => $currentPlayer));
    }   

    public function saveSettingsData() {
		if (!Auth::check())
			return Redirect::route("index");

    	$currentUser = Auth::user();
		$currentPlayer = $currentUser->player; 

		$currentPlayer->name = Input::get('name');
		$currentPlayer->nick = Input::get('nick');
		$currentPlayer->last_name = Input::get('lastname');
		$currentPlayer->bio = Input::get('about');
		$currentPlayer->position = Input::get('position');
		$currentPlayer->country = Input::get('country');
		$currentPlayer->facebook = Input::get('fbpro');
		$currentPlayer->twitter = Input::get('twpro');
		$currentPlayer->website = Input::get('weblink');

		//DOPRAVI VALIDACIJU ZA SLIKE
		if (Input::hasFile('image')) {
			$file = Input::file('image');

			$destinationPath = public_path() . '/uploads/';
			$filename = str_random(12) . '.' . $file->getClientOriginalExtension(); 
			$extension = $file->getClientOriginalExtension();

			$currentPlayer->avatar = asset('uploads/' . $filename);

		    $file->move($destinationPath, $filename);
		}

		$currentPlayer->save();

        return Redirect::route("playerSettingsView")
            ->with('global-title','Saving complete')
	        ->with('global-text','Your profile info has been saved!')
	        ->with('global-class','success');
    }



    public function allTeams() {
    	$players = Player::playersWithTeams();

        return View::make("players/players", array('players' => $players));    	
    }



    public function newTeamData() {

		if (!Auth::check())
			return Redirect::route("index");

        $validator = Validator::make(Input::all(), array(
                    'teamname' => "required|max:80|min:3|unique:teams,name",
                    'teamtag' => "required|max:20|min:3",
                    'image' => "image|mimes:jpeg,bmp,png|max:512",
                    'twitter' => "url",
                    'facebook' => "url",
                    'website' => "url"
                    )
        );

        if ($validator->fails()) {
            return Redirect::route('playerSettingsView')
                    // Send errors
                    ->withErrors($validator)
                    // Send old inputs
                    ->withInput();
        }
        else {
    		$currentUser = Auth::user();
			$currentPlayer = $currentUser->player;

			$filename = null;
			if (Input::hasFile('image')) {
				$file = Input::file('image');

				$destinationPath = public_path() . '/uploads/';
				$filename = str_random(12) . '.' . $file->getClientOriginalExtension(); 
				$extension = $file->getClientOriginalExtension();

				$currentPlayer->avatar = asset('uploads/' . $filename);

			    $file->move($destinationPath, $filename);
			}

            $newTeam = Team::create(array(
                'name' => Input::get('teamname'),
                'tag' => Input::get('teamtag'),
                'captain' => $currentPlayer->playerID,
                'facebook' => Input::get('facebook'),
                'twitter' => Input::get('twitter'),
                'website' => Input::get('website'),
                'about' => Input::get('about'),
                'avatar' => $filename,
                'country' => Input::get('country')
            ));

            if($newTeam){
	            $currentPlayer->teamID = $newTeam->teamID;
	            $currentPlayer->save();

                return Redirect::route("playerSettingsView")
                        ->with('global-title','Your Team is created')
                        ->with('global-text','You can now invite some players to join your team.')
                        ->with('global-class','success');
            }
            else {
                return Redirect::route("playerSettingsView")
                        ->with('global-title','Team couldn\'t be created.' )
                        ->with('global-text','Internal error, sorry for the inconvienieceee!?')
                        ->with('global-class','error');            	
            }
		}


    }
}
