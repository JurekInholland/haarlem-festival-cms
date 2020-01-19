<?php

class CartService {

    public static function purchase(PurchaseItem $purchaseItems) {
        $purchaseData = [
            "userId" => $purchaseItems->userId,
            "itemId" => $purchaseItems->itemId,
            "quantity" => $purchaseItems->itemQuantity
        ];
       App::get("db")->insertUpdate("purchases", $purchaseData);
    }
    
}