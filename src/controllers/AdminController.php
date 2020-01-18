<?php

class AdminController extends Controller {

    
    // Authentication is handled in the constructor to only have to do it once.
    // If the user's role is not at least Administrator, throw a custom exception
    // that is caught in Router. Instead of calling a method of this class,
    // a page is shown that informs the user of their insufficient permissions.
    public function __construct() {
        if (App::get("user")->getRole() < 1) {
            throw new NotAuthorized();
        }

    }

    // Override controller's view method to always include admin specific partials
    public static function view(string $adminView, array $data = []) {

        $data["adminView"] = $adminView;
        $data["head"] = "../src/views/admin/partials/head.php";
        Controller::view("admin/sidebar", $data);

    }

    // Route /admin/
    public function index() {
        $events = EventService::getAll();
        return self::view("admin/events", ["events" => $events]);
	
    }


    // public function tests() {
    //     $events = EventService::getNew();
    //     // die(var_dump($events));
    //     var_dump($events[0]->getCategory());
    // }

    public function setup() {
        echo "SETUP";
        $userArray = App::get("db")->query("SELECT * FROM users");
    }


    public function newedit() {

        $events = EventService::getAll();


        if (isset($_GET["type"])) {
            // TODO set event type
        }

        $events[0]->setCategoryId(2);
        return self::view("admin/newEditEvent", ["event" => $events[0]]);
    }

    // TODO: refactor
    public function create($item) {

        $event = new FestivalEvent([]);
        $days = App::get("festival")->festivalDays();
        
        $locations = App::get("festival")->getLocations();

        $event_types = App::get("festival")->getCategories();

        $template_vars = [
            "event" => $event,
            "festival_days" => $days,
            "locations" => $locations,
            "event_types" => $event_types
        ];
        return self::view("admin/newEditEvent", $template_vars);
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

    // TODO: move to profile controller
    public function submituser($userId) {

        if (isset($_POST["cancel"])) {
            return self::redirect("admin/users");
        }
        $currentId = App::get("user")->getId();
        $currentRole = App::get("user")->getRole();
        // Users can edit their own profile; Administrators can edit every profile
        if ($userId == $currentId or $currentRole >= 2) {
            echo "SUCCESS!!!";
        } else {
            echo "NO PERM";
        }
        echo $userId;
        echo "submit user";
        die(var_dump($_POST));

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
            if ($event->getId()) {
                $template_vars = [
                    "event" => $event,
                    // "festival_days" => $event->getValidDays(),
                    // "locations" => $event->getLocaions(),
                    // "event_types" => $event->getValidCategories()
                ];
                return self::view("admin/newEditEvent", ["event" => $event]);    
            } else {
                return self::view("admin/notFound");
            }
        } 
    }


    public function location() {
        return self::view("admin/locations");
    }



    
    public function restaurants() {
        return self::view("admin/restaurants");
    }


    public function settings() {
        $event = new GeneralEvent([]);

        return self::view("admin/settings", ["locations" => $event->getLocaions(), "categories" => App::get("festival")]);
    }

    public function statistics() {
        return self::view("admin/statistics");
    }


    public function pages($page = "") {
       
        if ($page == "new") {
            return self::view("admin/editPage", ["page" => new StaticPage([])]);
        } else if ($page) {
           $staticPage = PagesService::getPageBySlug($page);

            if ($staticPage->getSlug()) {
                return self::view("admin/editPage", ["page" => $staticPage]);
            } else {
                return self::view("placeholder", ["headline" => "This page does not exist."]);
            }

       }

       $pages = PagesService::getPages();
       return self::view("admin/pages", ["pages" => $pages]);
    }

    public function deletePage() {
        if (isset($_POST["id"])) {
            PagesService::deletePage($_POST["id"]);
        }
        return self::redirect("admin/pages");
    }

    public function pageSubmit() {
        $pageInfo = $_POST;
        if (isset($pageInfo["view"]) && isset($pageInfo["slug"])) {
            return self::redirect($pageInfo["slug"]);

        } else if (isset($pageInfo["submit"])) {
            $existingPage = PagesService::getPageBySlug($pageInfo["slug"]);
            if ($existingPage->getSlug() && $existingPage->getId() != $pageInfo["id"]) {
                $_SESSION["staticpageerror"] = "Another page with this name already exists.";
                return self::redirect("admin/pages/{$pageInfo["oldslug"]}");

            }

            PagesService::updatePage($_POST);
        }
        return self::redirect("admin/pages");    
    }


    public function createTicket() {
        return self::view("admin/createTicket");
    }

    public function submitTicket() {
        if (isset($_POST["submit"])) {
            TicketService::createTicket($_POST["user"], $_POST["event"], $_POST["amount"]);
        }
        return self::redirect("admin/tickets");
    }

    public function ticketlist() {
        $tickets = TicketService::getAll();
        return self::view("admin/ticketList", ["tickets" => $tickets]);

    }

    public function ticket($ticketId) {
        if ($ticketId) {
            $ticket = TicketService::getTicketById($ticketId);
            if ($ticket) {

                if (isset($_GET["pdf"])) {
                    $pdf = PdfService::genTickets($ticket);
                    ob_end_clean();
                    return $pdf->Output("ticket_{$ticketId}.pdf", 'I');
                }

                return self::view("partials/ticket", ["ticket" => $ticket[0]]);
            }
            // TODO: admin message view instead echo
            echo "{$ticketId} was not found.";
        }
        echo "No ticket id given.";

    }


    public function scan() {
        return self::view("admin/scan");
    }

    public function scanSubmit() {
        $ticket = TicketService::getTicketById($_POST["ticketid"]);
        if (isset($ticket[0])) {

            TicketService::setScanned($_POST["ticketid"]);
            return self::view("admin/scanSuccess", ["ticket" => $ticket[0]]);
        }
        echo "NO TICKET FOUND";
    }

    public function tickets($export) {

        // Manual payment update is done via POST
        foreach ($_POST as $id => $button) {
            TicketService::setPaid($id);
        }


        $tickets = TicketService::getAll();

        // If "pdf" has been passed via url parameter, return tickets as .pdf
        if ($export == "pdf") {
            $pdf = PdfService::genTickets($tickets);
            ob_end_clean();
            $pdf->Output('tickets.pdf', 'I');
            return;

        }
        
        $ticketdata = [];

        // Export settings are checked via GET
        if (isset($_GET["submit"])) {

            // Extract columns desired by user
            $columns = [];
            foreach ($_GET as $param => $value) {

                // type is either csv or excel
                if ($param == "type") {
                    $type = $value;

                } else if ($param != "submit") {
                    array_push($columns, $param);
                }
            }

            // Extract desired ticket data
            foreach ($tickets as $ticket) {
                $data = $ticket->getData();
                $wanted = [];

                foreach ($columns as $column) {
                    // array_push($wanted, $data[$column]);
                    $wanted[$column] = $data[$column];

                }
                array_push($ticketdata, $wanted);
            }
            if ($type == "csv") {
                $csv = array2csv($ticketdata);

                header("Content-type: application/csv");
                header("Content-Disposition: attachment; filename=tickets.csv");
                echo $csv;
            } else if ($type == "excel") {

                // die(var_dump($ticketdata));
                header("Content-Disposition: attachment; filename=\"tickets.xlsx\"");
                header("Content-Type: application/download");
                SpreadsheetService::make($ticketdata);
            }
            return;
            
        }


        // return self::redirect("admin/tickets");
        return self::view("admin/ticketList", ["tickets" => $tickets]);
    }


    public function invoices($invoiceId) {

        if ($invoiceId) {
            $invoice = InvoiceService::getById($invoiceId);
            // die(var_dump($invoice));

            $pdf = PdfService::createInvoice($invoice);
            ob_end_clean();
            return $pdf->Output("invoice_{$invoiceId}.pdf", 'I');
        }

        $invoices = InvoiceService::getAll();
        // die(var_dump($invoices));
        return self::view("admin/invoiceList", ["invoices" => $invoices]);
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
