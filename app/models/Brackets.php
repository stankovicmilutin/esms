<?php

class Brackets extends Eloquent{
    
    protected $table = "brackets";
    protected $primaryKey = "locID";
    protected $fillable = array("tournament","childID1","childID2","matchID");
    
    public function addChild1($matchID){
        $this->childID1 = $matchID;
        $this->save();
    }
    
    public function addChild2($matchID){
        $this->childID2 = $matchID;
        $this->save();
    }
}