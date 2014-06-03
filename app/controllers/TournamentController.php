<?php

/**
 * Description of TournamentController
 *
 * @author Nutic
 */
class TournamentController extends BaseController {
    
    public function allTournaments(){
        $tournaments = Tournament::paginate(5);
        
        return View::make("tournaments/tournaments", array("tournaments" => $tournaments) );
    }
    
    public function tournament($id){
        
        $tournament = Tournament::find($id);
        
        return View::make("tournaments/tournament",array("tournament" => $tournament));
        
    }
}
