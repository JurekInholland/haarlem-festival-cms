<?php

class PurchaseITem {

    public $userId;
    public $itemId;
    public $itemQuantity;
    
    public function __construct($userId, $itemId, $itemQuantity)
    {
        $this->userId = $userId;
        $this->itemId = $itemId;
        $this->itemQuantity = $itemQuantity;
    }


}