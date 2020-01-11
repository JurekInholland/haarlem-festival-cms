<?php

class AuthController extends Controller {

    public static function index() {
        return self::view("debug/authlinks");
    }

    public static function register() {
        return self::view("partials/register");
    }

    public static function registerSubmit() {

        if (isset($_POST["username"])) {
            $_SESSION["registerMsg"] = UserService::register($_POST);

            // If registration was not successful, show register modal again
            if ($_SESSION["registerMsg"]) {
                require "../src/views/partials/head.php";
                require "../src/views/modals/showRegister.php";

            // If it was successful, show login modal and inform user their email has
            // to be confirmed first
            } else {
                $_SESSION["loginMsg"] = "You need to confirm your email before you can sign in.";
                require "../src/views/partials/head.php";
                require "../src/views/modals/showLogin.php";
            }
            return;
        }
        // If endpoint was reached without submitted POST data, return to homepage
        return self::redirect("");
        
    }

    public static function login() {
        if (App::get("user")->isLoggedIn()) {
            $_SESSION["loginMsg"] = "You are already logged in, " . App::get("user")->getName();

        }

        return self::view("partials/login");
    }

    public static function logout() {
        UserService::logout();
        self::redirect("");
    }

    public static function loginSubmit() {
        if (isset($_POST["username"])) {
            $_SESSION["loginMsg"] = UserService::logIn($_POST);
            require "../src/views/partials/head.php";
            require "../src/views/modals/showLogin.php";
            return;
        }
        return self::redirect("");
    }
}