<?php

/**
 * For all player related stuff
 */
class PlayerController extends BaseController {

    public function showProfile($id)
    {
        $user = User::find($id);

        if (!$user) {
        	var_dump("baci 404 gresku, user sa ovim id-jem ne postoji");
        	return;
        }

        $player = $user->player;
        
        return View::make("players/profile", array('user' => $user, 'player' => $player));
    }   
}
