<?php

require_once '../PaymentGateway/Stripe/Transaction.php';
require_once '../PaymentGateway/Paddle/Transaction.php';
require_once '../PaymentGateway/Paddle/CustomerProfile.php';
//require_once '../PaymentGateway/Paddle/DateTime.php';
require_once '../PaymentGateway/Notification/Email.php';

use app\Classes\PaymentGateway\Paddle\{Transaction};
use app\Classes\PaymentGateway\Paddle\CustomerProfile;
use app\Classes\PaymentGateway\Stripe\Transaction as StripeTransaction;

// preferable
//use PaymentGateway\Paddle;

$paddleTransaction = new Transaction();
$stripeTransaction = new StripeTransaction();
$paddleCustomerProfile = new CustomerProfile();

var_dump($paddleCustomerProfile, $paddleTransaction, $stripeTransaction);
