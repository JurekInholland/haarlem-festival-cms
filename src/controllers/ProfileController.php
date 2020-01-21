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

    public function submit() {
        return; // TODO: fix
        $userdata = [];
        $customerdata = [];
        foreach ($_POST as $key => $value) {
            if ($value != "" && $key != "username" && $key != "email" && $key != "submitbtn") {
                $customerdata[$key] = $value;
            } elseif ($key == "username" || $key == "email") {
                $userdata[$key] = $value;
            }
        }
        if (isset($_POST["user_id"])) {
            $userdata["id"] = $_POST["user_id"];
        }

        if ($customerdata != []) {
            App::get("db")->insertUpdate("cms_customer_data", $customerdata);
        }
        if ($userdata != []) {
            App::get("db")->insertUpdate("cms_users", $userdata);
        }
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
                return self::view("profile/viewProfile", ["user" => $user, "tickets" => TicketService::getUserTicketsPaid($user->getName()), "invoices" => InvoiceService::getByUserId($user->getId())]);
            }


            echo "Not permitted to view this profile.";
            return;

        }
        echo "User not found";        
    }


    public function edit($username) {
        echo "USER: " . $username;
        $user = UserService::getUserByName($username);
        var_dump($user);

        
    }

}