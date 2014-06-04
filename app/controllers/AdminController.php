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
        return View::make("admin/newtournament");
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
}