<?php
 include "../includes/header.php";
include "../includes/newnav.php"; 
 include "../includes/sidebar.php"; 
 include "../includes/odCart.php";
 
?>

</style>
<div class="content-wrapper" style="font-size:10pt;">
<div class="content">
<div class="col-md-12">
	<div class="card w-75">
	<h3 class="card-title"><b>Payment Order</b></h3></br>
<?php 
writeCart(1);
?>
</div>
</div>
</div>

<?php

if(isset($_POST['billing_info'])){
	if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
		$customer_user_name = $_SESSION['user_name'];
		$customer_user_id = $_SESSION['user_id'];
		$customer_phone_number = $_SESSION['phone_number'];
		$customer_first_name = $_POST['first_name'];
		$customer_last_name = $_POST['last_name'];
		$alt_phone_number = $_POST['alt_phone_num'];
		$address = $_POST['address'];
		$transaction_date = date("Y-m-d");
		$payment = $_SESSION['payment'];
		$payment_in_dollars = $payment * 0.012;
		if($customer_first_name == "" || empty($customer_first_name) || $customer_last_name == "" || empty($customer_last_name) || $address == "" || empty($address) || $alt_phone_number== "" || empty($alt_phone_number) )
		 {
			$message = "Please fill up the required fields!";
    ?>
        <script>
        $(function() {
         $('#myModal').modal('show');
        });
        </script> 
		<?php
		include "open_modal.php"; 
			  }
			
		
		
		else{
			$query = "insert into transaction(customer_user_name,customer_user_id,customer_first_name,customer_last_name,alt_phone_number,address,payment_in_dollars,customer_phone_number,transaction_date) 
			value('{$customer_user_name}',{$customer_user_id},'{$customer_first_name}','{$customer_last_name}',{$alt_phone_number},'{$address}',{$payment_in_dollars},{$customer_phone_number},'{$transaction_date}')";
			$result = mysqli_query($connection,$query);
			if(!$result){
			die('QUERY FAILED'.mysqli_error($connection));
			}
			
		$product_name = $_SESSION['product_name'];
		$price = $_SESSION['price'];
		$quantity = $_SESSION['quantity'];
		$query = "SELECT * FROM transaction ORDER BY transaction_id DESC LIMIT 1";
		$result = mysqli_query($connection,$query);
		$row = mysqli_fetch_assoc($result);
		$transaction_id = $row['transaction_id'];
		for($i=0; $i < count($product_name); $i++){
		$query = "insert into order_details(product_name,product_cost,product_amount,order_transaction_id,user_id) value('{$product_name[$i]}',{$price[$i]},{$quantity[$i]},{$transaction_id},{$customer_user_id})";	
		$result = mysqli_query($connection,$query);
			 }
			 echo "<script language='Javascript'>document.location.replace('transaction.php');</script>";
		}
		
	}
	else{
		$message = "You must login first";
    ?>
        <script>
        $(function() {
         $('#myModal').modal('show');
        });
        </script> 
		<?php
		include "open_modal.php";
	}
}

?>

<div class="content">
<div class="col-md-12">
	<div class="card w-75">
	<h3 class="card-title"><b>Confirm your shipping informations</b></h3></br>
<form action="" method="POST">
<div class="form-group">
<label>First Name<span class="req">*</span></label>
<input type="text" style="font-size:10pt;" class="form-control" name="first_name" >
<label>Last Name<span class="req">*</span></label><input style="font-size:10pt;" class="form-control" type="text" name="last_name" >
<label>Contact Number<span class="req">*</span></label><input style="font-size:10pt;" class="form-control" type="text" name="alt_phone_num" >
 <label>Address Line <span class="req">*</span></label><input style="font-size:10pt;" class="form-control " type="text" name="address"  >
 </div>
<div class="form-group">
<input type="submit" class="post" name="billing_info" value="Confirm">
</div>
</form>
</div>
</div>
</div>


</div>
</body>
</html>