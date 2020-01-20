<?php

class DanceController extends Controller {    
    
    public static function index() {
        $events=DanceService::getAll();
        $eventsAsoc=["Events" => $events];
        return self::view("DanceView", $eventsAsoc);
    }
    public static function perdate($date) {
        $events=DanceService::getAllDancePerDate($date);
        $eventsAsoc=["Events" => $events];
        return self::view("DanceView", $eventsAsoc);
    }
    public static function order($id) {
        
        $event=DanceService::getDanceParticularEvent($id);        
        $cartItem = array($event->getId(), $event->getType(), $event->getArtist(), $event->getPrice(), 1, null); // cart item data
       
        if(isset($_COOKIE["cart"])) { // check if cart has been set yet
            $cartData = unserialize($_COOKIE['cart']); // retrieve cart items from existing cookie
            array_push($cartData, $cartItem); // add new cart item to list of cart items
            setcookie("cart",serialize($cartData),time() + (86400 * 30), "/"); // update cart cookie
        }
        else {
            $cartData = array($cartItem); // create new cart data array to store new cart items 
            setcookie("cart",serialize($cartData),time() + (86400 * 30), "/"); // create cart cookie
        }
        
        return self::redirect("cart"); // go to cart page

    }
}