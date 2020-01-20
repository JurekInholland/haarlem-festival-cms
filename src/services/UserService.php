<?php

class UserService {


    public function getUserByName(string $name) {
        $sql = "SELECT cms_users.*, cms_customer_data.* FROM cms_users
                LEFT JOIN cms_customer_data ON cms_users.id = cms_customer_data.user_id
                WHERE username LIKE :username";
        
        $params = [":username" => $name];

        $userdata = App::get("db")->query($sql, $params);
        if (isset($userdata[0])) {
            $user = new User($userdata[0]);
            return $user;

        }
        // die(var_dump($userdata));

    }

    public function getCurrentUser() {
        if (isset($_COOKIE["haarlemfestival"])) {
            $sql = "SELECT cms_login_tokens.user_id as id, cms_users.*, cms_customer_data.*
                    FROM cms_login_tokens JOIN cms_users ON cms_login_tokens.user_id = cms_users.id
                    LEFT JOIN cms_customer_data ON cms_users.id = cms_customer_data.user_id
                    WHERE cms_login_tokens.token = :token";
            
            $params = [":token" => sha1($_COOKIE["haarlemfestival"])];

            $userdata = App::get("db")->query($sql, $params);




            // TODO: Verify
            if (isset($userdata[0])) {
                $userdata[0]["loggedIn"] = true;
                return new User($userdata[0]);
            }
        }

        // If cookie is not set, return guest user info
        $guestUser = [
            "username" => "Guest",
            "role" => 0,
            "id" => 0,
        ];
        return new User($guestUser);
    }

    public function register(array $credentials) {
        $sql = "SELECT * FROM cms_users WHERE username LIKE :username OR email LIKE :email";
        $params = [":username" => $credentials["username"], 
                   ":email" => $credentials["email"]];
        $userdata = App::get("db")->query($sql, $params);
        if (isset($userdata[0])) {
            $user = $userdata[0];
        } else {
            $user = [];
        }

        $existingUser = new User($user);

        // Check if username or email already exist
        if ($credentials["username"] == $existingUser->getName()) {
            return "This username is already in use.";
        } else if ($credentials["email"] == $existingUser->getEmail()) {
            return "This email is already in use.";
        }

        if (strlen($credentials["password"]) >= 5 && strlen($credentials["password"]) <= 32) {
            $credentials["password"] = password_hash($credentials["password"], PASSWORD_BCRYPT);

            self::createUser($credentials);
            return;
            // return "Successfully registered!";

        }
        return "Password must be between 5 and 32 characters.";

    }

    public static function logIn(array $credentials) {
        $sql = "SELECT *, cms_customer_data.* from cms_users
                LEFT JOIN cms_customer_data ON cms_users.id=cms_customer_data.user_id
                WHERE email LIKE :username OR username LIKE :username";
        $params = [":username" => $credentials["username"]];
        $userdata = App::get("db")->query($sql, $params);
        if (!isset($userdata[0])) {
            return "Username not found.";
        }
        $user = new User($userdata[0]);

        if (password_verify($credentials["password"], $user->getHashedPassword())) {
            
            self::storeLogin($user);
            return;
        }
        return "Password does not match.";
    
        // if ($credentials[""])
    }


    private static function storeLogin(User $user) {
        
        $id = $user->getId();

        $crypto = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $crypto));
        // Hash token
        $hashed_token = sha1($token);

        $sql = "INSERT INTO cms_login_tokens (token, `user_id`) VALUES (:token, :user_id)
                ON DUPLICATE KEY UPDATE token=VALUES(token)";
        $params = [":token" => $hashed_token, ":user_id" => $id];

        App::get("db")->query($sql, $params);
        setcookie("haarlemfestival", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
    }

    public function logOut() {
        $cookie = $_COOKIE["haarlemfestival"];
        if (isset($cookie)) {
            $sql = "DELETE FROM cms_login_tokens WHERE token = :token";
            $params = [":token" => sha1($cookie)];
            App::get("db")->query($sql, $params);

            // Expire login cookie
            setcookie("haarlemfestival", "1", time() - 300);
        }
    }

    private static function createUser(array $userdata) {
        // TODO: Validate input

        extract($userdata);

        $sql = "INSERT INTO cms_users (`username`, `email`, `password`, `role`) VALUES (:username, :email, :password, :role)";
        $params = [":username" => $username,
                   ":email" => $email,
                   ":password" => $password,
                   ":role" => 0];
        
        App::get("db")->query($sql, $params);
        return;

    }


    // TODO: Implement

    public static function deleteUser(int $userid) {}

    public static function editUser(int $userid, string $infokey, string $newvalue) {}

    public static function getAll() {
        $sql = "SELECT * FROM cms_users";
        $users = App::get("db")->query($sql);

        $models = [];

        foreach ($users as $user) {
            $usermodel = new User($user);
            array_push($models, $usermodel);
        }

        return $models;
    }

    public static function listUsers(string $searchstring="") {

        // if ($searchstring == "") {
        //     return self::getAll();
        // }
        $sql = "SELECT * FROM cms_users WHERE username LIKE :searchstring
                OR email LIKE :searchstring OR registration_date LIKE :searchstring";
        
        $params = [":searchstring" => "%{$searchstring}%"];

        $users = App::get("db")->query($sql, $params);

        $models = [];

        foreach ($users as $user) {
            $usermodel = new User($user);
            array_push($models, $usermodel);
        }

        return $models;
    }

    public function setCustomerData(array $data) {
        extract($data);
        $sql = "INSERT INTO cms_customer_data (user_id, firstname, lastname, customer_address, phone)
        VALUES (:userid, :firstname, :lastname, :customer_address, :phone)
        ON DUPLICATE KEY UPDATE firstname=VALUES(firstname), lastname=VALUES(lastname),
        customer_address=VALUES(customer_address), phone=VALUES(phone)";
        
        $params = [":userid" => (int)$userid, ":firstname" => $firstname, ":lastname" => $lastname, ":customer_address" => $address, ":phone" => $phone];
        // die(var_dump($params));
        App::get("db")->query($sql, $params);
    }
}