<?php

// Payments using php wrapper of mollie api
// https://github.com/mollie/mollie-api-php/blob/master/examples/payments/create-payment.php

class PaymentService {


    public static function getClient() {
        $config = parse_ini_file("../src/config/api_keys.ini", true);

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($config["mollie"]);
        return $mollie;
    }

    public function getPayment($paymentId) {
        $payment = self::getClient()->payments->get($paymentId);
        return $payment;
        
    }

    public function getDbStatus($orderId) {
        $sql = "SELECT status FROM payments WHERE payment_id=:payment_id LIMIT 1";
        $params = [":payment_id" => $orderId];
        $status = App::get("db")->query($sql, $params);
        return $status[0]["status"];
    }

    public static function storeStatus(array $order) {
        $sql = "INSERT INTO payments (payment_id, `status`)
        VALUES (:payment_id, :status)
        ON DUPLICATE KEY UPDATE payment_id=VALUES(payment_id), status=VALUES(status)";
        
        $params = [":payment_id" => $order["id"], ":status" => $order["status"]];
        App::get("db")->query($sql, $params);

    }

    public function createPayment(float $price) {
        $orderId = time();

        // Convert passed float to string with two decimal places
        $value = sprintf('%0.2f', $price);

        $payment =  self::getClient()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $value 
            ],
            "description" => "Order #{$orderId}",
            "redirectUrl" => "https://jbaumann.nl/payment/complete/{$orderId}",
            "webhookUrl" => "https://jbaumann.nl/payment/webhook",
            "metadata" => [
                "order_id" => $orderId,
            ],
        ]);
        $paymentInfo = ["id" => $orderId, "status" => $payment->status];
        self::storeStatus($paymentInfo);

        return header("Location: " . $payment->getCheckoutUrl(), true, 303);
    }

}
