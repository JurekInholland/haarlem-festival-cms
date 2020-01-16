<?php

$routes = [
    "GET" => [

        // Jurek
        "admin" => "AdminController",

        // Stephen
        "jazz" => "JazzController",

        "food" => "FoodController",

        "dance" => "DanceController",

        // Homepage
        "" => "StaticController",

        "api" => "ApiController",

        "auth" => "AuthController",

        "profile" => "ProfileController",

        // Static pages
        "parking" => "StaticController",
        "house-rules" => "StaticController",
        "faq" => "StaticController",

        "test" => "StaticController",
        "register" => "StaticController"
    ],

    "POST" => [
        "admin" => "AdminController",
        "api" => "ApiController",
        "auth" => "AuthController"
    ]
];