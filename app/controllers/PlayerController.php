<?php

/**
 * For all player related stuff
 */
class PlayerController extends BaseController {

    public function showProfile($id)
    {
        //$player = player::find($id);
    	//var_dump(Route::getCurrentRoute());
        return View::make("players/profile");
    }   
}
