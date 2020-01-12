<?php

class Ticket {
    protected $id;
    protected $username;
    protected $event;
    protected $amount;
    protected $IS_PAID;
    protected $TICKET_SCANNED;
    protected $orderDate;
    protected $paidDate;

    public function __construct($properties)
    {
        extract($properties);

        $this->id = $id;
        $this->username = $username;
        $this->event = $event;
        $this->amount = $amount;
        $this->IS_PAID = $IS_PAID;
        $this->TICKET_SCANNED = $TICKET_SCANNED;
        $this->orderDate = $orderDate;
        $this->paidDate = $paidDate;
    }

    public function getId() {
        return $this->id;
    }

    public function isPaid() {
        if ($this->IS_PAID == "1") {
            return true;
        } 
        return false;
    }

    public function isScanned() {
        if ($this->TICKET_SCANNED == "1") {
            return true;
        } 
        return false;
    }
    

}