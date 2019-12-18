<?php

class FestivalEvent {

    protected $title;
    protected $description;
    protected $category;
    protected $start_time;
    protected $end_time;
    protected $price;
    protected $location;
    protected $slug;
    protected $has_data = false;

    public function __construct(array $eventData)
    {

        if (isset($eventData["title"])) {
            $this->title = $eventData["title"];
            $this->description = $eventData["description"];
            $this->category = $eventData["category"];
            $this->start_time = $eventData["start_time"];
            $this->end_time = $eventData["end_time"];
            $this->price = $eventData["price"];
            $this->location = $eventData["location"];
            $this->slug = $this->createSlug($eventData["title"]);
            $this->has_data = true;
        }
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        $date = new DateTime($this->start_time);
        return $date->format('d.m.Y');
    }

    public function getDateString() {
        $date = new DateTime($this->start_time);
        return "{$date->format('l')}, {$date->format('d.m.Y')}";
    }

    public function getStartTime() {
        $date = new DateTime($this->start_time);
        return $date->format('H:i');
    }

    public function getEndTime() {
        $date = new DateTime($this->end_time);
        return $date->format('H:i');
    }

    public function getLocation() {

        // $locations = App::get("festival")["location"];
        return $this->location;
    }

    public function getLocationId() {
        return $this->location;
    }

    // public function getCategory() {
    //     $types = App::get("festival")->getCategories();
    //     return $types[$this->category];
    // }

    public function getCategoryId() {
        return $this->category;
    }
    public function getPrice() {
        return $this->price;
    }

    // public function getColor() {
    //     $colors = App::get("festival")["color"];
    //     return $colors[$this->category];
    // }

    public function getSlug() {
        return $this->slug;
    }

    public function hasData() {
        return $this->has_data;
    }
   
 
    public function storeSelf() {


        $eventInfo = [
            "title" => $this->title,
            "description" => $this->description, 
            "category" => $this->category, 
            "start_time" => $this->start_time, 
            "end_time" => $this->end_time, 
            "price" => $this->price, 
            "location" => $this->location, 
            "slug" => $this->slug, 
        ];

        App::get("db")->insertUpdate("events", $eventInfo);
    }

    private static function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }

}