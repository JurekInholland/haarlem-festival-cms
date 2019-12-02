<?php

class AdminController extends Controller {

    public function index() {

        $uriParams = Request::uriParams();
        if (!array_key_exists(0, $uriParams)) {
            return EventController::index();
        }
        switch ($uriParams[0]) {
            case "create":         
                return EventController::newEvent();       

            case "events":
                return EventController::index();

            case "":
                return EventController::index();

            case "event":
                return EventController::editEvent();

            case "settings":
                return $this->settings();

            default:
                echo "DEFAULT";
                $this->view("404");
                
        }
    }

    public function settings() {
        $locations = App::get("festival")["location"];
        return self::view("admin/settings", ["locations" => $locations]);
    }
}