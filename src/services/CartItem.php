<?php

class CartItem {

    public $itemID;
    public $type;
    public $itemName;
    public $itemPrice;
    public $quantity;
    public $reservationData;
    
    public function __construct($itemID, $type, $itemName, $itemPrice, $quantity, $reservationData)
    {
        $this->itemID = $itemID;
        $this->type = $type;
        $this->itemName = $itemName;
        $this->itemPrice = $itemPrice;
        $this->itemPrice = number_format((double)$itemPrice, 2); //show decimal values
        $this->quantity = $quantity;
        $this->reservationData = $reservationData;
    }


}