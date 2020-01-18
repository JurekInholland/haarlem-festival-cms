<?php

class User {
    
    public $name;
    public $id;
    public $email;
    public $role;
    public $registrationDate;
    private $password;
    private $apikey;

    protected $roleNames = [0 => "User", 1 => "Administrator", 2 => "Superadministrator"];
    protected $loggedIn = false;


    public function __construct($properties)
    {
        // extract properties array
        extract($properties);

        $this->id = $id ?? "";
        $this->name = $username ?? "guest";
        $this->email = $email ?? "";
        $this->role = $role ?? "0";
        $this->password = $password ?? "";
        $this->registrationDate = $registration_date ?? "";
        
        if (isset($loggedIn)) {
            $this->loggedIn = true;
        }
    }


    public function isLoggedIn() {
        return $this->loggedIn;
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getHashedPassword() {
        return $this->password;
    }

    public function getRole() {
        return (int)$this->role;
    }

    public function getRoleReadable() {
        return $this->roleNames[$this->role];
    }

    public function getRoleNames() {
        return $this->roleNames;
    }

    public function hashPassword($password) {

    }

    public function getApiKey() {
        return $this->apikey;
    }

    public function generateApiKey() {
        $apikey = generateUuid(32);
        $this->apikey = $apikey;
        return $apikey;
    }


}