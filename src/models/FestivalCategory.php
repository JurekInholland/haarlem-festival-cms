<?php

class FestivalCategory {

    protected $color;
    protected $slug;
    protected $name;

    public function __construct($category)
    {
        $this->color = $category["color"];
        $this->slug = $category["slug"];
        $this->name = $category["name"];
    }

    public function getColor() {
        return "#{$this->color}";
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getName() {
        return $this->name;
    }
}