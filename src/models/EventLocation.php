<?php

class EventLocation {
    public $id;
    public $name;
    public $address;
    public $category;

    public function __construct($properties)
    {
        $this->id = $properties["id"];
        $this->name = $properties["name"];
        $this->address = $properties["address"];
        $this->category = $properties["category"];
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function toString() {
        return "{$this->name}, {$this->address}";
    }
}