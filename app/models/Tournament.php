<?php

class Tournament extends Eloquent{
    
    protected $primaryKey = "tournamentID";
    protected $table = "tournaments";
    protected $fillable = array("starting","max_teams","name","prizepool","reg_open","winnerID","second_place","third_place");

    public function open(){
        $this->reg_open = 1;
        $this->save();
    }
    
    public function close(){
        $this->reg_open = 0;
        $this->save();
    }
    
    public function getWinner(){
        if ($this->winnerID != NULL)
            $this->winner = Team::find($this->winnerID);
        else
            $this->winner = "No winner";
        return $this->winner;
    }
    
}