<?php 
include "includes/header.php";
include "includes/newnav.php";
include "includes/sidebar.php";
include "functions.php";

if(isset($_POST['submit'])){
	$product_name = $_POST['product_name'];
	$product_cost = $_POST['product_cost'];
	$product_description=$_POST['product_description'];
	if($product_name == "" || empty($product_name) || $product_cost == "" || empty($product_cost) || $product_description == "" || empty($product_description)){
		$message = "This field should not be empty!";
    ?>
        <script>
        $(function() {
         $('#myModal').modal('show');
        });
        </script>  
    

<?php 
include "../open_modal.php";
	}
	else{
		add_item('cooking_essentials','../Grocery/Cooking Essentials/');
	}
}
if(isset($_GET['delete'])){
	delete_product('cooking_essentials','cooking_essentials');
}

?>

<div class="content-wrapper">
<div class="content">
<form action="Fire Fly.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="product_name">Add Item</label>
<input type="text" class="form-control" name="product_name"> </br>
<label for="product_cost">Add Cost</label>
<input type="text" class="form-control" name="product_cost">
<label for="product_cost">Add Description</label>
<input type="text" class="form-control" name="product_description">
</div>

<label for="file">Upload image of product</label></br>
<input type="file" name="file">
<div class="form-group">
<input class="btn btn-primary" type="submit" name="submit" value="Add Item">
</div>
</form>
</div>
<?php 
if(isset($_GET['edit'])){
	$edit_item_id = $_GET['edit'];
	edit('cooking_essentials','../Grocery/Cooking Essentials/');
	
}
?>
<div class="content">

 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th>Product Id</th>
  <th>Product Name</th>
   <th>Cost</th>
    <th>Description</th>
	<th>Image</th>
 </tr>
 </thead>
 <tbody> 
 <?php
  $query = "SELECT * FROM cooking_essentials";
 $select_item = mysqli_query($connection , $query);
 if(!$select_item){
	 die('QUERY FAILED'.mysqli_error($connection));
 }
 while($row = mysqli_fetch_assoc($select_item)){
		$product_id = $row['product_id'];
		$product_name = $row['product_name'];
		$product_cost = $row['product_cost'];
		$product_image = $row['product_image'];
		$product_desciption = $row['product_description'];
		echo "<tr>";
		echo "<td>{$product_id}</td>";
		echo "<td>{$product_name}</td>";
		echo "<td>{$product_cost}</td>";
		echo "<td>{$product_desciption}</td>";
		echo "<td><image class='adminimg' src='../Grocery/Cooking Essentials/{$product_image}' /></td>";
        echo "<td><a href='cooking_essentials.php?delete={$product_id}'>DELETE</a></td>";
        echo "<td><a href='cooking_essentials.php?edit={$product_id}'>EDIT</a></td>";		
		echo "</tr>";
    } 
  
 ?>
 </tbody>
 </table>
</div>

</div>
</body>
</html>