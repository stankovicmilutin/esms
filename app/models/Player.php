<?php

class Player extends Eloquent {

    protected $table = 'players';
    protected $primaryKey = 'playerID';

    public function user() {
        return $this->belongsTo('User', 'userID', 'userID');
    }

}
