<?php

class AdminController extends Controller {


    public function setup() {
        echo "SETUP";
    }

    public function create() {

        $event = new GeneralEvent([]);
        // return EventController::newEvent();
        $days = App::get("festival")->festivalDays();
        
        $locations = App::get("festival")->getLocations();

        $event_types = App::get("festival")->getCategories();

        $template_vars = [
            "event" => $event,
            "festival_days" => $days,
            "locations" => $locations,
            "event_types" => $event_types
        ];
        return self::view("admin/partials/newEditEvent", $template_vars);
    }

    public function submit() {

        if (isset($_POST["cancel"])) {
            self::redirect("admin");
        }

        $event = EventService::fromPost($_POST);

        die(var_dump($event));
    }

    public function locTest() {
        return self::view("admin/partials/editLocation");

    }

    public function events($para = "") {
       $events = EventService::getAll();
       return self::view("admin/events", ["events" => $events]);

    }

    public function event($slug = "") {
        return EventController::edit($slug);
    }


    public function index() {
        $events = EventService::getAll();

        return self::view("admin/events", ["events" => $events]);
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