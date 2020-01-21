<?php

class Invoice {

    protected $id;
    protected $customer;
    protected $tickets;
    protected $invoiceDate;
    protected $dueDate;

    public function __construct(array $properties)
    {
        extract($properties);

        $this->id = $id;
        $this->customer = $customer;
        $this->tickets = $tickets;

        // An invoice is always due 30 days after creation
        $this->invoiceDate = new DateTime($date);

        $due = new DateTime($date);
        $due->add(new DateInterval('P30D'));
        $this->dueDate = $due;

    }

    public function getId() {
        return $this->id;
    }

    public function getInvoiceDate() {
        return $this->invoiceDate->format("d.m.Y");
    }

    public function getDueDate() {
        return $this->dueDate->format('d.m.Y');
    }

    public function getCustomer() {
        return $this->customer;
    }

    public function getCustomerName() {
        return "{$this->customer->getFirstName()} {$this->customer->getLastName()}";
    }

    public function getCustomerAddress() {
        return $this->customer->getAddress();
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->tickets as $ticket) {
            $total += $ticket->getPrice() * $ticket->getAmount();
        }
        return  sprintf('%0.2f', $total);
    }

    public function getTotalVat() {
        $totalVat = 0;
        foreach ($this->tickets as $ticket) {
            $totalVat += $ticket->getTotalPrice() * 0.19;
        }
        return  sprintf('%0.2f', $totalVat);
    }

    public function getTotal() {
        return  sprintf('%0.2f', $this->getTotalPrice() + $this->getTotalVat());
    }

    public function getTickets() {
        return $this->tickets;
    }

    public function getNumberTickets() {
        return count($this->tickets);
    }

}