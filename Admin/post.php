<?php 
include "includes/header.php";
include "includes/newnav.php";
include "includes/sidebar.php";
ob_start();
?>

<div class="content-wrapper">
<div class="content">
<h1>View User Posts</h1> </hr>
</br></br></br></br>

<?php 
     if(isset($_GET['delete'])){
		$delete_post_id=$_GET['delete'];
		$query = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
		$delete_query = mysqli_query($connection , $query);
		echo "<script language='Javascript'>document.location.replace('post.php');</script>";
	}

?>

<div class="content">

 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th>Post Id</th>
 <th>Post Title</th>
  <th>Author</th>
   <th>Post Content</th>
 </tr>
 </thead>
 <tbody> 
 <?php
 $query = "SELECT * FROM posts";
 $select_post = mysqli_query($connection , $query);
 while($row = mysqli_fetch_assoc($select_post)){
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_content = $row['post_content'];
		echo "<tr>";
		echo "<td>{$post_id}</td>";
		echo "<td>{$post_title}</td>";
		echo "<td>{$post_author}</td>";
		echo "<td>{$post_content}</td>";
        echo "<td><a href='post.php?delete={$post_id}'>DELETE</a></td>";		
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