<?php

class EventController extends Controller {

    public static function index() {
        // Get all events from db
        // For each event, create new FestivalEvent model
        // Pass array of FestivalEvents to view
        $params = [
            "select" => ["*"],
            "from" => "events",
            "orderBy" => "start_time"
        ];

        // Maybe move to Adapter..
        $events = App::get("db")->select($params);
        $res = [];

        foreach ($events as $value) {
            $event = new FestivalEvent($value);
            array_push($res, $event);
        }

        return self::view("admin/events", ["events" => $res]);

    }

    public static function newEvent() {
        $event = new FestivalEvent([]);

        $days = App::get("festival")->festivalDays();
        $locations = App::get("festival")["location"];
        $event_types = App::get("festival")["event_type"];

        $template_vars = [
            "event" => $event,
            "festival_days" => $days,
            "locations" => $locations, 
            "event_types" => $event_types
        ];

        return self::view("admin/editEvent", $template_vars);

    }

    public static function edit($slug="") {
        $event = FestivalEventAdapter::fromSlug($slug);

        // If an event matching the given slug was found
        // die(var_dump($event));
        if (!$event->hasData()) {
            return self::view("admin/notFound");
        }
        $days = FestivalEventAdapter::festivalDays();
        $locations = App::get("festival")["location"];
        $event_types = App::get("festival")["event_type"];


        $template_vars = [
            "event" => $event,
            "festival_days" => $days,
            "locations" => $locations, 
            "event_types" => $event_types
        ];

        return Controller::view("admin/editEvent", $template_vars);
    }

    public static function editEvent() {
        $uriParams = Request::uriParams();
        $slug = "";

        if (array_key_exists(1, $uriParams)) {
            $slug = $uriParams[1];
        }

        

        $event = FestivalEventAdapter::fromSlug($slug);

        // If an event matching the given slug was found
        // die(var_dump($event));
        if (!$event->hasData()) {
            return self::view("admin/notFound");
        }
        $days = FestivalEventAdapter::festivalDays();
        $locations = App::get("festival")["location"];
        $event_types = App::get("festival")["event_type"];


        $template_vars = [
            "event" => $event,
            "festival_days" => $days,
            "locations" => $locations, 
            "event_types" => $event_types
        ];

        return Controller::view("admin/editEvent", $template_vars);

        // Get slug from url
        // Get event from db where slug=slug
        // Create event model
        // pass to view
    }

    public function submitEvent() {

        $post = $_POST;

        $event = FestivalEventAdapter::fromForms($post);

        $event->storeSelf();

        $this->redirect("admin");

    }
}