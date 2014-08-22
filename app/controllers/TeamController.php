<?php

class TeamController extends BaseController {

    // Display list of teams
    public function allTeams() {


        $teams = Team::paginate(15);
        return View::make("teams/teams", array('teams' => $teams));
    }

    public function teamProfile($id) {

        $team = Team::find($id);
        
        $matches = Match::whereNotNull('winnerID')
                        ->where("host", "=",$id)
                        ->orWhere("guest","=",$id)
                        ->with('hostTeam')
                        ->with('guestTeam')
                        ->orderby('matchID', 'desc')
                        ->paginate(5);
        

        $team->won = Match::where('winnerID', '=', $id)->count();
        $team->lost = Match::whereNotNull('winnerID')
                            ->where('winnerID', '!=', $id)
                            ->where(function($query) use($id){
                                $query->where("host", "=",$id)
                                        ->orWhere("guest","=",$id);  
                            })
                            ->count();
        
        $total = $team->won + $team->lost;
       
        
        if($total == 0)
            $wr = 0;
        else
            $wr =  $team->won/$total*100; 
       
       
        $captain = false;
        $currentUser = null;
        $currentPlayer = null;

        if (Auth::check()) {
            $currentUser = Auth::user();
            $currentPlayer = $currentUser->player;

            if ($currentPlayer->playerID == $team->captain)
                $captain = true;
        }
        
        return View::make("teams/team", array(
                    'user' => $currentUser, 
                    'player' => $currentPlayer, 
                    'team' => $team, 
                    'captain' => $captain,
                    'matches' => $matches,
                    'wr' => $wr
                ));
    }

    public function createData() {

        $validator = Validator::make(Input::all(), array(
                    'teamname' => "required|max:80|min:3|unique:teams,name",
                    'teamtag' => "required|max:20|min:3",
                    'image' => "image|mimes:jpeg,bmp,png|max:512"
                        )
        );

        if ($validator->fails()) {
            return Redirect::route('createNewTeam')
                            // Send errors
                            ->withErrors($validator)
                            // Send old inputs
                            ->withInput();
        } else {
            $currentUser = Auth::user();
            $currentPlayer = $currentUser->player;

            $filename = null;
            if (Input::hasFile('image')) {
                $file = Input::file('image');

                $destinationPath = public_path() . '/uploads/';
                $filename = str_random(12) . '.' . $file->getClientOriginalExtension();
                $extension = $file->getClientOriginalExtension();

                $file->move($destinationPath, $filename);
            }

            //parse urls
            $parsed = parse_url(Input::get('facebook'));
            if (empty($parsed['scheme'])) 
                $facebook = 'http://' . ltrim(Input::get('facebook'), '/');
            else
                $facebook = Input::get('facebook'); 

            $parsed = parse_url(Input::get('twitter'));
            if (empty($parsed['scheme'])) 
                $twitter = 'http://' . ltrim(Input::get('twitter'), '/');
            else
                $twitter = Input::get('twitter'); 
            
            $parsed = parse_url(Input::get('website'));
            if (empty($parsed['scheme'])) 
                $website = 'http://' . ltrim(Input::get('website'), '/');
            else
                $website = Input::get('website'); 

            $newTeam = Team::create(array(
                        'name' => Input::get('teamname'),
                        'tag' => Input::get('teamtag'),
                        'captain' => $currentPlayer->playerID,
                        'facebook' => $facebook,
                        'twitter' => $twitter,
                        'website' => $website,
                        'about' => Input::get('about'),
                        'avatar' => $filename,
                        'country' => Input::get('country')
            ));

            if ($newTeam) {
                $currentPlayer->teamID = $newTeam->teamID;
                $currentPlayer->save();

                return Redirect::route("team", $newTeam->teamID)
                                ->with('global-title', 'Your Team is created')
                                ->with('global-text', 'You can now invite some players to join your team.')
                                ->with('global-class', 'success');
            } else {
                return Redirect::route("createNewTeam")
                                ->with('global-title', 'Team couldn\'t be created.')
                                ->with('global-text', 'Internal error, sorry for the inconvenience. Please contact support.')
                                ->with('global-class', 'error');
            }
        }
    }

    public function createView() {
        
        $currentUser = Auth::user();
        $currentPlayer = $currentUser->player;
        
         if ($currentPlayer->teamID) {
             return Redirect::route("team", $currentPlayer->teamID)
                        ->with('global-title', 'You have team already!')
                        ->with('global-text', 'You are in a team at the moment. You can not be in two teams in same time. Please leave your team, and try again!')
                        ->with('global-class', 'success');
         }
        else{
           return View::make("teams/create");
        }
    }
    
    public function editView($id){
        
        $team = Team::find($id);
        $player = Auth::user()->player;
        $teamPlayers = Player::where('teamID', '=', $id)->get();
        
        if ( $player->teamID == $id && $team->captain == $player->playerID )
        {
            return View::make("teams/edit", array( "team" => $team, "captain" => $player, "teamPlayers" => $teamPlayers));
        }
        else {
            return Redirect::route("index")
                        ->with('global-title', 'Error!')
                        ->with('global-text', 'You have no permission to edit this team! If you belive this is an error, please contact support!')
                        ->with('global-class', 'danger');
         }
    }

    public function editData($id) {
        $team = Team::find($id);
        $player = Auth::user()->player;

        if ( $player->teamID == $id && $team->captain == $player->playerID )
        {
            $validator = Validator::make(Input::all(), array(
                        'teamname' => "required|max:80|min:3|unique:teams,name," . $team->name . ",name",
                        'teamtag' => "required|max:20|min:3",
                        'image' => "image|mimes:jpeg,bmp,png|max:512"
                            )
            );

            if ($validator->fails()) {
                return Redirect::route('editTeamView', $id)
                                // Send errors
                                ->withErrors($validator)
                                // Send old inputs
                                ->withInput();
            } else {
                $currentUser = Auth::user();
                $currentPlayer = $currentUser->player;

                //$filename = null;
                if (Input::hasFile('image')) {
                    $file = Input::file('image');

                    $destinationPath = public_path() . '/uploads/';
                    $filename = str_random(12) . '.' . $file->getClientOriginalExtension();
                    $extension = $file->getClientOriginalExtension();

                    $file->move($destinationPath, $filename);

                    $team->avatar = $filename;
                }

                //parse urls
                $parsed = parse_url(Input::get('facebook'));
                if (empty($parsed['scheme'])) 
                    $facebook = 'http://' . ltrim(Input::get('facebook'), '/');
                else
                    $facebook = Input::get('facebook'); 

                $parsed = parse_url(Input::get('twitter'));
                if (empty($parsed['scheme'])) 
                    $twitter = 'http://' . ltrim(Input::get('twitter'), '/');
                else
                    $twitter = Input::get('twitter'); 
                
                $parsed = parse_url(Input::get('website'));
                if (empty($parsed['scheme'])) 
                    $website = 'http://' . ltrim(Input::get('website'), '/');
                else
                    $website = Input::get('website'); 

                $team->name = Input::get('teamname');
                $team->tag = Input::get('teamtag');
                //$team->captain = $currentPlayer->playerID,
                $team->facebook = $facebook;
                $team->twitter = $twitter;
                $team->website = $website;
                $team->about = Input::get('about');
                $team->country = Input::get('country');


                if ($team->save()) {
                    //$currentPlayer->teamID = $newTeam->teamID;
                    //$currentPlayer->save();

                    return Redirect::route('editTeamView', $id)
                                    ->with('global-title', 'Success')
                                    ->with('global-text', 'Team changes are saved.')
                                    ->with('global-class', 'success');
                } else {
                    return Redirect::route('editTeamView', $id)
                                    ->with('global-title', 'Team settings couldn\'t be saved.')
                                    ->with('global-text', 'Internal error, sorry for the inconvenience. Please contact support.')
                                    ->with('global-class', 'error');
                }
            }            
        }
        else{
            return Redirect::route("index")
                        ->with('global-title', 'Error!')
                        ->with('global-text', 'You have no permission to edit this team! If you belive this is an error, please contact support!')
                        ->with('global-class', 'danger');
        
        }        
    }

    public function removePlayer($id) {
        $playerId = Input::get("playerForRemove");

        $player = Player::find($playerId);

        //proveri da nije mrckao po inputi
        if ($player->teamID != $id ) {
            return Redirect::route('index')
                            ->with('global-title', 'Error')
                            ->with('global-text', 'That is not allowed!')
                            ->with('global-class', 'error');
        } else {
            $player->teamID = null;
            $player->save();
                    return Redirect::route('editTeamView', $id)
                                    ->with('global-title', 'Success')
                                    ->with('global-text', 'Player is not in your team anymore')
                                    ->with('global-class', 'success');
        }
    }

    public function disbandTeam($id) {
        $team = Team::find($id);
        $player = Auth::user()->player;
        $teamPlayers = Player::where('teamID', '=', $id)->get();

        if ($team->captain != $player->playerID) {
            return Redirect::route('index')
                            ->with('global-title', 'Error')
                            ->with('global-text', 'Only captains can disband teams!')
                            ->with('global-class', 'error');
        } else {
            $team->captain = null;

            foreach ($teamPlayers as $teamPlayer) {
                $teamPlayer->teamID = null;

                $teamPlayer->save();
            }

            $team->save();

            return Redirect::route('index')
                            ->with('global-title', 'Success')
                            ->with('global-text', 'Team successfully disbanded.')
                            ->with('global-class', 'success');
        }
    }

    public function leaveTeam() {
        $player = Auth::user()->player;

        $player->teamID = NULL;

        $player->save();

        return Redirect::route('player-profile', $player->userID)
                        ->with('global-title', 'Success')
                        ->with('global-text', 'You have left the team.')
                        ->with('global-class', 'success');
    }

    public function changeCaptain($id, $teamid) {

        $team = Team::find($teamid);
        $player = Auth::user()->player;
        $newCap = Player::find($id);

        if ($team->captain != $player->playerID || $newCap->teamID != $team->teamID ) {
            return Redirect::route('index')
                            ->with('global-title', 'Error')
                            ->with('global-text', 'You can\'t do that')
                            ->with('global-class', 'error');
        } else {
            $team->captain = $id;
            $team->save();

            return Redirect::route('team', $teamid)
                            ->with('global-title', 'Success')
                            ->with('global-text', 'Captain successfully changed!')
                            ->with('global-class', 'success');
        }
    }

}
