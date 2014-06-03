<?php

/*
 * Team related stuff 
 */
class TeamController extends BaseController {
    
    // Display list of teams
    public function allTeams(){
        
        
        $teams = Team::paginate(15);
        
        return View::make("teams/teams", array('teams' => $teams));
    }
    
    
    public function teamProfile($id){
        
        $team = Team::find($id);
      
        
        return View::make("teams/team",array(
            "team" => $team
            ));
    }
    
}