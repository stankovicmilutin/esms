<?php

class MatchController extends BaseController{
    
    public function matches(){        
        //izbegavanje n+1 query problema
        $matches = Match::with('hostTeam')->with('guestTeam')->with('tournament')->orderby('time', 'desc')->paginate(15);

        return View::make("matches/matches", array("matches" => $matches ));
    }

    public function match($id) {
    	$match = Match::with('hostTeam')->with('guestTeam')->with('tournament')->find($id);
    	if (!$match)
    		App::abort(404);

        if ($match->hostTeam) {
            $match->playersHost = Player::where('teamID', '=', $match->hostTeam->teamID)
                                        ->with(array ('scores' => function($query) use ($id) {
                                            $query->where('matchID', '=', $id);
                                        }))
                                        ->get();
        }

        if ($match->guestTeam) {
            $match->playersGuest = Player::where('teamID', '=', $match->guestTeam->teamID) 
                                        ->with(array ('scores' => function($query) use ($id)  {
                                            $query->where('matchID', '=', $id);
                                        }))
                                        ->get();
		}   

		//var_dump($match->playersHost[0]); die();                                     


    	$scores = PlayerScore::with('player')->where('matchID', '=', $id)->get();

    	return View::make("matches/match", array("match" => $match, 'scores' => $scores ));
    }
}