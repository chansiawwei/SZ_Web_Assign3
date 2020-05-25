

<?php 

$firstname= $_GET['firstname'];
$lastname= $_GET['lastname'];
$email= $_GET['email'];
$product= $_GET['product'];
$quantity= $_GET['quantity'];
$order_cost= $_GET['order_cost'];
$card_type= $_GET['card_type'];
$card_number= $_GET['card_number'];
$order_id= $_GET['order_id'];

    echo "<h1>Receipt </h1>";
    echo "<p> First Name:" . $firstname . "</p><br>";
    echo "<p> Last Name:" . $lastname . "</p><br>";
    echo "<p> Email:" . $email . "</p><br>";
    echo "<p> Product:" . $product . "</p><br>";
    echo "<p> Quantity:" . $quantity . "</p><br>";
    echo "<p> Order ID:" . $order_id . "</p><br>";
    echo "<p> Order ID: Pending </p><br>";
    echo "<p> Total Cost:" . $order_cost . "</p><br>";
    echo "<p> Card Type:" . $card_type . "</p><br>";
    echo "<p> Card Number:" . $card_number . "</p><br>";

?>

