<?php

class CartController extends Controller {   
    

    public function __construct()
    {
        if (App::get("user")->getName() == "Guest") {
            throw new NotLoggedIn();
        }
    }


     // Override controller's view method to always include cart specific partials
     public static function view(string $viewName, array $data = []) {

        $data["head"] = "../src/views/cart/head.php";
        Controller::view($viewName, $data);

    }

    public static function index() {
        
        $cartData = json_decode($_COOKIE['cart'], JSON_PRETTY_PRINT); // store cart items in array
        // die(var_dump($cartData));

        if(!isset($_COOKIE["cart"])) { // if cart doesn't exist then set default values
            $totalPrice = 0;
            $itemsData = array();
        } else { // if cart contains items
            $cartData = json_decode($_COOKIE['cart']); // store cart items in array

            $totalPrice = 0;

            foreach ($cartData as $itemData) { // loop through cart items
                // create an object of cart items found in cart data array. // add object to an array of objects
                $itemsData[] = new CartItem($itemData[0], $itemData[1], $itemData[2], $itemData[3], $itemData[4], $itemData[5]);
                $price = $itemData[3] * $itemData[4];
                $totalPrice += $price; // calculate total price
            }
        }
        return self::view("cart/cart", ["itemsData" => $itemsData, "total" => $totalPrice]);
    }

    public static function purchase() { // purchase items in shopping cart method
        $invoiceId = generateUuid(6);
        // die(var_dump($_POST));
        if ($_POST) {
            UserService::setCustomerData($_POST);
        }
        $total = CartService::createTickets($invoiceId);
        PaymentService::createPayment($total, $invoiceId);
        CartService::deleteCookie();
        return;
        
        $itemQuantity = $_POST["itemQuantity"]; // retrieve item quantities
        $quantity = explode(" ",$itemQuantity); //convert item quantities to array values
        $newTotalPrice = 0; // need new total price because item quantity value could've has changed
        $counter = 1;

        if(isset($_COOKIE["cart"])) { // check if cart exists            
            $purchaseData = unserialize($_COOKIE['cart']); // store cart items in array
            die(var_dump($purchaseData));
            foreach ($purchaseData as $itemData) { // loop through cart items
                CartService::purchase(new PurchaseItem(1, $itemData[0], $quantity[$counter])); // insert items to purchase table

                if ($itemData[1] == 2) { // check if item is a reservation
                   RestaurantService::book($itemData[5]);  // book reservation
                }

                $price = $itemData[3] * $quantity[$counter];
                $newTotalPrice += $price;
                $counter++;
            }

            setcookie("cart", "", time()-3600); // delete cookie
        } else {
            // echo "Shopping cart is empty. Please select a ticket / reservation";
        }
        return self::redirect("food"); // redirect to payment environment 
    }

}