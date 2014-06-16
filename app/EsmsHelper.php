<?php
	class EsmsHelper {

    /**
     * rekurzivno generise stablo (bracket) turnira za cuvanje u bazi
     * @param  EloquentCollection $teams       = lista modela timova
     * @param  EloquentModel $tournament       = model turnira
     * @param  int $caleID                     = roditeljski mec ID
     * @param  int $brFaza                     = faza takmicenja 
     * @param  int $trenutnaFaza [description] = faza koja se trenutno obradjuje
     * @return void
     */
    public static function genFaze($teams, $tournament, $caleID, $brFaza, $trenutnaFaza) {
        //odredi fazu turnira

        if (($brFaza - $trenutnaFaza) == 1)
            $phase = "Semi-Final";
        elseif (($brFaza - $trenutnaFaza) == 0)
            $phase = "Quarter-Final";
        else
            $phase = ($brFaza - $trenutnaFaza +1) . ". round";


        if ($trenutnaFaza < $brFaza) {
            $newMatchA = Match::create(array('time' => date('Y-m-d H:i:s', strtotime($tournament->starting . ' + ' . ($brFaza - $trenutnaFaza) . ' day')),
                            'tournamentID' => $tournament->tournamentID,
                            "tournament_phase" => $phase
                        ));

            $newMatchB = Match::create(array('time' => date('Y-m-d H:i:s', strtotime($tournament->starting . ' + ' . ($brFaza - $trenutnaFaza)  . ' day')),
                            'tournamentID' => $tournament->tournamentID,
                            "tournament_phase" => $phase
                        ));

            //dodaj decu caletu
            $parMatch = Match::find($caleID);
            $parMatch->child_match_a = $newMatchA->matchID;
            $parMatch->child_match_b = $newMatchB->matchID;
            $parMatch->save();

            $trenutnaFaza++;
            self::genFaze($teams, $tournament, $newMatchA->matchID, $brFaza, $trenutnaFaza);
            self::genFaze($teams, $tournament, $newMatchB->matchID, $brFaza, $trenutnaFaza);
        } else {
            $newMatchA = Match::create(array('time' => date('Y-m-d H:i:s', strtotime($tournament->starting . ' + ' . ($brFaza - $trenutnaFaza)  . ' day')),
                            'tournamentID' => $tournament->tournamentID,
                            'host' => $teams[0]->teamID,
                            'guest' => $teams[1]->teamID,
                            "tournament_phase" => $phase
                        ));

            //izbaci prvi i drugi tim iz liste timova
            $teams->shift();
            $teams->shift();

            $newMatchB = Match::create(array('time' => date('Y-m-d H:i:s', strtotime($tournament->starting . ' + ' . ($brFaza - $trenutnaFaza)  . ' day')),
                            'tournamentID' => $tournament->tournamentID,
                            'host' => $teams[0]->teamID,
                            'guest' => $teams[1]->teamID,
                            "tournament_phase" => $phase
                        ));

            //izbaci prvi i drugi tim iz liste timova
            $teams->shift();
            $teams->shift();

            //dodaj decu caletu
            $parMatch = Match::find($caleID);
            $parMatch->child_match_a = $newMatchA->matchID;
            $parMatch->child_match_b = $newMatchB->matchID;
            $parMatch->save();
        }
    }

}