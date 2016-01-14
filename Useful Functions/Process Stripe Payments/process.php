<?php
require_once('stripe/init.php'); //Include Stripe

\Stripe\Stripe::setApiKey('PRIVATE API KEY'); //Stripe Private Key

    if (isset($_POST['stripeToken'])) {
        $token    = $_POST['stripeToken']; //Retrieve Payment Token
        $email    = $_POST['stripeEmail']; //Retrieve Payment Email
        $fullName = $_POST['stripeBillingName']; //Retrieve Payee Name
        
        $customer = \Stripe\Customer::create(array(  
            'email' => $email,
            'card' => $token
        )); //Create Customer
        
        $charge = \Stripe\Charge::create(array( 
            'customer' => $customer->id,
            'amount' => 1000,
            'currency' => 'usd',
            'description' => '2 Raffle Tickets'
        )); //Attempt To Charge Card
        echo '<script>alert("Card Charged")</script>'; //Success!
    } 
	else //If Payment Failed
	{
		echo '<script>alert("Payment Failed")</script>'; //Let User Know Payment was Unsuccessful
	}
?>
