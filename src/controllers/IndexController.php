<?php

class IndexController extends Controller {

    public function index() {
        return $this->view("homepage/index");
    }

}