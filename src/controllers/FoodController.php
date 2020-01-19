<?php

class FoodController extends Controller {
    
    
     // Override controller's view method to always include admin specific partials
     public static function view(string $viwName, array $data = []) {

        $data["head"] = "../src/views/food/partials/head.php";
        Controller::view($viwName, $data);

    }

    
    public static function index() { // overview page
        if (isset($_POST["filter"])) {
            $filter = $_POST["filter"];
        } else {
            $filter = "";
        }
        $restaurants = RestaurantService::getAll($filter);
        return self::view("food/overview", ["restaurants" => $restaurants, "filter" => $filter]);
    }

    public static function details($restaurant) { // detail page
        $restaurant = str_replace("-"," ","$restaurant"); // remove "-" from restaurant name
        $restaurant = RestaurantService::getRestaurant($restaurant); // get specific restaurant
        return self::view("food/details", ["restaurant" => $restaurant]);
    }

    public static function reservation($restaurant) { // reservation page
        $restaurant = str_replace("-"," ","$restaurant"); // remove "-" from restaurant name
        $restaurant = RestaurantService::getRestaurant($restaurant); // get specific restaurant
        return self::view("food/reservation", ["restaurant" => $restaurant]);
    }

    public static function book($restaurantName) { // book reservation
        $reservationPrice = 10; //fixed reservation price
        $resName = str_replace("-"," ","$restaurantName"); // remove "-" from restaurant name
        $restaurant = RestaurantService::getRestaurant($resName); // get specific restaurant
        
        $reservation = array( 
            $restaurant->id, $_POST["txtDate"], $_POST["txtTime"], $_POST["txtAdults"], $_POST["txtChildren"], 
            $_POST["txtAllergies"], $_POST["txtRequests"]
        ); // reservation data
        
        $cartItem = array($restaurant->id, $restaurant->type, $restaurant->name, $reservationPrice, 1, $reservation); // cart item data
        
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