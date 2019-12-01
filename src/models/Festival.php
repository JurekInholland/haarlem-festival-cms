<?php

class Festival {


    protected $properties;
    protected $startDate;
    protected $endDate;


    public function __construct($properties)
    {
        $this->properties = $properties;
        $this->startDate = $properties["start_date"];
        $this->endDate = $properties["end_date"];
    }

    
}