<?php

class StaticPage {

    protected $id;
    protected $slug;
    protected $headline;
    protected $content;
    protected $edited;
    protected $menu;

    protected $menus = [0 => "Not shown", 1 => "Footer menu", 2 => "Header menu"];

    public function __construct($properties)
    {
        extract($properties);
        $this->id = $id;
        $this->slug = $slug;
        $this->headline = $headline;
        $this->content = $content;
        $this->edited = $edited;
        $this->menu = $menu;
    }

    public function getId() {
        return $this->id;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getHeadline() {
        return $this->headline;
    }

    public function getContent() {
        return $this->content;
    }

    public function getEdited() {
        return $this->edited;
    }

    public function getMenu() {
        return $this->menu;
    }

    public function getMenuReadable() {
        return $this->menus[$this->menu];
    }

    public function getMenus() {
        return $this->menus;
    }

}