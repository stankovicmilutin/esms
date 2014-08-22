<?php

/**
 * For all player related stuff
 */
class PlayerController extends BaseController {

    public function showProfile($id) {
      
        $player = Player::find($id);
        $team = null;
        if ($player->teamID)
            $team = Team::find($player->teamID);

        return View::make("players/player", array( 'player' => $player, 'team' => $team));
    }

    // Player profile edit view
    public function editPlayerProfileView($id) {
        if (Auth::user()->player->playerID == $id) {
            $player = Player::find($id);
            return View::make("players/edit", array("player" => $player));
        }
        else
            return Redirect::route("player-profile", Auth::user()->player->playerID)
                        ->with('global-title', 'Access denied')
                        ->with('global-text', 'You have no permission to edit other profiles!')
                        ->with('global-class', 'danger');
    }

    // Account setting acctually
    public function showPlayerSettings() {
        if (!Auth::check())
            return Redirect::route("index");

        $currentUser = Auth::user();
        $currentPlayer = $currentUser->player;

        $team = null;
        if ($currentPlayer->teamID)
            $team = Team::find($currentPlayer->teamID);

        return View::make("players/settings", array('user' => $currentUser, 'player' => $currentPlayer, 'team' => $team));
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

        
        if (Input::hasFile('image')) {
            $file = Input::file('image');

            $destinationPath = public_path() . '/uploads/';
            $filename = str_random(12) . '.' . $file->getClientOriginalExtension();
            $extension = $file->getClientOriginalExtension();

            $currentPlayer->avatar = $filename;

            $file->move($destinationPath, $filename);
        }

        $currentPlayer->save();

        return Redirect::route("player-profile", $currentPlayer->playerID)
                        ->with('global-title', 'Saving complete')
                        ->with('global-text', 'Your profile info has been saved!')
                        ->with('global-class', 'success');
    }

    public function allTeams() {
        $players = Player::playersWithTeams();

        return View::make("players/players", array('players' => $players));
    }

    public function myInvitesView() {
        $player = Auth::user()->player;
        $player->getInvites();


        return View::make("players/myinvites", array("invites" => $player->invites));
    }

    public function answerInvite($id, $answer) {

        $invite = PlayerInvite::find($id);

        $player = Auth::user()->player;

        if (($invite->invited == $player->playerID) && ($answer == "accept" || $answer == "decline")) {

            if ($answer == "accept") {
                $player->teamID = $invite->team;
                $player->save();
                $invite->delete();
                PlayerInvite::where("invited", "=", $player->playerID)->delete();
                return Redirect::route('team', $player->teamID)
                                ->with('global-title', 'Congratulations!')
                                ->with('global-text', 'You have successfully joined your new team!')
                                ->with('global-class', 'success');
            } else {
                $invite->delete();
                return Redirect::route('my-invites')
                                ->with('global-title', 'Team invite declined!')
                                ->with('global-text', 'You have declined joining team!')
                                ->with('global-class', 'success');
            }
        } else {
            return Redirect::route('index')
                            ->with('global-title', 'Access denied')
                            ->with('global-text', 'If you belive this was an error, please contact support!')
                            ->with('global-class', 'danger');
        }
    }

}
