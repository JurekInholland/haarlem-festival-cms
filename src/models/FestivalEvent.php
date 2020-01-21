<?php

class FestivalEvent {

    protected $id;
    protected $type;
    protected $start_date;
    protected $end_date;
    protected $address;
    protected $location_detail;
    protected $name;
    protected $tickets;
    protected $price;
    protected $description;
    protected $rating;
    protected $image;
    protected $slug;

    public function __construct($eventinfo)
    {


        $properties = ["id", "type", "start_date", "end_date", "address", "location_detail",
                       "name", "tickets", "price", "description", "rating", "image", "slug"];

        foreach($properties as $property) {
            if (isset($eventinfo[$property])) {
                $this->$property = $eventinfo[$property];
            } else {
                $this->$property = "";
            }
        }
    }

    public function getType() {
        return $this->type;
    }

    public function getSlug() {
        return $this->slug;
        // return self::createSlug($this->getName());
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    } 

    public function getDayReadable() {
        $date = new DateTime($this->start_date);
        return $date->format('l, d.m.Y');
    }

    public function getStartDay() {
        if ($this->start_date != "") {
            $date = new DateTime($this->start_date);
            return $date->format('d.m.y');                
        }
    }

    public function getStartTime() {
        if ($this->start_date != "") {
            $date = new DateTime($this->start_date);
            return $date->format('H:i');
        }
    }

    public function getEndTime() {
        if ($this->start_date != "") {

            $date = new DateTime($this->end_date);
            return $date->format('H:i');
    }
}

    public function getColor() {
        $categories = App::get("festival")->getCategories();
        return $categories[$this->getCategoryId()]->getColor();
    }

    public function getCategory() {
        $types = App::get("festival")->getCategories();
        return $types[$this->type]->getName();
    }

    public function getCategoryId() {
        if (isset($this->type)) {
            return (int)$this->type;
        }
        return 0;
    }

    public function getLocation() {
        return $this->location_detail;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setCategoryId(int $newId) {
        $this->type = $newId;
    }

    public function getNumberTickets() {
        if ($this->tickets) {
            return $this->tickets;
        }
        return NULL;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getRating() {
        if ($this->rating) {
            return $this->rating;            
        }
        return 0;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function getData() {
        
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "address" => $this->getAddress(),
            "type" => $this->getType(),
            "start" => $this->getStartDate(),
            "end" => $this->getEndDate(),
            "price" => $this->getPrice(),
            "tickets" => $this->getNumberTickets(),
            "slug" => $this->getSlug()
        ];
    }

}

