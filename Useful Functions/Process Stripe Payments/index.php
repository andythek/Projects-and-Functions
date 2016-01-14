<html>
<head>
<title>Stripe Payment Example</title>
</head>
<body>
<center>
<form action="process.php" method="POST" class="checkout" id="payment-form">

<script src="https://checkout.stripe.com/checkout.js" 
        class="stripe-button"
        data-key='PUBLIC KEY'
        data-amount="1000" 
        data-description="ITEM"
		data-billingAddress="true">
		
    </script>

</form>
</center>
</body>

</html>