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
       
        CartService::add($cartItem);
        
        return self::redirect("cart"); // go to cart page

    }
}