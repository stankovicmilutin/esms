<?php

class PlayerInvite extends Eloquent {
    
    protected $table = "player_invites";
    protected $primaryKey = "locID";
    protected $fillable = array( "inviter", "invited", "team" );
    
    
    public static function getInvites($id){
        return PlayerInvite::where("invited", "=", $id)->get();
    }
    
    public function getData(){
        $this->inviterPlayer = Player::find($this->inviter);
        $this->invitedTeam = Team::find($this->team);
    }
    
}