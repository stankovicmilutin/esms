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

}
