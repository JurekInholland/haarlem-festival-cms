<?php

class CartService {

    public static function add(array $item) {
        if(isset($_COOKIE["cart"])) { // check if cart has been set yet
            $cartData = json_decode($_COOKIE['cart'], true); // retrieve cart items from existing cookie
        }
        else {
            $cartData = [];
        }
        array_push($cartData, $item);

        setcookie("cart",json_encode($cartData),time() + (86400 * 30), "/"); // create cart cookie
    }

    public static function deleteCookie() {
        setcookie("cart", "", time() - 3600, "/"); 

    }

    public static function remove(int $index) {
        if (isset($_COOKIE["cart"])) {
            $cartData = json_decode($_COOKIE['cart'], true);
            unset($cartData[$index]);
            setcookie("cart",json_encode($cartData),time() + (86400 * 30), "/"); // create cart cookie
        }
    }

    public function createTickets($invoiceId) {
        if(isset($_COOKIE["cart"])) {
            $cartData = json_decode($_COOKIE['cart'], true);
            
            $userId = App::get("user")->getId();
            $total = 0;
            foreach ($cartData as $item) {
                $totalprice = floatval($item[3]) * $item[4];
                $total += $totalprice;
                
                // if event id is food at 9% vat
                if ($item[1] == 2) {
                    $total += $totalprice * 0.09;
                
                // Else vat is 21%
                } else {
                    $total += $totalprice * 0.21;
                }
                $ticket = TicketService::createTicket($userId, $item[0], $item[4], $invoiceId);
            }
            return $total;
        }        
    }

    public function buy() {

    }

    public static function changeAmount(string $itemId) {}


    public static function purchase(PurchaseItem $purchaseItems) {
        $purchaseData = [
            "userId" => $purchaseItems->userId,
            "itemId" => $purchaseItems->itemId,
            "quantity" => $purchaseItems->itemQuantity
        ];
       App::get("db")->insertUpdate("Purchases", $purchaseData);
    }
    
}