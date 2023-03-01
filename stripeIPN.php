<?php
  
  require_once "config.php";

   \Stripe\Stripe::setVerifySslCerts(false);

  // Token is created using Checkout or Elements!
  // Get the payment token ID submitted by the form:

    $token = $_POST['stripeToken'];
    $email = $_POST["stripeEmail"];
    $productID =$_GET['id'];

    if (!isset($_POST['stripeToken']) || !isset($products[$productID])) {
      header("Location: pricing.php");
      exit();
    }

    $charge = \Stripe\Charge::create(array(
      "amount" => $products[$productID]["price"],
      "currency" => "usd",
      "description" => $products[$productID]["title"],
      "source" => $token,
    ));

    //send email or information  to the database 

    echo 'sucess!  you have been charged $'. ($products[$productID]["price"]/100); 


?>
  