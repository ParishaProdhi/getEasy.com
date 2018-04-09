<?php 
include "includes/header.php";
include "includes/newnav.php"; 
 include "includes/sidebar.php";
?>
<style>
p{
	font-size: 10pt;
	color:black;
}
</style>
<body>
<div class="content-wrapper">
                <div class="content">
</br></br></br></br>
<form  action="search.php" method="POST">
   <input name="search" style="width:300px; font-size:10pt;" class="form-control" type="text" placeholder="search">
  <span class="input-group-btn">
<button class="post" name="submit" type="submit">SUBMIT</button>
</span>
   </form>
   </br></br>
   
  <?php
 if(isset($_POST['submit'])){
  $search = $_POST['search'];
  $query = "SELECT * FROM posts WHERE post_tags LIKE '%{$search}%' ";
  $search_query = mysqli_query($connection, $query);
  if(!$search_query){
	  die("QUERY FAILED".mysqli_error($connection));
  }
  $count = mysqli_num_rows($search_query);
  if($count == 0){
	  echo "<h1>NO RESULT</h1>";
  }
  else{ 
      
        $query = "SELECT * FROM posts WHERE post_tags LIKE '%{$search}%'";
		$select_post = mysqli_query($connection , $query);
		while($row = mysqli_fetch_assoc($select_post)){
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
		<p>Post:<br/><br/><?php echo $post_content ?></p>
		</div>
		<br/> </div><br/>
	<?php } 
 }
 } 
?>

</div>
</div>
</body>
