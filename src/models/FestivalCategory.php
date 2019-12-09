<?php

class FestivalCategory {

    public $id;
    public $name;
    public $slug;
    public $color;

    public function __construct($category)
    {
        $this->color = "#{$category["color"]}";
        $this->slug = $category["slug"];
        $this->name = $category["name"];
        
        $this->id = $category["id"];
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getName() {
        return $this->name;
    }

    public function getColor() {
        return $this->color;
    }

    public function getId() {
        return $this->id;
    }
}