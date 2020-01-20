<?php

class DanceEvent {
    public $id;
    public $artist;
    public $venue;    
    public $session;
    public $start_date ;
    public $end_date;
    public $duration;
    public $numberTickets;
    public $price;
    public $startTime;
    public $endTime;
    public $type;
    
    public function __construct($eventInfo) {
            $this->id= $eventInfo["id"];
            $this->type= $eventInfo["type"];
            $this->artist = $eventInfo["artist"];
            $this->venue = $eventInfo["venue"];
            $this->session = $eventInfo["session"];
            $this->setStart_date($eventInfo["start_date"]);
            $this->setEnd_date ($eventInfo["end_date"]);
            $this->setStartTime($eventInfo["start_date"],$eventInfo["end_date"]);
            $this->setEndTime($eventInfo["start_date"],$eventInfo["end_date"]);
            $this->setDuration($eventInfo["start_date"],$eventInfo["end_date"]);
            $this->numberTickets = $eventInfo["numberTickets"];
            $this->price = $eventInfo["price"];
            
    }
    public function setDuration($startdate,$enddate){
        //https://stackoverflow.com/questions/365191/how-to-get-time-difference-in-minutes-in-php
        $to_time = strtotime($startdate);
        $from_time = strtotime($enddate);
        $dur=round(abs($to_time - $from_time) / 60,2);
        if($dur>=1000)
        {
            $this->duration="ALL DAY";
        }
        else{
            $this->duration=$dur. " Minutes";
        }
        
    }
    public function getType() {
        return $this->type;
    }

    public function setStartTime($Start_date,$End_date) {
        if (substr($Start_date, 11, 5)=="00:00" && substr($End_date, 11, 5)=="00:00")
        {
            $this->startTime = "All Day All Night";
        }
        else{
            $this->startTime = substr($Start_date, 11, 5) ;
        }
        
    }
 
    public function getStartTime() {
        return $this->startTime;
    }
    public function getId() {
        return $this->id;
    }

    public function getEndTime() {
        return $this->endTime;
    }
    public function setEndTime($Start_date,$End_date) {
        if (substr($Start_date, 11, 5)=="00:00" && substr($End_date, 11, 5)=="00:00")
        {
            $this->endTime = "All Day All Night";
        }
        else{
            $this->endTime = substr($End_date, 11, 5) ;
        }
    }

    public function setArtist($Artist) {
        $this->artist = $Artist;
    }
  
    public function getArtist() {
        return $this->artist;
    }

    public function setVenue($Venue) {
        $this->venue = $Venue;
    }
    
    public function getVenue() {
        return $this->venue;
    }

    public function setSession($Session) {
        $this->session = $Session;
    }
    
    public function getSession() {
        return $this->session;
    }
    public function setStart_date($Start_date) {
        
        $this->start_date = substr($Start_date, 0, 10);
    }
    
    public function getStart_date() {
        return $this->start_date;
    }
    public function setEnd_date($End_date) {
        $this->end_date = substr($End_date, 0, 10);
    }
    
    public function getEnd_date() {
        return $this->end_date;
    }
    
    public function getDuration() {
        return $this->duration;
    }
    public function setNumberTickets($NumberTickets) {
        $this->numberTickets = $NumberTickets;
    }
    
    public function getNumberTickets() {
        return $this->numberTickets;
    }
    public function setPrice($Price) {
        $this->price = $Price;
    }
    
    public function getPrice() {
        return $this->price;
    }
  }