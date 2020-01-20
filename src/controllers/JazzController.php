<?php

class JazzController extends Controller {
    
    //url position to call function
    // harlem-festival.nl/jazz/events

    //to show all ticket
    public static function index() {

        //return self::view("placeholder", ["headline" => "Jazz", "content" => "jazz content..."]);

        $eventobj = JazzService::getAll();

        //to check per date, need to pass on day.
        //$eventobj = JazzService::getAllJazzPerDate();

        $events = ["events" => $eventobj];
        return self::view("jazz/lineup", $events);
    }
    //to show jazz per date selected from the navigation bar.
    public static function events($date) {

        if ($date != "") {
            $eventobj = JazzService::getAllJazzPerDate($date);
        } else {
            $eventobj = JazzService::getAll();
        }
        

        //to check per date, need to pass on day.
        //$eventobj = JazzService::getAllJazzPerDate();

        $events = ["events" => $eventobj];
        return self::view("jazz/lineup", $events);
    }
    //this to get the data for sunday tickets to the view
    public static function Sundayevents() {

        $eventobj = JazzService::sundayTicket();

        //to check per date, need to pass on day.
        //$eventobj = JazzService::getAllJazzPerDate();

        $events = ["events" => $eventobj];
        return self::view("jazz/lineup", $events);
    }
    // i need to delete this
    public static function AddTicket()
    {
        //make an array and pass it on to the service.
        //$array =[];
        //JazzService::orderJazzTicket($array);
        //also a service that will reduce the amount of ticket
        //after sending ticket info
        $ticketInfo = array(
            $_POST[""],
        );
        $eventobj = JazzService::getAll();
        $events = ["events" => $eventobj];
        return self::view("jazz/lineup", $events);
    }
    //to add the ticket to the cookie
    public static function order($JazzticketID)
    {
        $eventobj = JazzService::SpecificTicket($JazzticketID);
        //var_dump($eventobj);
        $ticketInfo = array(
            $JazzticketID,
            $eventobj->getType(),
            $eventobj->getBand(),
            $eventobj->getPrice(),
            1
        );
        

        //var_dump($ticketInfo);
        //setcookie("cart", serialize($ticketInfo), time() +(86400*30), "/");
        
        //$data = unserialize($_COOKIE['eventData']);
        //print_r($data);
        if(isset($_COOKIE["cart"])) { // check if cart has been set yet
            $cartData = unserialize($_COOKIE['cart']); // retrieve cart items from existing cookie
            array_push($cartData, $ticketInfo); // add new cart item to list of cart items

            setcookie("cart",serialize($cartData),time() + (86400 * 30), "/"); // update cart cookie
        }
        else {
            $cartData = array($ticketInfo); // create new cart data array to store new cart items 
            setcookie("cart",serialize($cartData),time() + (86400 * 30), "/"); // create cart cookie
        }
        return self::redirect("cart");

    }

    //this is the button to go to the cart page
    public static function GotoCart()
    {
        return self::view("/cart");
    }

    //trial
    // /jazz/example
    public static function example() {
        //$events = JazzService::getAllJazz();
        //var_dump($events);
        //$bs = ["key" => "1", "key2" => "2"]
        //return self::view("jazz/lineup2", $bs);
    }


    
}