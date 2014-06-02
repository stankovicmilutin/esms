<<<<<<< HEAD
<?php


class Player extends Eloquent {

	protected $table = 'players'; 
    protected $primaryKey = 'playerID';
    protected $fillable = array('userID', 'name', 'last_name', 'teamID', 'bio', 'country', 'facebook', 'twiter', 'website');

    public function user()
    {
        return $this->belongsTo('User', 'userID', 'userID');
    }
}
=======
<?php


class Player extends Eloquent {

	protected $table = 'players'; 
    protected $primaryKey = 'playerID';
    protected $fillable = array('userID', 'name', 'last_name', 'teamID', 'bio', 'country', 'facebook', 'twiter', 'website');

    public function user()
    {
        return $this->belongsTo('User', 'userID', 'userID');
    }
}
>>>>>>> 4605b1b0b128d74e546cb2959f133a4ebb1d1964
