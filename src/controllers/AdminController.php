<?php

class AdminController extends Controller {


    public function create() {
        return EventController::newEvent();
    }

    public function events($para = "") {
        return EventController::index();
    }

    public function event($slug = "") {
        return EventController::edit($slug);
    }


    public function index() {
        return EventController::index();
    }


    public function oldindex() {
        $uriParams = Request::uriParams();
        die(var_dump($uriParams));
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

            case "statistics":
                return $this->statistics();

            default:
                echo "DEFAULT";
                $this->view("404");
                
        }
    }

    public function settings() {
        $locations = App::get("festival")["location"];

        $params = [
            "select" => ["id", "category", "color"],
            "from" => "event_categories"
        ];

        $categories = App::get("db")->select($params);

        return self::view("admin/settings", ["locations" => $locations, "categories" => $categories]);
    }

    public function statistics() {
        return self::view("admin/statistics");
    }
}