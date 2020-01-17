<?php

class ApiController extends Controller {
    
    // Work in progress

    // Overview of different api endpoints
    public function index() {
        return self::view("api/index");
    }

    public function restaurants($action) {
        // TODO: refactor
        $restaurants = RestaurantController::getAll();
        self::serveJson($restaurants);
    }

    public function pages() {
        $pages = PagesService::getPages();

        $pagedata = [];

        foreach ($pages as $page) {
            $data = [
                "id" => $page->getId(),
                "slug" => $page->getSlug(),
                "content" => $page->getContent(),
                "headline" => $page->getHeadline(),
                "edited" => $page->getEdited(),
                "menu" => $page->getMenu()
            ];

            array_push($pagedata, $data);
        }
        self::serveJson($pagedata);
    }

    // Generate and store api key
    public function generate() {
        if (Request::method() == "POST") {
            $key = generateUuid(32);
            echo "API KEY: " . $key;
            return;
        }
        return self::redirect("api");
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