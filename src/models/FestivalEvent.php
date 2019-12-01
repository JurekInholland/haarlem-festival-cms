<?php

class FestivalEvent {


    protected $eventData;

    public function __construct($eventData)
    {
        $this->eventData = $eventData;
    }

    public function getName() {
        return $this->eventData["name"];
    }
}