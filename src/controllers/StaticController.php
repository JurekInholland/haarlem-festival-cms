<?php

// Controller for static pages like contact, about etc. as well as placeholders
// during development


class StaticController extends Controller {



    public function culture() {
        return $this->view("placeholder", ["headline" => "Culture", "content" => "culture content..."]);
    }

    public function jazz() {
        return $this->view("placeholder", ["headline" => "Jazz", "content" => "jazz content..."]);
    }

    public function food() {
        return $this->view("placeholder", ["headline" => "Food", "content" => "food content..."]);
    }

    public function dance() {
        return $this->view("placeholder", ["headline" => "Dance", "content" => "dance content..."]);
    }
}