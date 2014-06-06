<?php

class TourApply extends Eloquent {
    
    protected $table = "tour_applies";
    protected $primaryKey = "locID";
    protected $fillable = array ("tournament", "team");
    
    
    public function getData(){
        $this->teamObj = Team::find($this->team);
        $this->tourObj = Tournament::find($this->tournament);
    }

}