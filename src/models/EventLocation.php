<?php

class EventLocation {
    protected $id;
    protected $name;
    protected $address;

    public function __construct($properties)
    {
        $this->properties = $properties;

        $this->id = $properties["id"];
        $this->name = $properties["name"];
        $this->address = $properties["address"];
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