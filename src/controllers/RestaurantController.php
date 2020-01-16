<?php

class RestaurantController {

    public function getAll() {
        $sql = "SELECT * FROM restaurants";
        $restaurants = App::get("db")->query($sql);
        return $restaurants;
    }
}