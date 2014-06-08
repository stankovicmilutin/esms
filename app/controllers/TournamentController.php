<?php

/**
 * Description of TournamentController
 *
 * @author Nutic
 */
class TournamentController extends BaseController {
    
    public function allTournaments(){
        $tournaments = Tournament::paginate(5);
        if ( Auth::check())
            $currentPlayer = Auth::user()->player;
        else
            $currentPlayer = null;
        return View::make("tournaments/tournaments", array("tournaments" => $tournaments, "currentPlayer" => $currentPlayer) );
    }
    
    public function tournament($id){
        
        $tournament = Tournament::find($id);
        $teams = $tournament->teams;

        //ovakvo ucitavanje da se izbegne N+1 query problem
        //tj da se ne ucitava za svaki mec away team i guest team posebno 
        $matches = Match::with('hostTeam')->with('guestTeam')->where('tournamentID', '=', $id)->orderby('time', 'asc')->paginate(15);
        //var_dump($matches[0]->hostTeam);die();

        if ( Auth::check())
            $currentPlayer = Auth::user()->player;
        else
            $currentPlayer = null;
        return View::make("tournaments/tournament",array("tournament" => $tournament, 
                                                        "currentPlayer" => $currentPlayer, 
                                                        "teams" => $teams,
                                                        "matches" => $matches));
    }
    
    public function applyTeam($tournamentID){
        
        $teamID = Auth::user()->player->teamID;
        
        $check = TourApply::where("tournament", "=", $tournamentID)->where("team", "=", $teamID)->get();
        if($check->count() == 0)
        {
            $apply = TourApply::create(array(
               "tournament" => $tournamentID,
               "team" => $teamID
            ));
        
            if ($apply ){
                return Redirect::route('tournament', $tournamentID)
                                ->with('global-title', 'Success')
                                ->with('global-text', 'You have successfuly applied your team for this tournament!')
                                ->with('global-class', 'success');
            }
            else {
                return Redirect::route('index')
                                ->with('global-title', 'Error')
                                ->with('global-text', 'You have encountered an error. Please contact support!')
                                ->with('global-class', 'danger');
            }
        }
        else{
            return Redirect::route('tournament', $tournamentID)
                                ->with('global-title', 'You are already applied')
                                ->with('global-text', 'Your team is already applied for this tournament!')
                                ->with('global-class', 'warning');
        }
    }
}
