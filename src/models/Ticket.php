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


    // Use google charts API to generate QR Code
    // https://developers.google.com/chart/infographics/docs/qr_codes
    public function getQrcode(string $size="500x500") {

        $hostname = getenv('HTTP_HOST');

        $ticketUrl = "http://{$hostname}/admin/ticket/{$this->getId()}";

        $qrcode = ('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($ticketUrl));
        return $qrcode;
    
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getPrice() {
        return  sprintf('%0.2f', $this->event->getPrice());
    }


    public function getTotalPrice() {

        $total = floatval($this->getAmount()) * floatval($this->getPrice());
        return  sprintf('%0.2f', $total);
    }

    public function getEventSlug() {
        return $this->event->getSlug();
    }

    public function getEventDate() {
        $date = new DateTime($this->event->getStartDate());
        return $date->format('d.m.Y H:i');
    }

    public function getEventDateReadable() {
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