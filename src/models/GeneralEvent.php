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

        $this->slug = self::createSlug($this->artist);
    }

    public function getLocationId() {
        return 1;
        return $this->location->getId();
    }

    public function getLocation() {
        // return 1;
        die(var_dump($this->location));
        return $this->location;
    }

    public function getStartTime() {
        // die(var_dump($this->startDate));
        $date = new DateTime($this->startDate);
        return $date->format('H:i');
    }

    public function getEndTime() {
        $date = new DateTime($this->endDate);
        return $date->format('H:i');
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
        $categories = App::get("festival")->getCategories();
        // die(var_dump($categories[$this->category]));
        return $categories[$this->category]->getName();
    }

    public function getColor() {
        $categories = App::get("festival")->getCategories();
        return $categories[$this->category]->getColor();
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

    private static function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}