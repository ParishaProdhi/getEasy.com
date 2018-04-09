<?php 
include "includes/header.php";
include "includes/newnav.php"; 
 include "includes/sidebar.php";
?>
<style>
a.read_more{
	font-size:10pt;
	text-decoration: none;
	display: inline-block;
	background-color: blue;
	color: white;
	width: 80px;
	height:30px; padding:2px;
	text-align:center;
}
a.write_review{
	font-size:15pt;
	background-color: #00134d;
	color:  #ccd9ff;
	width: 600px;
	height:70px; padding:2px;
	text-align:center;
}
a.write_review:hover{
	font-size:16pt;
	background-color:#ccd9ff;
	color:#00134d;
	text-decoration: none;
}
.search{
	font-size:8pt;
	text-decoration: none;
	display: inline-block;
	background-color: blue;
	color: white;
	width: 100px;
	height:30px; padding:2px;
	text-align:center;
}
.search_box{
	width:200px;
	height:30px;
	background-color: white;
}
p{
	 font-size:10pt;
	 color:black;
 }
</style>
<body>
<div class="content-wrapper" >
                <div style="float:center" class="content">
<br/><br/><br/><br/>

<form  action="search.php" method="POST">
   <input class="search_box form-control" name="search" type="text" >
 <span class="input-group-btn">
<button style="width:50px;" class="search" name="submit" type="submit">SEARCH</button>
</span>
   </form>
   </br></br></br></br></br></br>
  <a class="write_review" href="write_review.php">Give us your feedback or take part in the discussion</a> 
 
   
   </div>
  
   <!-- end of search bar -->
<div id="#top"></div>
<section id="services" class="page-section colord">
  <div class="container" >
     <?php 
		$query = "SELECT * FROM posts ORDER BY post_date DESC";
		$select_all_post = mysqli_query($connection , $query);
		while($row = mysqli_fetch_assoc($select_all_post)){
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_date = $row['post_date'];
			$post_image = $row['post_image'];
			$post_content = substr($row['post_content'],0,50);
			?>
		<!-- Blog posts display -->	
		<div class="col-md-12">
		<div class="card w-75">
		<h2><a href="#"><?php echo $post_title ?></a></h2>	
		<h3><p>by <?php echo $post_author ?> </p></h3>
		<h4><p> Posted on <?php echo $post_date ?> </p> </h4>
		<p>Post:<br/><br/><?php echo $post_content ?></p>
		<a class="read_more" href="post_description.php?read=<?php echo $post_id; ?>">Read More </a>
		</div>
		</div>
		<br/><br/>
	<?php } ?>
  </div>
</section>


</div>
</div>
</body>
</html>
