<?php

class Match extends Eloquent {
    
    protected $primaryKey = "matchID";
    protected $fillable = array('host', 'gues', 'winnerID', 'time', 'tournamentID','tournament_phase');
    protected $table = "matches";
    
   
    
    public function loadData(){
        $this->host = Team::find($this->host);
        $this->guest = Team::find($this->guest);
        $this->winner = Team::find($this->winner);
        $this->tournament = Tournament::find($this->tournamentID); 
    }
    
}
