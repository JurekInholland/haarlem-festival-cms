<?php

class AdminController extends Controller {

    public function index() {

        $uriParams = Request::uriParams();
        echo "SWITCH:" . $uriParams[0];
        switch ($uriParams[0]) {
            case "create":

                
                $event = new FestivalEvent("asd");
                $days = $event->festivalDays();

                $locations = App::get("festival")["location"];

                $event_types = App::get("festival")["event_type"];

                // die(var_dump($locations));

                return $this->view("admin/newEvent",
                [
                    "festival_days" => $days,
                    "locations" => $locations, 
                    "event_types" => $event_types
                ]);

            case "edit":
                return $this->view("admin");
                break;
            

            case "events":
                return EventController::index();

            case "":
                return $this->view("admin");

            case "event":
                return EventController::editEvent();

            default:
                echo "DEFAULT";
                $this->view("404");
                
        }
    }

    public function submit() {
        echo "SUBMIT";
        // die(var_dump($_POST));
        // If cancel button was pressed
        if (isset($_POST["cancel"])) {
            echo "CANCEL";
            $this->redirect("admin");
        
        // If submit button was pressed
        } else {
            // $this->parseFormInput($_POST);
            $event = FestivalEventAdapter::fromForms($_POST);
            echo "EVENT<br>";
            // die(var_dump($event));
        }
    }

    // TODO: CLEAN UP
function parseFormInput($post) {

    $event = new FestivalEvent($post);

    $days = $event->festivalDays();


    $startDate = new DateTime($days[$post["day"]]["date"]->format("Y-m-d"));
    $endDate = new DateTime($days[$post["day"]]["date"]->format("Y-m-d"));


    $start = explode(":", $post["start_time"]);
    $end = explode(":", $post["end_time"]);

    $startDate->setTime($start[0], $start[1]);
    $endDate->setTime($end[0], $end[1]);

    $clean = str_replace("€", "", $post["price"]);
    $price = floatval($clean);

    $eventA = [
        "title" => $post["title"],
        "description" => $post["description"],
        "category" => $post["category"],
        "start_time" => $startDate->format("Y-m-d H:i:s"),
        "end_time" => $endDate->format("Y-m-d H:i:s"),
        "price" => $price,
        "location" => $post["location"],    
    ];

    // echo $event->getCategory();

    $event->store($eventA);

    // $this->redirect("admin");

}

    private function getEvents() {
        
    }

}