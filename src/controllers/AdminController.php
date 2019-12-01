<?php

class AdminController extends Controller {

    public function index() {

        $uriParams = Request::uriParams();

        switch ($uriParams[0]) {
            case "create":
                return $this->view("admin/newEvent");
                break;
            case "edit":
                return $this->view("admin");
                break;
            
            case "":
                return $this->view("admin");

            default:
                $this->view("404");
                
        }
    }


    private function getEvents() {
        
    }

}