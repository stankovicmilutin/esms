<?php

class Team extends Eloquent {

    protected $primaryKey = 'teamID';
    
    protected $table = 'teams';
    
    protected $fillable = array ('tag','name','captain','facebook','twiter','website','about' );
    
    public function getCaptain() 
    {
        return $this->hasOne('Player', 'playerID', 'captain');
    }

    public function getPlayers()
    {
        $players = Player::where("teamID","=",  $this->teamID)->get();
        
        return $players;
    }
  
}
