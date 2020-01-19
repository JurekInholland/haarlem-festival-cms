<?php

class Restaurant {

    public $id;
    public $type;
    public $name;
    public $description;
    public $image;
    public $rating;
    public $start_date;
    public $end_date;
    public $location_detail;
    public $tickets;
    public $price;
    public $address;
    
    // $description stores food_type; $location_detail stores sessions; $tickets stores nr_of_seats
    
    public function __construct($restaurantData)
    {
        $properties = ["id", "type", "name", "description", "image", "rating", "start_date", "end_date", 
                       "location_detail", "tickets", "price", "address"];

        foreach($properties as $property) {
            if (isset($restaurantData[$property])) {
                $this->$property = $restaurantData[$property];
            } else {
                $this->$property = "";
            }
        }
    }

    public function duration() // method for calculating duration of a session
    {
        $startTime = substr($this->start_date, 10); //remove date from datetime value
        $endTime = substr($this->end_date, 10); //remove date from datetime value

        $hourdiff = round((strtotime($endTime) - strtotime($startTime))/3600, 1); //calculate difference in hours
        $duration = $hourdiff / $this->location_detail; //duration value per session

        return $duration;
    }

    public function firstSession() { //method for displaying session in the right format
        $firstSessionTime = substr($this->start_date, 10); //remove date from datetime value
        $firstSessionTime = substr($firstSessionTime, 0, 6); //remove the seconds

        return $firstSessionTime;
    }

    public function getPrice() { //method for displaying price in the right format
        return number_format((double)$this->price, 2, '.', ''); // convert string to double. display decimal value
    }

    public function getKidsPrice() { //method for displaying kids price in the right format
        $kidsPrice = number_format($this->getPrice(), 2, '.', '') / 2; // calculate kids price
        return number_format($kidsPrice, 2); // display price with decimal value
    }

    public function getReservationTimes() { // display times for reserving a table
        $time = strtotime($this->start_date); //create date time var
        $durPerSession = $this->duration(); // get duration per session value
        
        $reservationTimes = array(); // store session times here
        array_push($reservationTimes, date("H:i", $time)); // insert first session time
        
        if ($durPerSession - floor($durPerSession) == 0.5) { // if is used to help calculate the mins added to the start dateTime of first session
            $hourVal = substr($durPerSession,0,1)."<br>"; // store duration without decimal value

            for ($i=0; $i < $this->location_detail; $i++) { // loop through total amount of sessions
                $sessionTime = strtotime("+" .(int)$hourVal. "Hour +30 Minutes", $time); // calculate possible session times 
                $time = $sessionTime; // store new session time here

                $sessionTime = date("H:i", $sessionTime); //create datetime variable for session time
                array_push($reservationTimes, $sessionTime); // insert session times
            }
         }
         else {
            for ($i=0; $i < $this->location_detail; $i++) { // loop through total amount of sessions
                $sessionTime = strtotime("+" .(int)$durPerSession. "Hour", $time); // calculate possible session times 
                $time = $sessionTime; // store new session time here

                $sessionTime = date("H:i", $sessionTime); //create datetime variable for session time
                array_push($reservationTimes, $sessionTime); // insert session times
            }
         }
         return $reservationTimes;
    }

    
}