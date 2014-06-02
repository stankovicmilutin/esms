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
        
        return View::make("players/profile", array('user' => $user, 'player' => $player));
    }   
}
