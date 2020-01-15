<?php

class FestivalEvent {

    protected $id;
    protected $tpye;
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

    public function __construct($eventinfo)
    {
        $properties = ["id", "type", "start_date", "end_date", "address", "location_detail",
                       "name", "tickets", "price", "description", "rating", "image"];

        foreach($properties as $property) {
            if (isset($eventinfo[$property])) {
                $this->$property = $eventinfo[$property];
            } else {
                $this->$property = "";
            }
        }
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

    public function getCategory() {
        $types = App::get("festival")->getCategories();
        return $types[$this->type]->getName();
    }

    public function getCategoryId() {
        if (isset($this->tpye)) {
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
        return $this->tickets;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getRating() {
        return $this->rating;
    }


}

