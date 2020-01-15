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
        $this->id = $ticket_id;
        $this->username = $username;
        $this->event = $event;
        $this->amount = $amount;
        $this->IS_PAID = $IS_PAID;
        $this->TICKET_SCANNED = $TICKET_SCANNED;
        $this->orderDate = $order_date;
        $this->paidDate = $paid_date;
        

    }

    public function getData() {
        return [
            "id" => $this->id,
            "username" => $this->getUsername(),
            "event" => $this->getEventName(),
            "amount" => $this->getAmount(),
            "price" => $this->getPrice(),
            "IS_PAID" => $this->isPaidReadable(),
            "TICKET_SCANNED" => $this->isScannedReadable(),
            "orderDate" => $this->getOrderDateReadable(),
            "paidDate" => $this->getPaidDate()
        ];
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getPrice() {
        return $this->event->getPrice();
    }

    public function getEventSlug() {
        return $this->event->getSlug();
    }

    public function getEventDate() {
        $date = new DateTime($this->event->getStartDate());
        return $date->format('l, d.m.Y H:i');

    }

    public function getEventName() {
        return $this->event->getName();
    }

    public function getEventAddress() {
        return $this->event->getAddress();
    }

    public function getEventLocation() {
        return $this->event->getLocation();
    }

    public function getUsername() {
        return $this->username;
    }

    public function getOrderDateReadable() {
        $date = new DateTime($this->orderDate);
        return $date->format('l, d.m.Y H:i');
    }
    public function getPaidDate() {
        return $this->paidDate;
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

    public function isPaidReadable() {
        if ($this->IS_PAID == "1") {
            return "Yes";
        } 
        return "No";
    }

    public function isScanned() {
        if ($this->TICKET_SCANNED == "1") {
            return true;
        } 
        return false;
    }

    public function isScannedReadable() {
        if ($this->TICKET_SCANNED == "1") {
            return "Yes";
        } 
        return "No";
    }
    

}