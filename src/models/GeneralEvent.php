<?php

class GeneralEvent {

    protected $startDate;
    protected $endDate;
    protected $location;
    protected $locationDetail;
    protected $actor;
    protected $slots;
    protected $price;
    protected $description;

    public function __construct($eventData)
    {
        $properties = ["startDate", "endDate", "location", "locationDetail", "actor", "slots", "price", "description"];

        foreach($properties as $property) {

            if (isset($eventData[$property])) {
                $this->$property = $eventData[$property];
            } else {
                echo "property not set {$property}";
            }
        }

        // try {
        //     $this->startDate = $eventData["start_date"];
        //     $this->endDate = $eventData["end_date"];
        //     $this->location = $eventData["location"];
        //     $this->category = $eventData["category"];
        //     $this->price = $eventData["price"];
        //     $this->artist = $eventData["artist"];
        //     $this->subject = $eventData["subject"];
        //     $this->slug = $eventData["slug"];
    
        //     $this->description = $eventData["description"];
        // } catch () {}
        
    }


    public function getStartTime() {
        return $this->startDate;
    }

    public function getEndTime() {
        return $this->endDate;
    }

    public function getCategoryId() {
        return $this->category;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getArtist() {
        return $this->artist;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getPrice() {
        return $this->price;
    }



}