<?php 
   if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
	$review_user_id = $_SESSION['user_id'];
	$review_user_name = $_SESSION['user_name'];
	$review_date = date("Y-m-d");
	$review_content = $_POST['review_content'];
	if( $review_content == "" || empty($review_content)){
		$message = "This field should not be empty!";
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
		$query = "INSERT INTO review(review_product_id,review_product_review_id,review_content,review_user_id,review_user_name,review_date) VALUE({$product_id},{$product_review_id },'{$review_content}',{$review_user_id},'{$review_user_name}','{$review_date}' )";
		$create_review = mysqli_query($connection,$query);
		if(!$create_review){
			die('QUERY FAILED'.mysqli_error($connection));
		}		
	}
	}
	else{
		 $message = "You must login first!";
    ?>
        <script>
        $(function() {
         $('#myModal').modal('show');
        });
        </script>  
    

<?php 
include "open_modal.php";
		
 }

 ?>
 