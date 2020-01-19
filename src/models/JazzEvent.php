<?php

class JazzEvent {

    private $id;
    private $type;
    private $start_date;
    private $end_date;
    private $address;
    private $hall;
    private $band;
    private $description;
    private $ticket;
    private $price;


    public function __construct($JazzeventInfo)
    {
        $this->id = $JazzeventInfo["id"];
        $this->type=$JazzeventInfo["type"];
        $this->start_date = $JazzeventInfo["start_date"];
        $this->end_date = $JazzeventInfo["end_date"];
        $this->address= $JazzeventInfo["address"];
        $this->hall = $JazzeventInfo["location_detail"];
        //$this::calculateDuration($JazzeventInfo["start_date"],$JazzeventInfo["end_date"]);
        $this->band = $JazzeventInfo["name"];
        $this->ticket = $JazzeventInfo["tickets"];
        $this->price = $JazzeventInfo["price"];
        $this->description = $JazzeventInfo["description"];        
    }

    //a function to calculate time
    public function EventTime()
    {
        $start = $this->start_date;
        $end = $this->end_date;
        $newtime= $start-$end;

        return $newtime;
    }
    //get
    public function getId()
    {
        return $this->id;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getStartDate()
    {
        //return $this->start_date
        return substr($this->start_date,11,5);
    }
    public function getEndDate()
    {
        //return $this->end_date
        return substr($this->end_date,11,5);
    } 
    public function getAddress()
    {
        return $this->address;
    } 
    public function getHall()
    {
        return $this->hall;
    } 
    public function getBand()
    {
        return $this->band;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getTicket()
    {
        return $this->ticket;
    }
    public function getPrice()
    {
        return $this->price;
    }
    //set
    public function setDate()
    {

    } 

}