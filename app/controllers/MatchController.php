<?php

class MatchController extends BaseController{
    
    public function matches(){
        $matches = Match::paginate(10);
        
        return View::make("matches/matches", array("matches" => $matches ));
    }
    
    
}