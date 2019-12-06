<?php

class Festival {


    // protected $properties;
    protected $startDate;
    protected $endDate;
    protected $categories;


    public function __construct($properties)
    {
        // $this->properties = $properties;
        $this->startDate = $properties["start_date"];
        $this->endDate = $properties["end_date"];
        $this->categories = $properties["categories"];
    }

    public function getCategories() {
        return $this->categories;
    }

    public function festivalDays() {
        

        $start = new DateTime($this->startDate);
        $end = new DateTime($this->endDate);
        
        // A bit of a hack: Set the time > zero to also include the last day..
        $end->setTime(0,0,1); 

        // iterable DatePeriod
        $period = new DatePeriod(
            $start,
            new DateInterval('P1D'),
            $end
        );

        $result = [];

        foreach ($period as $idx => $date) {

            $string = "{$date->format('l')}, {$date->format('d.m.Y')}";

            $result[$idx] = [
                "string" => $string,
                "date" => $date
            ];        
        }
        return $result;
    }
}