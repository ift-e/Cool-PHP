<?php
interface PaymentGateway
{
    function sendPayment($payment);
}

class PaymentProcessor
{
    private $gateway;
    function __construct(PaymentGateway $pg)
    {
        $this->gateway = $pg;
    }
    function purchaseProduct($amount)
    {
        $this->gateway->sendPayment($amount);
    }
}

class PayPal implements PaymentGateway
{
    function sendPayment($payment)
    {
        echo "{$payment} Dollar Processed From Paypal";
    }
}
class Bkash
{
    function makePayment($amount, $currency = null)
    {
        echo "{$amount} Processed From Bkash";
    }
}
class BkashAdapter implements PaymentGateway
{
    private $bkash;
    function __construct(Bkash $bkash)
    {
        $this->bkash = $bkash;
    }

    function sendPayment($payment)
    {
        $this->bkash->makePayment($payment);
    }
}
$bkash = new Bkash();
$bkashAdapter = new BkashAdapter($bkash);
$pp = new PaymentProcessor($bkashAdapter);
$pp->purchaseProduct(300);