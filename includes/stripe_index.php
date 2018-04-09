<?php require_once('./config.php'); ?>
<form action="charge.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable_key']; ?>"
    data-image="" 
    data-name="GetEasy.com"
    data-description="Your Final Payment : <?php echo "tk.".number_format($payment,2);?>"
    data-amount="<?php echo $mulPayment; ?>"  >
	
  </script>
</form>