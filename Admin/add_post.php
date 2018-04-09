<?php 
include "includes/header.php";
include "includes/newnav.php";
include "includes/sidebar.php";
ob_start();
?>

<div class="content-wrapper">
<div class="content">
<h1>View Admin Posts</h1> </hr>
</br></br></br></br>

<?php 
if(isset($_POST['submit'])){
	$post_title = $_POST['post_title'];
	$post_content = $_POST['post_content'];
	$post_tags = $_POST['post_tags'];
	$date = date("Y-m-d");
	
	if($post_title == "" || empty($post_title) || $post_content == "" || empty($post_content)){
		echo "This field should not be empty";
	}
	else{
	$query = "INSERT INTO posts(post_title,post_author,post_date,post_content,post_tags) VALUE('{$post_title}','GetEasy.com','{$date}','{$post_content}' ,'{$post_tags}')";
		$create_admin_post = mysqli_query($connection,$query);
		if(!$create_admin_post){
			die('QUERY FAILED'.mysqli_error($connection));
		}
	}
}
     if(isset($_GET['delete'])){
		$delete_post_id=$_GET['delete'];
		$query = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
		$delete_post = mysqli_query($connection , $query);
		echo "<script language='Javascript'>document.location.replace('add_post.php');</script>";
	}

?>

<form action="add_post.php" method="POST">
<div class="form-group">
<label for="post_title">Post Title</label>
<input type="text" class="form-control" name="post_title"> </br>
<label for="post_content">Post Content</label>
<input type="text" class="form-control" name="post_content"></br>
<label for="post_tags">Write down keywords to make sure other people find your post when they search for it</label>
<input type="text" class="form-control" name="post_tags"></br>
</div>
<div class="form-group">
<input class="btn btn-primary" type="submit" name="submit" value="POST">
</div>
</form>

</div>

<?php 
if(isset($_GET['edit'])){
	$edit_post_id = $_GET['edit'];
	include "edit_add_post.php";
}
?>

<div class="content">
 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th>Post ID</th>
  <th>Post Title</th>
   <th>Post Content</th>
    <th>Post Tags</th>
 </tr>
 </thead>
 <tbody> 
 <?php
 $query = "SELECT * FROM posts where post_author='GetEasy.com' ";
 $select_post = mysqli_query($connection , $query);
 while($row = mysqli_fetch_assoc($select_post)){
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_content = $row['post_content'];
		$post_tags = $row['post_tags'];
		echo "<tr>";
		echo "<td>{$post_id}</td>";
		echo "<td>{$post_title}</td>";
		echo "<td>{$post_content}</td>";
		echo "<td>{$post_tags}</td>";
        echo "<td><a href='add_post.php?delete={$post_id}'>DELETE</a></td>";	
        echo "<td><a href='add_post.php?edit={$post_id}'>EDIT</a></td>";				
		echo "</tr>";
    }   
	ob_end_flush();
	?>

</tbody>
 </table>
</div>

</div>
</body>
</html>