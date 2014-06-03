<?php

class AdminController extends BaseController {
    
    
    public function dashboard(){
        return View::make("admin/dashboard");
    }
    
    public function allTournaments(){
        // Same as public profile for tournaments
    }
    
    public function newTournamentView(){
        return View::make("admin/newtournament");
    }
    
    public function newTournamentData(){
        
        $validator = Validator::make(Input::all(), array(
                    'max-teams' => "required|",
                    'name' => "required|max:80|min:4|unique:tournaments",
                    'starts' => "required"
                    ));
        
        if ($validator->fails()){
             return Redirect::route('adminNewTournament')
                    ->withErrors($validator);
        }
        else{
            
            $maxTeams = input::get('max-teams');
            $starting = input::get('starts');
            $name =  input::get('name');
            $prize = input::get('prize');
            $type = input::get('type');
            
            $t = Tournament::create(array(
                'max_teams' => $maxTeams,
                'starting' => $starting,
                'name' => $name,
                'prizepool' => $prize,
                'type' => $type,
                'reg_open' => 1
            ));
            
            $t->save();
            
            
        }
        
    }
}