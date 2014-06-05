<?php

class AjaxController extends BaseController {

	public function findPlayers() {
		$name = Input::get("name");
		$teamid = Input::get("teamid");

		$results = Player::where("nick", "like", $name . "%")
						 ->whereNull('teamID')->take(6)->get();

		$res = array();

		foreach ($results as $r) {
			$p['username'] = $r->nick;
			$p['id'] = $r->playerID;

			array_push($res, $p);
		}

		echo json_encode($res);
	}

	public function invitePlayer() {
		$playerid = Input::get("playerid"); 
		$teamid = Input::get('teamid');
		$inviterid = Input::get('inviterid');	

		$invite = PlayerInvite::create(array(
                        'inviter' => $inviterid,
                        'invited' => $playerid,
                        'team' => $teamid,
            ));

		if ($invite) 
			echo 1; 
		else
			echo 0; 
	}
}