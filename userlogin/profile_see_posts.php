<h2>Posts You have posted on blogs.</h2> 
<?php  
		
		while($row = mysqli_fetch_assoc($result)){
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_date = $row['post_date'];
			$post_content = substr($row['post_content'],0,50);
			?>
		<!-- Blog posts display -->	
		<div class="col-md-12">
		<div class="card w-75">
		<h2><a href="#"><?php echo $post_title ?></a></h2>	
		<h3><p>by <?php echo $post_author ?> </p></h3>
		<h4><p> Posted on <?php echo $post_date ?> </p> </h4>
		<p>Post:<br/><br/><?php echo $post_content ?></p>
		<a class="read_more" href="../post_description.php?read=<?php echo $post_id; ?>">Read More </a> </br></br>
		<a class="read_more" href="profile.php?delete=<?php echo $post_id?>">DELETE</a>
		</div>
		</div>
		<br/><br/>
	<?php } 
	
	?>
	