<?php

class AdminController extends BaseController {
    
    
    public function dashboard(){
        return View::make("admin/dashboard");
    }
    
    public function allTournaments(){
        
        $tournaments = Tournament::paginate(10);
        
        return View::make("admin/alltournaments", array("tournaments" => $tournaments) );
    }
    
    public function newTournamentView(){
        return View::make("tournaments/create");
    }
    
    public function newTournamentData(){
        
        $validator = Validator::make(Input::all(), array(
                    'max-teams' => "required",
                    'name' => "required|max:80|min:3|unique:tournaments",
                    'image' => "image|mimes:jpeg,bmp,png|max:512",
                    'starting' => "required"
                    ));
        
        if ($validator->fails()){
             return Redirect::route('adminNewTournament')
                    ->withErrors($validator);
          
        }
        else{
           
            if ( input::get('type') == "league") $type="League System";
            if ( input::get('type') == "knockout") $type="Knockout system";
           
            $maxTeams = input::get('max-teams');
            $starting = date("Y-m-d",  strtotime(input::get('starting')));
            $name =  input::get('name');
            $prize = input::get('prize');
            
            $filename = null;
            if (Input::hasFile('image')) {
                $file = Input::file('image');

                $destinationPath = public_path() . '/uploads/';
                $filename = str_random(12) . '.' . $file->getClientOriginalExtension();
                $extension = $file->getClientOriginalExtension();

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
            
           if($tournament){
	        $tournament->save();

                return Redirect::route('adminNewTournament')
                        ->with('global-title','Success')
                        ->with('global-text','You you have successfully created a new tournament.')
                        ->with('global-class','success');
            }
            else {
                return Redirect::route('adminNewTournament')
                        ->with('global-title','Tournament couldn\'t be created.' )
                        ->with('global-text','Internal error, please contact support.')
                        ->with('global-class','error');            	
            }  
            
        }
        
    }

    public function editTournamentView($id) {
        $tour = Tournament::find($id);
        return View::make("tournaments/edit", array("tour" => $tour) );
    }
    
    public function tourApplies($id){
        $t = Tournament::find($id);
        $teams = $t->teams;

       return View::make("tournaments/applies", array("teams" => $teams, "tournament" => $t));
    }


    public function startTournament($id) {
        $tour = Tournament::find($id);
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
            for ($i = 0; $i < ($teamsNumber/2); $i++)
            {
                //echo $teams[$i]->name . ' vs ' . $teams[($teamsNumber/2)+$i]->name. "<br/>"; 
                array_push($generatedMatches, array('host' => $teams[$i]->teamID,
                                                    'guest' => $teams[($teamsNumber/2)+$i]->teamID,
                                                    'time' => date('Y-m-d H:i:s', strtotime($tour->starting . ' + '.($k-1).' day')),
                                                    'tournamentID' => $tour->tournamentID
                                                    ));
            }

            //shiftuj niz za stampaje sledecih rundi
            for ($i = 1; $i < $teamsNumber-1; $i++) {
                if (($i+2) == $teamsNumber) {
                    $pom = $teams[1];
                    $teams[1] = $teams[$teamsNumber-1];
                    $teams[$teamsNumber-1] = $pom;
                } else {
                    $pom = $teams[$i];
                    $teams[$i] = $teams[$i+1];
                    $teams[$i+1] = $pom;
                }
            }
        }

        if (DB::table("matches")->insert($generatedMatches)) {
            $tour->reg_open = 0;
            $tour->save();

            return Redirect::route('adminTournamentApplies', $id)
                    ->with('global-title','Success' )
                    ->with('global-text','Matches succesffully generated.')
                    ->with('global-class','success');    
        }
        else {
            return Redirect::route('adminTournamentApplies', $id)
                    ->with('global-title','Error' )
                    ->with('global-text','Internal error, matches couldn\'t be generated.')
                    ->with('global-class','error');    
        }
    }

}