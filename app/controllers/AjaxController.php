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
}