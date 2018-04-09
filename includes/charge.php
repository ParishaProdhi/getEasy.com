<?php
include "header.php";
include "newnav.php"; 
 include "sidebar.php";
require_once('config.php');

   $payment = $_SESSION['payment'];
	$final_payment = $payment * .012 ;
    $final_payment = floatval(number_format($final_payment,2));	
	$payment_stripe = $final_payment * 100;
	
  $token  ='tok_br'; //$_POST['stripeToken'];
  $email  = 'someone@gmail.com';//$_POST['stripeEmail'];

  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $payment_stripe,
      'currency' => 'usd'
  ));
?>
<div class="content-wrapper" style="text-align:center;">
<div class="content" style="padding-top:50px;">
<?php  echo '<h2>Successfully charged $.'.$final_payment.'</h2>';?>
</div>
</body>
</html>