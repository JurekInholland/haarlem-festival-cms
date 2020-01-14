<?php

class AdminController extends Controller {



    public function __construct()
    {
        // if (App::get("user")->getRole() < 1) {
        //     require "../src/views/partials/head.php";

        //     require "../src/views/homepage/loginModal.php";
        //     require "../src/views/homepage/registerModal.php";

        //     require "../src/views/partials/header.php";
        //     require "../src/views/partials/pageContent.php";
        // }
    }

    

    public function index() {
        $events = EventService::getAll();
        return self::view("admin/events", ["events" => $events]);
    }


    public function tests() {
        $events = EventService::getNew();
        // die(var_dump($events));
        var_dump($events[0]->getCategory());
    }

    public function setup() {
        echo "SETUP";


        $userArray = App::get("db")->query("SELECT * FROM users");
    }


    public function newedit() {
        $events = EventService::getNew();
        $events[0]->setCategoryId(2);
        return self::view("admin/newEditEvent", ["event" => $events[0]]);
    }

    public function create() {

        $event = new GeneralEvent([]);
        $days = App::get("festival")->festivalDays();
        
        $locations = App::get("festival")->getLocations();

        $event_types = App::get("festival")->getCategories();

        $template_vars = [
            "event" => $event,
            "festival_days" => $days,
            "locations" => $locations,
            "event_types" => $event_types
        ];
        return self::view("admin/editEvent", $template_vars);
    }

    public function submit() {

        if (isset($_POST["submit"])) {
            $event = EventService::fromPost($_POST);
            EventService::store($event);   
        }
        return self::redirect("admin");
    }

    public function users($username) {

        


        // Display list of users if no username was passed
        if ($username == "") {


            if (isset($_GET["q"])) {
                $users = UserService::listUsers($_GET["q"]);
            } else {
                $users = UserService::getAll();

            }

            return self::view("admin/userList", ["users" => $users]);



        } else {

            $user = UserService::getUserByName($username);
            
            if (isset($_GET["delete"])) {
                if (App::get("user")->getRole() >= 1) {
                    // echo "DEL";
                   
                    return self::view("admin/userProfile", ["user" => $user]);
                } else {
                    echo "cannot del";
                }
                

                return;
            } else {

                
                return self::view("admin/userProfile", ["user" => $user]);
            }

            
        }
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
            if ($event->id) {
                $template_vars = [
                    "event" => $event,
                    "festival_days" => $event->getValidDays(),
                    "locations" => $event->getLocaions(),
                    "event_types" => $event->getValidCategories()
                ];
                return self::view("admin/editEvent", $template_vars);    
            } else {
                return self::view("admin/notFound");
            }
        } 
    }


    public function location() {
        return self::view("admin/locations");
    }



    



    public function settings() {
        $event = new GeneralEvent([]);

        return self::view("admin/settings", ["locations" => $event->getLocaions(), "categories" => $event->getValidCategories()]);
    }

    public function statistics() {
        return self::view("admin/statistics");
    }


    public function pages($page = "") {
       

       if ($page) {
           $staticPage = PagesService::getPageBySlug($page);

            if ($staticPage) {
                return self::view("admin/editPage", ["page" => $staticPage[0]]);
            } else {
                return self::view("placeholder", ["headline" => "This page does not exist."]);
            }

       }

       $pages = PagesService::getPages();
       return self::view("admin/pages", ["pages" => $pages]);
    }


    public function tickets() {
        $pdf = PdfService::createPdf("hji");
        ob_end_clean();
        $pdf->Output('example_001.pdf', 'I');
    }

    public function invoice() {
        $pdf = PdfService::createInvoice([0 => ["name" => "Tiesto", "quantity" => "2", "cost" => "15", "total" => "30"],
                                          1 => ["name" => "foodstuff", "quantity" => "1", "cost" => "5", "total" => "5"],
                                          2 => ["name" => "nochwas", "quantity" => "6", "cost" => "5", "total" => "30"]
        
        ]);
        ob_end_clean();
        $pdf->Output('Invoice.pdf', 'I');
    }
}