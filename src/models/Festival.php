<?php

class Festival {


    // protected $properties;
    protected $startDate;
    protected $endDate;
    protected $categories;
    protected $locations;

    public function __construct($properties)
    {
        $this->startDate = $properties["start_date"];
        $this->endDate = $properties["end_date"];
        $this->categories = $properties["categories"];
        // $this->locations = $properties["locations"];
    }

    public function getLocations() {
        return $this->locations;
    }

    public function getCategories() {
        return $this->categories;
    }


    public function getCategoryNames() {
        $names = [];
        foreach ($this->categories as $category) {
            array_push($names, $category->getName());
        }
        return $names;
        ;
    }

    public function festivalDays() {

        $start = new DateTime($this->startDate);
        $end = new DateTime($this->endDate);
        
        // Time is not relevant here; Make sure first and last day are always included.
        // A bit of a hack: Set the time > zero to also include the last day.
        $start->setTime(0,0,0);
        $end->setTime(0,0,1); 

        // iterable DatePeriod
        $period = new DatePeriod(
            $start,
            new DateInterval('P1D'),
            $end
        );

        $result = [];

        foreach ($period as $idx => $date) {


            $result[$idx] = [
                "index" => $idx,
                "string" => "{$date->format('l, d.m.Y')}",
                "date" => $date
            ];        
        }
        return $result;
    }
}