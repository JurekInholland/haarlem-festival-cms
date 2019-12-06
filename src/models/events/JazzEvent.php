<?php

class JazzEvent {

    protected $start_date;
    protected $end_date;
    protected $location;
    protected $hall;
    protected $band;
    protected $seats;
    protected $price;

    public function __construct($eventInfo)
    {
        $this->start_date = $eventInfo["start_date"];
        // etc...
        
    }

    



}