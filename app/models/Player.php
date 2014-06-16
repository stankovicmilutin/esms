<?php

class Player extends Eloquent {

    protected $table = 'players';
    protected $primaryKey = 'playerID';
    protected $fillable = array('userID', 'name', 'last_name', 'teamID', 'bio', 'country', 'facebook', 'twiter', 'website');

    public function user() {
        return $this->belongsTo('User', 'userID', 'userID');
    }

    public static function playersWithTeams() {
		return DB::table('players')
            ->join('teams', 'players.teamID', '=', 'teams.teamID')
            ->select('players.*', 'teams.name as teamName')
            ->paginate(15);
    }
    
    public function getInvites(){
        
        $this->invites = PlayerInvite::getInvites($this->playerID);
        return $this->invites;
    }
    
    public function getTeam(){
        return Team::find($this->teamID);
    }
    
    public function isCaptain(){
        
        if ( $this->teamID != null){
            $team = Team::find($this->teamID);
            if ($team->captain == $this->playerID)
                return true;
            else
                return false;
        }
        else
            return false;
         
    }

    public function scores() {
        return $this->hasMany('PlayerScore', 'playerID', 'playerID');
    }
}
