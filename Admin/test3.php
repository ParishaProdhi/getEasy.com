<?php
include "includes/header.php";
   
?>
<form action="" method="POST">
<label>product name</label><input type="text" name="product_name">
<label>product cost</label><input type="number" name="product_cost">
<label>product description</label><input type="text" name="product_description">
<input type="submit" name="update" class="post" value="Edit">
</form>

<?php 
if(isset($_POST['update'])){
	$a = $_POST['product_name'];
	$b = $_POST['product_cost'];
	$c = $_POST['product_description'];
	$query = "update bistro_c set product_name='{$a}',product_cost={$b},product_description='{$c}' where product_id=9";
	$result = mysqli_query($connection,$query);
	if(!$result){
	 die('QUERY FAILED'.mysqli_error($connection));
 }
}
?>
