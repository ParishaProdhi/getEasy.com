<?php 
include "includes/header.php";
include "includes/newnav.php";
include "includes/sidebar.php";

?>

<div class="content-wrapper">
<div class="content">
<h1>Bistro-C</h1> </hr>
</br></br></br></br>
<?php 
if(isset($_POST['upload'])){
	
}

if(isset($_POST['submit'])){
	$product_name = $_POST['product_name'];
	$product_cost = $_POST['product_cost'];
	if($product_name == "" || empty($product_name)){
		echo "This field should not be empty";
	}else{
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileType = $_FILES['file']['type'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg','jpeg','png');
	if(in_array($fileActualExt,$allowed)){
		if($fileError === 0){
			if($fileSize < 1000000){
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				
				$fileDestination = '../Food/Bistro C/'.$fileNameNew;
				move_uploaded_file($fileTmpName,$fileDestination);
			}else{
				echo "File size too big!";
			}
			
		}else{
			echo "There was an error uploading your file.";
		}
	} else{
		echo "This type of file not supported.";
	}
		
		$query = "INSERT INTO bistro_c(product_name,product_cost,product_image) VALUE('{$product_name}',{$product_cost},'{$fileNameNew}' )";
		$create_category_query = mysqli_query($connection,$query);
		if(!$create_category_query){
			die('QUERY FAILED'.mysqli_error($connection));
		} 
	}
}
     if(isset($_GET['delete'])){
		$delete_product_id=$_GET['delete'];
		$query = "DELETE FROM bistro_c WHERE product_id = {$delete_product_id}";
		$delete_query = mysqli_query($connection , $query);
		echo "<script language='Javascript'>document.location.replace('admin_bistro_c.php');</script>";
	}

?>

<form action="admin_bistro_c.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="product_name">Add Item</label>
<input type="text" class="form-control" name="product_name"> </br>
<label for="product_cost">Add Cost</label>
<input type="text" class="form-control" name="product_cost">
</div>

<label for="file">Upload image of product</label></br>
<input type="file" name="file">
<div class="form-group">
<input class="btn btn-primary" type="submit" name="submit" value="Add Item">
</div>
</form>
<?php 
if(isset($_GET['edit'])){
	$edit_product_id = $_GET['edit'];
	include "edit_bistro_c.php";
}
?>

</div>

<div class="content">

 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th>Product Id</th>
  <th>Product Name</th>
   <th>Cost</th>
    <th>Image</th>
 </tr>
 </thead>
 <tbody> 
 <?php
 $query = "SELECT * FROM bistro_c";
  $select_item = mysqli_query($connection , $query);
 while($row = mysqli_fetch_assoc($select_item)){
		$product_id = $row['product_id'];
		$product_name = $row['product_name'];
		$product_cost = $row['product_cost'];
		$product_image = $row['product_image'];
		echo "<tr>";
		echo "<td>{$product_id}</td>";
		echo "<td>{$product_name}</td>";
		echo "<td>{$product_cost}</td>";
		echo "<td><a href='#'>CHANGE</a></td>";
        echo "<td><a href='admin_bistro_c.php?delete={$product_id}'>DELETE</a></td>";
        echo "<td><a href='admin_bistro_c.php?edit={$product_id}'>EDIT</a></td>";		
		echo "</tr>";
    } 
 ?>
 </tbody>
 </table>
</div>


</div>
</body>
</html>