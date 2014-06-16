<?php

class AdminController extends BaseController {

    public function dashboard() {
        
        $upcomingMatches = Match::with('hostTeam')
                    ->with('guestTeam')
                    ->whereNotNull('host')
                    ->whereNotNull('guest')
                    ->whereNull("winnerID")
                    ->orderby('time', 'asc')
                    ->paginate(5);
        
        $latestMatches = Match::with('hostTeam')
                    ->with('guestTeam')
                    ->whereNotNull('host')
                    ->whereNotNull('guest')
                    ->whereNotNull("winnerID")
                    ->orderby('time', 'asc')
                    ->paginate(5);
        
        return View::make("admin/dashboard", array("upcomingMatches" => $upcomingMatches, "latestMatches" => $latestMatches));
    }

    public function allTournaments() {

        $tournaments = Tournament::paginate(10);

        return View::make("admin/alltournaments", array("tournaments" => $tournaments));
    }

    public function newTournamentView() {
        return View::make("tournaments/create");
    }

    public function newTournamentData() {

        $validator = Validator::make(Input::all(), array(
                    'max-teams' => "required",
                    'name' => "required|max:80|min:3|unique:tournaments",
                    'image' => "image|mimes:jpeg,bmp,png|max:512",
                    'starting' => "required"
        ));

        if ($validator->fails()) {
            return Redirect::route('adminNewTournament')
                            ->withErrors($validator);
        } else {

            if (input::get('type') == "league")
                $type = "League System";
            if (input::get('type') == "knockout")
                $type = "Knockout System";

            $maxTeams = input::get('max-teams');
            $starting = date("Y-m-d", strtotime(input::get('starting')));
            $name = input::get('name');
            $prize = input::get('prize');

            $filename = null;
            if (Input::hasFile('image')) {
                $file = Input::file('image');

                $destinationPath = public_path() . '/uploads/';
                $filename = str_random(12) . '.' . $file->getClientOriginalExtension();
                $extension = $file->getClientOriginalExtension();
                var_dump($filename);
                $file->move($destinationPath, $filename);
            }


            $tournament = Tournament::create(array(
                        'max_teams' => $maxTeams,
                        'starting' => $starting,
                        'name' => $name,
                        'prizepool' => $prize,
                        'cover' => $filename,
                        'type' => $type,
                        'reg_open' => 1
            ));

            if ($tournament) {
                $tournament->save();

                return Redirect::route('adminNewTournament')
                                ->with('global-title', 'Success')
                                ->with('global-text', 'You you have successfully created a new tournament.')
                                ->with('global-class', 'success');
            } else {
                return Redirect::route('adminNewTournament')
                                ->with('global-title', 'Tournament couldn\'t be created.')
                                ->with('global-text', 'Internal error, please contact support.')
                                ->with('global-class', 'error');
            }
        }
    }

    public function saveTournamentData($id) {
        $tour = Tournament::find($id);
        $validator = Validator::make(Input::all(), array(
                    'name' => "required|max:80|min:3|unique:tournaments,name," . $tour->name . ",name",
                    'image' => "image|mimes:jpeg,bmp,png|max:512",
                    'starting' => "required"
        ));

        if ($validator->fails()) {
            return Redirect::route('adminEditTournament', $id)
                            ->withErrors($validator);
        } else {

            $starting = date("Y-m-d", strtotime(input::get('starting')));
            $name = input::get('name');
            $prize = input::get('prize');


            $filename = $tour->cover;
            if (Input::hasFile('image')) {
                $file = Input::file('image');

                $destinationPath = public_path() . '/uploads/';
                $filename = str_random(12) . '.' . $file->getClientOriginalExtension();
                $extension = $file->getClientOriginalExtension();
                var_dump($filename);
                $file->move($destinationPath, $filename);
            }

            $tour->starting = $starting;
            $tour->name = $name;
            $tour->prizepool = $prize;
            $tour->cover = $filename;

            if (Input::get('winner') == -1) 
                $tour->winnerID = NULL;
            else
                $tour->winnerID = Input::get('winner');

            if ($tour->save()) {

                return Redirect::route('adminEditTournament', $id)
                                ->with('global-title', 'Success')
                                ->with('global-text', 'You you have successfully edited this tournament.')
                                ->with('global-class', 'success');
            } else {
                return Redirect::route('adminEditTournament', $id)
                                ->with('global-title', 'Tournament couldn\'t be created.')
                                ->with('global-text', 'Internal error, please contact support.')
                                ->with('global-class', 'error');
            }
        }
    }

    public function editTournamentView($id) {
        $tour = Tournament::find($id);
        $teams = $tour->teams;
        return View::make("tournaments/edit", array("tour" => $tour, 'teams' => $teams));
    }

    public function tourApplies($id) {
        $t = Tournament::find($id);
        $teams = $t->teams;
        $matches = Match::with('hostTeam')->with('guestTeam')->where('tournamentID', '=', $id)->orderby('time', 'asc')->paginate(15);

        return View::make("tournaments/applies", array("teams" => $teams, "tournament" => $t, 'matches' => $matches ));
    }

    public function startTournamentLeague($id) {
        if (!Auth::check())
            return Redirect::route('index')
                            ->with('global-title', 'Error')
                            ->with('global-text', 'Nope.')
                            ->with('global-class', 'error');           

        $tour = Tournament::find($id);
        
        if ($tour->reg_open == 0)
            return Redirect::route('adminTournamentApplies', $id)
                            ->with('global-title', 'Error')
                            ->with('global-text', 'Tournament Already Started!')
                            ->with('global-class', 'error'); 

        $teams = $tour->teams;
        $teamsNumber = count($teams);

        if ($teamsNumber % 2 != 0)
            die("trenutno radim samo za paran broj timova");

        $generatedMatches = array();

        /**
         * round robin algoritam
         * trenutno radi samo za paran broj timova
         */
        for ($k = 1; $k < $teamsNumber; $k++) {
            //echo "</br></br>Round " . $k . "</br>";
            //pamti meceve za ovu rundu
            for ($i = 0; $i < ($teamsNumber / 2); $i++) {
                //echo $teams[$i]->name . ' vs ' . $teams[($teamsNumber/2)+$i]->name. "<br/>"; 
                array_push($generatedMatches, array('host' => $teams[$i]->teamID,
                    'guest' => $teams[($teamsNumber / 2) + $i]->teamID,
                    'time' => date('Y-m-d H:i:s', strtotime($tour->starting . ' + ' . ($k - 1) . ' day')),
                    'tournamentID' => $tour->tournamentID,
                    'tournament_phase' => 'League Match'
                ));
            }

            //shiftuj niz za stampaje sledecih rundi
            for ($i = 1; $i < $teamsNumber - 1; $i++) {
                if (($i + 2) == $teamsNumber) {
                    $pom = $teams[1];
                    $teams[1] = $teams[$teamsNumber - 1];
                    $teams[$teamsNumber - 1] = $pom;
                } else {
                    $pom = $teams[$i];
                    $teams[$i] = $teams[$i + 1];
                    $teams[$i + 1] = $pom;
                }
            }
        }

        if (DB::table("matches")->insert($generatedMatches)) {
            $tour->reg_open = 0;
            $tour->save();

            return Redirect::route('adminTournamentApplies', $id)
                            ->with('global-title', 'Success')
                            ->with('global-text', 'Matches succesffully generated.')
                            ->with('global-class', 'success');
        } else {
            return Redirect::route('adminTournamentApplies', $id)
                            ->with('global-title', 'Error')
                            ->with('global-text', 'Internal error, matches couldn\'t be generated.')
                            ->with('global-class', 'error');
        }

    }

    public function startTournamentKnock($id) {
        if (!Auth::check())
            return Redirect::route('index')
                            ->with('global-title', 'Error')
                            ->with('global-text', 'Nope.')
                            ->with('global-class', 'error');         


        $tour = Tournament::find($id);

        if ($tour->reg_open == 0)
            return Redirect::route('adminTournamentApplies', $id)
                            ->with('global-title', 'Error')
                            ->with('global-text', 'Tournament Already Started!')
                            ->with('global-class', 'error');   

        $teams = $tour->teams;
        $teamsNumber = count($teams);

        $brFaza = log($teamsNumber, 2)-1;

        $finalMatch = Match::create(array(
                "tournamentID" => $tour->tournamentID,
                "tournament_phase" => "Finals",
                'time' => date('Y-m-d H:i:s', strtotime($tour->starting . ' + ' . $brFaza . ' day'))
        ));
        $tour->reg_open = 0;
        $tour->save();

        EsmsHelper::genFaze($teams, $tour, $finalMatch->matchID, $brFaza, 1);

        return Redirect::route('adminTournamentApplies', $id)
                        ->with('global-title', 'Success')
                        ->with('global-text', 'Matches succesffully generated.')
                        ->with('global-class', 'success');
    }


    public function editMatch($id) {
        $match = Match::with('hostTeam')->with('guestTeam')->find($id);

        if ($match->hostTeam && $match->guestTeam) {
            $match->playersHost = Player::where('teamID', '=', $match->hostTeam->teamID)
                                        ->with(array ('scores' => function($query) use ($id) {
                                            $query->where('matchID', '=', $id);
                                        }))
                                        ->get();
            $match->playersGuest = Player::where('teamID', '=', $match->guestTeam->teamID) 
                                        ->with(array ('scores' => function($query) use ($id)  {
                                            $query->where('matchID', '=', $id);
                                        }))
                                        ->get();
        }

        //if (isset($match->playersHost[0]->scores)) echo true; echo false;die();
        return View::make("admin/admineditmatch", array("match" => $match));
    }

    public function saveMatchInfo($id) {
        $match = Match::find($id);
        $match->time = Input::get('datetime');
        $parents = Match::where('child_match_a', '=', $id)->where('child_match_B', '=', $id, 'OR')->get();


        $winnerID = Input::get('winner');

        if (Input::get('winner') == '-1') {
            if ($match->winnerID) {
                $applyH = TourApply::where('team', '=', $match->host)->where('tournament', '=', $match->tournamentID, 'AND')->get();
                $applyG = TourApply::where('team', '=', $match->guest)->where('tournament', '=', $match->tournamentID, 'AND')->get();
                $applyH = $applyH[0]; $applyG = $applyG[0];
                if ($match->winnerID == $match->host) {
                    $applyH->played--;
                    $applyH->won--;
                    $applyG->played--;
                    $applyG->lost--;
                } elseif ($match->winnerID == $match->guest) {
                    $applyH->played--;
                    $applyH->lost--;
                    $applyG->played--;
                    $applyG->won--;                    
                }
                $applyG->save();
                $applyH->save();
            }

            $match->winnerID = NULL;
            $match->save();

            //set match participants in parent match (for knockout tour)
            foreach ($parents as $parent) {
                if ($parent && $parent->child_match_a == $id) {
                    $parent->host = NULL;
                    $parent->save();
                } elseif ($parent && $parent->child_match_b == $id) {
                    $parent->guest = NULL;
                    $parent->save();
                }
            }
        }
        else {
            if ($match->winnerID) {
                $applyH = TourApply::where('team', '=', $match->host)->where('tournament', '=', $match->tournamentID, 'AND')->get();
                $applyG = TourApply::where('team', '=', $match->guest)->where('tournament', '=', $match->tournamentID, 'AND')->get();
                $applyH = $applyH[0]; $applyG = $applyG[0];
                if (Input::get('winner') == $match->host && $match->winnerID == $match->guest) {
                    //$applyH->played--;
                    //$applyH->played--;
                    $applyH->lost--;
                    $applyH->won++;
                    //$applyG->played--;
                    $applyG->lost++;
                    $applyG->won--;
                } elseif (Input::get('winner') == $match->guest && $match->winnerID == $match->host) {
                    //$applyH->played--;
                    $applyH->lost++;
                    $applyH->won--;
                    //$applyG->played--;
                    $applyG->lost--;
                    $applyG->won++;               
                }
                $applyG->save();
                $applyH->save();
            } else {
                $applyH = TourApply::where('team', '=', $match->host)->where('tournament', '=', $match->tournamentID, 'AND')->get();
                $applyG = TourApply::where('team', '=', $match->guest)->where('tournament', '=', $match->tournamentID, 'AND')->get();
                $applyH = $applyH[0]; $applyG = $applyG[0];
                if (Input::get('winner') == $match->host) {
                    $applyH->played++;
                    $applyH->won++;
                    $applyG->played++;
                    $applyG->lost++;
                } elseif (Input::get('winner') == $match->guest) {
                    $applyH->played++;
                    $applyH->lost++;
                    $applyG->played++;
                    $applyG->won++;                    
                }
                $applyG->save();
                $applyH->save();                
            }
            $match->winnerID = $winnerID;
            $match->save();

            //set match participants in parent match (for knockout tour)
            foreach ($parents as $parent) {
                if ($parent && $parent->child_match_a == $id) {
                    $parent->host = $match->host;
                    $parent->save();
                } elseif ($parent && $parent->child_match_b == $id) {
                    $parent->guest = $match->guest;
                    $parent->save();
                }
            }
        }

        return Redirect::route('adminEditMatch', $id)
                        ->with('global-title', 'Success')
                        ->with('global-text', 'Match succesffully saved')
                        ->with('global-class', 'success');    
    }

    function savePlayerStats($matchID, $tourID) {
        $stats = Input::get('stats');

        //delete existing
        $scoresDeleted = PlayerScore::where('matchID', '=', $matchID)->delete();

        $playerscores = array();

        foreach ($stats as $playerid => $stat) {
            array_push($playerscores, array(
                'tournamentID' => $tourID,
                'matchID' => $matchID,
                'playerID' => $playerid,
                'k' => $stat['kills'],
                'cs' => $stat['cs'],
                'd' => $stat['deaths'],
                'a' => $stat['asssts'],
                'entity' => $stat['hero']
            ));
        }

        DB::table("player_scores")->insert($playerscores);

        return Redirect::route('adminEditMatch', $matchID)
                        ->with('global-title', 'Success')
                        ->with('global-text', 'Match succesffully saved')
                        ->with('global-class', 'success');    
    }
}
