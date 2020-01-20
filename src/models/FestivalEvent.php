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


    public function getSlug() {
        return self::createSlug($this->getName());
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

    public function getDayReadable() {
        $date = new DateTime($this->start_date);
        return $date->format('l, d.m.Y');
    }

    public function getStartDay() {
        $date = new DateTime($this->start_date);
        return $date->format('d.m.y');
    }

    public function getStartTime() {
        $date = new DateTime($this->start_date);
        return $date->format('H:i');
    }

    public function getEndTime() {
        $date = new DateTime($this->end_date);
        return $date->format('H:i');
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

    private static function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }

}

