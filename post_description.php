<?php  
include "includes/header.php";
include "includes/newnav.php"; 
 include "includes/sidebar.php";
 ?>
 <style>
 p{
	 font-size:10pt;
	 color:black;
 }
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
.comment_box{
	font-size:11pt; width:700px;height:60px;
}
 </style>
 <div class="content-wrapper">
            <div class="content" >
				
				<?php
if(isset($_GET['read'])){
	$post_id = $_GET['read'];
	$query = "SELECT * FROM posts WHERE post_id={$post_id}";
		$select_all_post = mysqli_query($connection , $query);
		while($row = mysqli_fetch_assoc($select_all_post)){
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_date = $row['post_date'];
			$post_image = $row['post_image'];
			$post_content = $row['post_content'];
			?>
		<!-- Blog posts display -->	
		<div class="col-md-12">
		<div class="card w-75">
		<h2><a href="#"><?php echo $post_title ?></a></h2>	
		<h3><p>by <?php echo $post_author ?> </p></h3>
		<h4><p> Posted on <?php echo $post_date ?> </p> </h4>
		<p>Post:<br/></br><?php echo $post_content ?></p>
		<br/><br/>
		</div>
		</div>
		
		<div class="col-md-12">
		<div class="card w-75">
	<!-- comment section start -->	
<form action="" method="POST">
<div class="form-group">
<label>Add comment</label>
<input type="text" class="form-control comment_box" name="comment_content"></br>
</div>
<div class="form-group">
<input class="post" type="submit" name="comment" value="COMMENT">
</div>
</form>
<?php 
 if(isset($_POST['comment'])){
	 if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
	  $comment_post_id = $post_id;
	  $comment_author = $_SESSION['user_name'];
	  $comment_author_id = $_SESSION['user_id'];
	  $comment_date = date("Y-m-d");
	  $comment_content = $_POST['comment_content'];
	  if($comment_content == "" || empty($comment_content)){
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
	  $query = "insert into comment(comment_post_id,comment_author,comment_author_id,comment_date,comment_content) value({$comment_post_id},'{$comment_author}',{$comment_author_id},'{$comment_date}','{$comment_content}')";
      $result = mysqli_query($connection,$query);
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
 }
	$query1 = "SELECT * FROM comment WHERE comment_post_id={$post_id} order by comment_date desc";
		$select_all_comment = mysqli_query($connection , $query1);
		while($row = mysqli_fetch_assoc($select_all_comment)){
			$comment_author = $row['comment_author'];
			$comment_date = $row['comment_date'];
			$comment_content = $row['comment_content'];
			?>
		<!-- Blog posts display -->	
		<div class="col-md-12">
		<div class="card w-75">	
		<h3 Style="color:#4d79ff;"><?php echo $comment_author; ?> </h3>
		<h4 Style="color:#001a66;">Commented On:<?php echo $comment_date ?></h4> 
	<div class="col-md-8">
		<div class="card w-75">
		<p> <?php echo $comment_content ?></p> </div></div>
		
		<br/>
		</div>
		</div>
<?php  }?>
		<!-- comment section end-->
		</div>
		</div>
<?php } }?>
</div></div>
</body>
</html>