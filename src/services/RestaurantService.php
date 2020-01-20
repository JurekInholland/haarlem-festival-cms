<?php

class RestaurantService {

    public static function getAll($query = "") {
        $sql = "SELECT id, name, description, image, rating, price FROM festival_events WHERE type = 2 AND description LIKE '%".$query."%'";
        $restaurants = App::get("db")->query($sql);

        $restaurantList = [];

        foreach ($restaurants as $value) {
            $restaurant = new Restaurant($value);
            array_push($restaurantList, $restaurant);
        }
        return $restaurantList;
    }

    public static function getRestaurant($restaurant = "") {
        $sql = "SELECT id, type, name, description, image, rating, start_date, end_date, location_detail, tickets, price, address 
        FROM festival_events WHERE type = 2 AND name = '".$restaurant."' ";
        
        $restaurantDetails = App::get("db")->query($sql); //returns multidimensional array
        $restaurant = new Restaurant($restaurantDetails[0]);
        
        return $restaurant;
    }

    public static function book(array $reservation) {

        $reservationDetails = [
            "restaurantID" => $reservation[0],
            "reservation_date" => $reservation[1], 
            "reservation_time" => $reservation[2],
            "adults" => $reservation[3], 
            "children" => $reservation[4],
            "allergies" => $reservation[5],
            "requests" => $reservation[6], 
        ];
        App::get("db")->insertUpdate("reservations", $reservationDetails);
    }
    
}