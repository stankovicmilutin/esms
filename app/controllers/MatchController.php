<?php

class MatchController extends BaseController{
    
    public function matches(){        
        //izbegavanje n+1 query problema
        $matches = Match::with('hostTeam')->with('guestTeam')->with('tournament')->orderby('time', 'desc')->paginate(15);

        return View::make("matches/matches", array("matches" => $matches ));
    }
}