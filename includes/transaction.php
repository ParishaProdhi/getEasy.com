<?php  
include "header.php";
include "newnav.php"; 
include "sidebar.php";
require_once('config.php');

  
	if(isset($_POST['cancel'])){
		$query = "SELECT * FROM transaction ORDER BY transaction_id DESC LIMIT 1";
		$result = mysqli_query($connection,$query);
		$row = mysqli_fetch_assoc($result);
		$transaction_id = $row['transaction_id'];
		$query = "delete from transaction where transaction_id={$transaction_id}";
		$result = mysqli_query($connection,$query);
		$query = "delete from order_details where order_transaction_id={$transaction_id}";
		$result = mysqli_query($connection,$query);
		echo "<script language='Javascript'>document.location.replace('../home.php');</script>";
	}
	$payment = $_SESSION['payment'];
	$user_payment = $payment *0.012;
	$stripe_payment =$payment * 1.2;
 ?>
 <style>
 .post{
	font-size:10pt;
	background-color: blue;
	color: white;
	width: 80px;
	height:30px; padding:2px;
	text-align:center;
}
</style>
<div class="content-wrapper">
<div class="content">
<h3>Confirm payment</h3>
<h4>Pay via card</h4>
<div class="row">
<form action="" method="POST">
<input type="submit" class="post" name="cancel" value="CANCEL">
</form>
&nbsp;
<form action="charge.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable_key']; ?>"
    data-image="" 
    data-name="GetEasy.com"
    data-description="Your Final Payment : <?php echo "$.".number_format($user_payment,2);?>"
    data-amount=""  >
	
  </script>
</form
</div>

</div>
</div>
</body>
</html>
 <!-- visa card number: 4000000760000002 -->
 