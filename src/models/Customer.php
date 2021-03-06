<?php

// Regular users and admins only need a username, an email and a password.
// Customers also need first and last name, phone number and address.
class Customer extends User {

    // protected $properties;
    protected $phone;
    protected $firstname;
    protected $lastname;
    protected $address;


    public function __construct($properties)
    {
        parent::__construct($properties);

        extract($properties);

        $this->phone = $phone;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->address = $customer_address;
    }

    public function getFirstName() {
        return ucfirst($this->firstname);
    }

    public function getLastName() {
        return ucfirst($this->lastname);
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }
    

}