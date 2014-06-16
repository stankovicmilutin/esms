<?php

class PlayerScore extends Eloquent{
    
    protected $primaryKey = "locID";
    protected $table = "player_scores";
    protected $fillable = array("tournamentID","matchID","playerID","k","d","a","cs","entity");
 
    public function player()
    {
        return $this->belongsTo('Player', 'playerID', 'playerID');
    }   
}