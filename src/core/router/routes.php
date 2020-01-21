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

        "users" => "ProfileController",

        // Static pages
        "parking" => "StaticController",
        "house-rules" => "StaticController",
        "faq" => "StaticController",

        "test" => "StaticController",
        "register" => "StaticController",
        "tickets" => "TicketController",
        "cart" => "CartController",
        "payment" => "PaymentController"

    ],

    "POST" => [
        "admin" => "AdminController",
        "api" => "ApiController",
        "auth" => "AuthController",
        "food" => "FoodController",
        "cart" => "CartController",
        "payment" => "PaymentController",
        "users" => "ProfileController"
    ]
];