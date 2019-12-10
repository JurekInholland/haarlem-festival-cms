<?php

class ApiController extends Controller {
    
    // Work in progress

    public function index() {
        return self::view("api/index");
    }

    public function locations() {
        
        $locations = FestivalService::getLocations();
        self::serveJson((array)$locations);
    }

    public function events() {
        $events = EventService::getAll();
        self::serveJson($events);
    }

    public function days() {
        $days = App::get("festival")->festivalDays();
        self::serveJson($days);
    }

    public function event($slug) {
        $event = EventService::fromSlug($slug);
        if ($event->artist) {
            self::serveJson((array)$event);
        } else {
            http_response_code(404);
            echo "Event {$slug} not found.";
        }
    }

    public function categories() {
        $categories = App::get("festival")->getCategories();
        self::serveJson($categories);
        return;
        $result = [];

        foreach ($categories as $category) {
            $result["category_{$category->getId()}"] = [
                "name" => $category->getName(),
                "slug" => $category->getSlug(),
                "color" => $category->getColor(),
                "id" => $category->getId()
            ];
        }
        self::serveJson($result);
    }


    private static function serveJson(array $jsonData) {
        header('Content-type: application/json');
        echo json_encode($jsonData, JSON_PRETTY_PRINT);
    }
} 