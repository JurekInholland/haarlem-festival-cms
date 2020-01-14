<?php

class Invoice {

    protected $customer;
    protected $tickets;
    protected $invoiceDate;
    protected $dueDate;

    public function __construct(User $customer, array $tickets)
    {
        $this->customer = $customer;
        $this->tickets = $tickets;

        // An invoice is always due 30 days after creation
        $this->invoiceDate = new DateTime();

        $this->dueDate = $this->invoiceDate;
        $this->dueDate->add(new DateInterval('P30D'));

    }

    public function getTickets() {
        return $this->tickets;
    }

}