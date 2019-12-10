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

        if (isset($_POST["submit"])) {
            $event = EventService::fromPost($_POST);
            EventService::store($event);   
        }
        return self::redirect("admin");
    }

    public function locTest() {
        return self::view("admin/partials/editLocation");
    }


    public function event($para = "") {

        // If no url parameter was passed, display all events
        if ($para == "") {
            $events = EventService::getAll();
            return self::view("admin/events", ["events" => $events]); 
        
        
        } else {
            $event = EventService::fromSlug($para);
            if ($event->artist) {
                $template_vars = [
                    "event" => $event,
                    "festival_days" => $event->getValidDays(),
                    "locations" => $event->getLocaions(),
                    "event_types" => $event->getValidCategories()
                ];
                return self::view("admin/partials/newEditEvent", $template_vars);    
            } else {
                return self::view("admin/notFound");
            }
        } 
    }


    public function location() {
        return self::view("admin/locations");
    }

    // public function event($slug = "") {
    //     $event = EventService::fromSlug($slug);
    //     $template_vars = [
    //         "event" => $event,
    //         "festival_days" => $event->getValidDays(),
    //         "locations" => $event->getLocaions(),
    //         "event_types" => $event->getValidCategories()
    //     ];
    //     return self::view("admin/partials/newEditEvent", $template_vars);

    // }



    // public static function edit($slug="") {
    //     $event = FestivalEventAdapter::fromSlug($slug);

    //     // If an event matching the given slug was found
    //     // die(var_dump($event));
    //     if (!$event->hasData()) {
    //         return self::view("admin/notFound");
    //     }
    //     $days = FestivalEventAdapter::festivalDays();
    //     $locations = App::get("festival")["location"];
    //     $event_types = App::get("festival")["event_type"];


    //     $template_vars = [
    //         "event" => $event,
    //         "festival_days" => $days,
    //         "locations" => $locations, 
    //         "event_types" => $event_types
    //     ];

    //     return Controller::view("admin/editEvent", $template_vars);
    // }




    

    public function index() {
        $events = EventService::getAll();

        return self::view("admin/events", ["events" => $events]);
    }



    public function settings() {
        $event = new GeneralEvent([]);

        return self::view("admin/settings", ["locations" => $event->getLocaions(), "categories" => $event->getValidCategories()]);
    }

    public function statistics() {
        return self::view("admin/statistics");
    }
}