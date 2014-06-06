<?php

class Match extends Eloquent {
    
    protected $primaryKey = "matchID";
    protected $fillable = array('host', 'guest', 'winnerID', 'time', 'tournamentID','tournament_phase');
    protected $table = "matches";
    
   
    //wat wat
    //ovo dobrises, mislim da vise nigde ga ne koristimo sad
    public function loadData(){
        $this->host = Team::find($this->host);
        $this->guest = Team::find($this->guest);
        $this->winner = Team::find($this->winner);
        $this->tournament = Tournament::find($this->tournamentID); 
    }

    public function hostTeam() {
		return $this->hasOne('Team', 'teamID', 'host');    	
    }

    public function guestTeam() {
		return $this->hasOne('Team', 'teamID', 'guest');    	
    }
    
    public function tournament()
    {
        return $this->belongsTo('Tournament', 'tournamentID');
    }

}
