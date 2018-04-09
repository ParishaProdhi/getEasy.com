   
   <?php 
   while($row = mysqli_fetch_assoc($result)){
	$transaction_id = $row['transaction_id'];
	$first_name = $row['customer_first_name'];
	 $last_name = $row['customer_last_name'];
	 $address = $row['address'];
	 $date = $row['transaction_date'];
	 $payment = $row['payment_in_dollars'];
	 ?>
		 <div class="col-md-12">
		<div class="card w-75">
 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th>Transaction Id</th>
  <th>Sent To</th>
   <th>Shipping Address</th>
    <th>Transaction date</th>
	<th>Paid</th>
 </tr>
 </thead>
 <tbody> 
  <tr>
<td><?php echo $transaction_id;?></td>
<td><?php echo $first_name." ".$last_name;?></td>
<td><?php echo $address;?></td>
<td><?php echo $date;?></td>	
<td><?php echo "$".$payment;?></td>				
</tr>

</div></div>

</tbody>
 </table>
</div></div> 
<div class="col-md-12">
		<div class="card w-75">
	<h3>Orders placed for the above transaction</h3>
<table class="table table-bordered table-hover">
<thead>
 <tr>
 
  <th>Product name</th>
   <th>Amount</th>
    <th>Cost per unit</th>
 </tr>
 </thead>
 <tbody> 
<?php
$query1 = "select * from order_details where order_transaction_id = {$transaction_id}";
$result1 = mysqli_query($connection , $query1);
	while($row = mysqli_fetch_assoc($result1)){
		$product_name = $row['product_name'];
		$product_amount = $row['product_amount'];
		$product_cost = $row['product_cost']; ?>
		<tr>
		<td><?php echo $product_name;?></td>
       <td><?php echo $product_amount;?></td>
       <td><?php echo $product_cost;?></td>
		</tr>
	<?php
	} 
?>

   </tbody>
   </table>
   </div>
   </div>

   <?php }?>


	 
 