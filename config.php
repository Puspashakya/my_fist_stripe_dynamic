<?php 
    require_once "stripe-php-master/init.php";
    require_once "products.php";

    $stripeDetails = array(
        
        "publishableKey"=>"pk_test_51Mfar8G8IMG50CI54Kgqf9bXWLaTTGsiE37NlR2Et3GY9W05LJv1LBhv0oXb6XDxI7VZF4HZ43DC9s9wjDPRsTXu00K35cEroa",
        "secretKey"=>"sk_test_51Mfar8G8IMG50CI5hYWqcplyQ0Gm7jqXRPuaqZ6XO3wgmcQtmi8HMWqo5OwnM52pzvTNTz47Pxd4CM9z5ZriQ7xB00iReWxqhj"

    );

    \Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>

