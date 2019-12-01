<?php

class FestivalEvent {

    protected $title;
    protected $description;
    protected $category;
    protected $startDate;
    protected $endDate;
    protected $price;
    protected $location;



    protected $eventData;

    public function __construct($eventData)
    {
        $this->eventData = $eventData;

        $this->category = $eventData["category"];
    }

    public function getName() {
        return $this->eventData["name"];
    }


    public function fromForms() {

    }

    public function getCategory() {
        $types = App::get("festival")["event_type"];
        return $types[$this->category];
    }

    // Return an array of days of dates on which the festival takes place as well as
    // strings in human readable format

    // TODO move to festival model
    public function festivalDays() {
        
        // Get start and end date from festival config
        $info = App::get("festival");
        
        $start = new DateTime($info["start_date"]);
        $end = new DateTime($info["end_date"]);
        
        // A bit of a hack: Set the time > zero to also include the last day..
        $end->setTime(0,0,1); 

        // Return iterable DatePeriod
        $period = new DatePeriod(
            $start,
            new DateInterval('P1D'),
            $end
        );

        $result = [];

        foreach ($period as $key => $date) {

            $string = "{$date->format('l')}, {$date->format('d.m.Y')}";

            $result[$key] = [
                "string" => $string,
                "date" => $date
            ];        
        }

        return $result;
    }


    public function store($data) {
        App::get("db")->insertUpdate("events", $data);

    }

    private function getDaysfromDates(DatePeriod $period) {
        
        $result = [];

        foreach ($period as $date) {
            array_push($result, "{$date->format('l')}, {$date->format('d.m.Y')}");
        }
        return $result;
    }
}