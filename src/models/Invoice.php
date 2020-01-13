<?php

class Invoice {

    protected $customer;
    protected $tickets;

    public function __construct(User $customer, array $tickets)
    {
        $this->customer = $customer;
        $this->tickets = $tickets;
    }

    public function getTickets() {
        return $this->tickets;
    }

}