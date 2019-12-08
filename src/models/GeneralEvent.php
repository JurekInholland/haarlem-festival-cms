<?php

class GeneralEvent {

    protected $startDate;
    protected $endDate;
    protected $location;
    // protected $locationDetail;
    protected $artist;
    protected $slots;
    protected $price;
    protected $description;
    
    protected $category;

    public function __construct($eventData)
    {
        
        $properties = ["startDate", "endDate", "location", "locationDetail", "artist", "slots", "price", "description", "category"];

        foreach($properties as $property) {

            if (isset($eventData[$property])) {
                $this->$property = $eventData[$property];
            } else {
                $this->$property = "";
            }
        }        
    }

    public function getLocationId() {
        return 1;
        return $this->location->getId();
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

    public function getDateString() {
        return $this->startDate;
    }


}