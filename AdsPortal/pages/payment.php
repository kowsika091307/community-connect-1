<?php
// payment.php
require_once 'includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $ad_id = $_POST['ad_id'];
    $amount = $_POST['amount'];

    // Process payment with Stripe API (simplified example)
    \Stripe\Stripe::setApiKey('sk_test_your_api_key');

    $payment_intent = \Stripe\PaymentIntent::create([
        'amount' => $amount * 100, // Convert to cents
        'currency' => 'usd',
        'payment_method' => $_POST['payment_method_id'],
        'confirm' => true,
    ]);

    // Store payment in database
    $query = "INSERT INTO payments (user_id, ad_id, amount, payment_status, payment_method)
              VALUES ('$user_id', '$ad_id', '$amount', 'completed', 'credit_card')";
    mysqli_query($conn, $query);

    echo "Payment Successful!";
}
?>
