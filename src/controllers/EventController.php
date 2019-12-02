<?php

class EventController extends Controller {

    public static function index() {
        // Get all events from db
        // For each event, create new FestivalEvent model
        // Pass array of FestivalEvents to view
        $params = [
            "select" => ["*"],
            "from" => "events"
        ];


        // Maybe move to Adapter..
        $events = App::get("db")->select($params);
        $res = [];

        foreach ($events as $value) {
            $event = FestivalEventAdapter::fromDb($value);
            array_push($res, $event);
        }

        // die(var_dump($res));

        // echo "DATE:<br>";

        // echo $res[0]->getDate();

        // TODO: come back
        return Controller::view("admin/events", ["events" => $res]);

    }

    public static function editEvent() {
        $uriParams = Request::uriParams();
        $slug = $uriParams[1];
        echo "EDIT URI LSLUG: " . $slug;
        $event = FestivalEventAdapter::fromSlug($slug);

        // If an event matching the given slug was found
        if (!$event) {
            return Controller::view("404");
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

        die(var_dump($event));
        // get form data
        // Parse, validate
        // create new FestivalEvent model from form data
        // update db
    }

    public function delEvent() {

    }
}