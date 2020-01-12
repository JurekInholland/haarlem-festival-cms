<?php

class Modal {

    private $title;
    private $content;
    private $action;
    private $submit;

    public function __construct($properties) {
        extract($properties);
        
        $this->title = $title;
        $this->content = $content;
        $this->action = $action;
        $this->submit = $submit;    
    }

    public function show() {
        $modal = $this;
        require "../src/views/modals/confirmModal.php";
    }


    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getAction() {
        return $this->action;
    }

    public function getSubmit() {
        return $this->submit;
    }
}