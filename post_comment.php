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
.comment_box{
	font-size:11pt; width:700px;height:30px;
}
 </style>
 
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
	 $comment_post_id = $post_id;
	 $comment_author = $_SESSION['user_name'];
	  $comment_author_id = $_SESSION['user_id'];
	  $comment_date = date("Y-m-d h-i-s");
	  $comment_content = $_POST['comment_content'];
	  $query = "insert into comment(comment_post_id,comment_author,comment_author_id,comment_date,comment_content) value({$comment_post_id},'{$comment_author}',{$comment_author_id},'{$comment_date}','{$comment_content}')";
     $result = mysqli_query($connect,$query);
	 
 }
	$query = "SELECT * FROM comment WHERE comment_post_id={$post_id}";
		$select_all_comment = mysqli_query($connection , $query);
		while($row = mysqli_fetch_assoc($select_all_post)){
			$comment_author = $row['comment_author'];
			$comment_date = $row['comment_date'];
			$comment_content = $row['comment_content'];
			?>
		<!-- Blog posts display -->	
		<div class="col-md-12">
		<div class="card w-75">	
		<div class="row">
		<h3><b><?php echo $comment_author; ?> </b></h3>
		<h4><?php echo $post_date ?></h4> </div>
		<div class="row">
		<p><?php echo $post_content ?></p>
		</div>
		<br/>
		</div>
		</div>
<?php  }?>