<?php

class Tournament extends Eloquent{
    
    protected $primaryKey = "tournamentID";
    protected $table = "tournaments";
    protected $fillable = array("starting","max_teams","name","prizepool","type","reg_open","winnerID","second_place","third_place");

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

    /*public static function appliedTeams($id) {
        return DB::table('tour_applies')
            ->where('tournament', '=', $id)
            ->join('teams', 'tour_applies.team', '=', 'teams.teamID')
            ->select()
            ->get();
    }*/

    public function teams() {
        return $this->belongsToMany('Team', 'tour_applies', 'tournament', 'team')
                    ->withPivot('played')
                    ->withPivot('won')
                    ->withPivot('lost')
                    ->orderBy('won', 'desc');
    }

    public function matches() {
        return $this->hasMany('Match', 'tournamentID', 'tournamentID')
                    ->orderBy('time', 'asc');
    }
}