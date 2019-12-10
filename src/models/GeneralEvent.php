<?php

class GeneralEvent {

    public $id;
    public $startDate;
    public $endDate;
    public $location;
    public $artist;
    public $slots;
    public $price;
    public $description;
    
    public $category;

    public function __construct($eventData)
    {
        
        $properties = ["id", "startDate", "endDate", "location", "locationDetail", "artist", "slots", "price", "description", "category"];

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
        // die(var_dump($this->location));
        return $this->location;
    }

    public function getStartTime() {
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

    public static function getValidDays() {
        return App::get("festival")->festivalDays();
    }

    public static function getLocaions() {
        return App::get("festival")->getLocations();
    }

    public static function getValidCategories() {
        return App::get("festival")->getCategories();
    }


    private static function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
    
}