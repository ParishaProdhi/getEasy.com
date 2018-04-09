<?php  
include "includes/header.php";
include "includes/newnav.php"; 
 include "includes/sidebar.php";
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
label{
	font-size:12pt;
}

 </style>
<div class="content-wrapper">
         <div class="content">
				
	<?php 
if(isset($_POST['submit'])){
	if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
	$author_id = $_SESSION['user_id'];
	$post_author = $_SESSION['user_name'];
	$date = date("Y-m-d");
	$post_title = $_POST['post_title'];
	$post_content = $_POST['post_content'];
	$post_tags = $_POST['post_tags'];
	if($post_title == "" || empty($post_title) || $post_content == "" || empty($post_content)){
		$message = "Provide required fields!";
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
		$query = "INSERT INTO posts(post_title,post_author,author_id,post_date,post_content,post_tags) VALUE('{$post_title}','{$post_author}',{$author_id},'{$date}','{$post_content}' ,'{$post_tags}')";
		$create_post = mysqli_query($connection,$query);
		if(!$create_post){
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
		
 } } ?>


<form action="" method="POST">
<div class="form-group">
<label for="post_title">Post Title<span class="req">*</span></label>
<input type="text" style="font-size:11pt; width:700px;" class="form-control" name="post_title"> </br>
<label for="post_content">Post Content<span class="req">*</span></label>
<input type="text" style="font-size:11pt; width:700px;height:150px;" class="form-control" name="post_content"></br>
<label for="post_tags">Write down keywords to make sure other people find your post when they search for it</label>
<input type="text" style="width:700px;font-size:11pt;" class="form-control" name="post_tags"></br>
</div>
<div class="form-group">
<input class="post" type="submit" name="submit" value="POST">
</div>
</form>			
</div>
</div>			
		</body>
	</html>