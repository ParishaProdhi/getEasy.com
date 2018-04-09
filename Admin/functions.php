
 <?php
  
function add_item($table,$folder_name){
	 global $connection;
	 
 $query = "SELECT * FROM $table";
 $select_item = mysqli_query($connection , $query);
 if(!$select_item){
	 die('QUERY FAILED'.mysqli_error($connection));
 }
 $flag = 0;
$product_name = $_POST['product_name'];
$product_cost = $_POST['product_cost'];
$product_description=$_POST['product_description'];
$compare_product_name = strtolower($product_name);
 while($row = mysqli_fetch_assoc($select_item)){
	  
	 $table_product_name = $row['product_name'];
	 $table_product_name = strtolower($table_product_name);
	 if($table_product_name == $compare_product_name){
		 $flag = 1;
	 }
	 
 }
 if($flag==1){
	 $message = "This product already exists!";
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
				
				$fileDestination = $folder_name.$fileNameNew;
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
		
		$query = "INSERT INTO $table(product_name,product_cost,product_image,product_description) VALUE('{$product_name}',{$product_cost},'{$fileNameNew}','{$product_description}')";
		$create_category_query = mysqli_query($connection,$query);
		if(!$create_category_query){
			die('QUERY FAILED'.mysqli_error($connection));
		} 
	 
 }
 

}


function delete_product($table,$page_name){
	global $connection;
	$delete_product_id=$_GET['delete'];
		$query = "DELETE FROM $table WHERE product_id = {$delete_product_id}";
		$delete_query = mysqli_query($connection , $query);
		echo "<script language='Javascript'>document.location.replace('$page_name.php');</script>";
}


function edit($table,$folder_name){
	global $connection;
	$edit_item_id = $_GET['edit']; ?>
	<div class="content">
	<h3>Edit Item</h3>
<form action="" method="POST">
<label>product name</label><input type="text" name="product_name" class="form-control"></br>
<label>product cost</label><input type="number" name="product_cost" class="form-control"></br>
<label>product description</label><input type="text" name="product_description" class="form-control"></br>
<label for="file">Upload image of product</label></br>
<input type="file" name="file"></br>
<input type="submit" name="update" class="post" value="Edit">
</form>
</div>
<?php 
if(isset($_POST['update'])){
	$a = $_POST['product_name'];
	$b = $_POST['product_cost'];
	$c = $_POST['product_description'];
	
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
				
				$fileDestination = $folder_name.$fileNameNew;
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
	
	$query = "update $table set product_name='{$a}',product_cost={$b},product_image='{$fileNameNew}',product_description='{$c}' where product_id={$edit_item_id}";
	$result = mysqli_query($connection,$query);
	if(!$result){
	 die('QUERY FAILED'.mysqli_error($connection));
 }
}
}

 ?>