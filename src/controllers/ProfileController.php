<?php

class ProfileController extends Controller {

    // Route /users/
    public function index() {

        // Redirect user to view their profile
        $currentUser = App::get("user")->getName();
        if ($currentUser != "Guest") {
            return self::redirect("users/profile/{$currentUser}");
        }

        // If user is not signed in, display the login modal + session message
        $_SESSION["loginMsg"] = "Please sign in to view your profile";
        require "../src/views/partials/head.php";
        require "../src/views/modals/showLogin.php";
        return;
    }

    public function profile($username) {
        $currentUser = App::get("user");

        if (!$username) {
            if ($currentUser != "Guest") {
                return self::redirect("users/profile/{$currentUser->getName()}");
            }
        }

        $user = UserService::getUserByName($username);
        if ($user) {
            if ($user->getId() == $currentUser->getId() or $currentUser->getRole() > 0) {
                return self::view("profile/viewProfile", ["user" => $user]);
                // die(var_dump($user));
            }
            echo "Not permitted to view this profile.";
            return;

        }
        echo "User not found";        
    }

    public function edit($username) {
        echo "USER: " . $user;
        $user = UserService::getUserByName($user);
        var_dump($user);

        
    }

}