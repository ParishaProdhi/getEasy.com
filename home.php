<?php 
include "includes/header.php";
include "includes/newnav.php";
include "includes/sidebar.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<!--/.header-->
<div class="content-wrapper">
     <div class="content">
      <div class="row">
	  <div class="w3-content w3-section" style="max-width:500px">
	  <?php 
	  $query = "select * from skincare";
	  $result = mysqli_query($connection,$query);
	  while($row = mysqli_fetch_assoc($result)){
		  $image_name = $row['product_image']; ?>
		  <img class='mySlides' src='Pharmacy\Skin Care Products\<?php echo $image_name ?>' style='height:400px;width:100%'>
	 <?php  } 
	 
	 $query = "select * from beverage";
	  $result = mysqli_query($connection,$query);
	  while($row = mysqli_fetch_assoc($result)){
		  $image_name1 = $row['product_image']; ?>
		  
		  <img class='mySlides' src='Grocery\Tea, Coffee & Beverages\<?php echo $image_name1 ?>' style='height:400px;width:100%'>
	 <?php  }
	 
	 $query = "select * from canned_food";
	  $result = mysqli_query($connection,$query);
	  while($row = mysqli_fetch_assoc($result)){
		  $image_name1 = $row['product_image']; ?>
		  
		  <img class='mySlides' src='Grocery\CANNED & PACKAGED FOODS\<?php echo $image_name1 ?>' style='height:400px;width:100%'>
	 <?php  }
	 
	  ?>	 

	 
	 </div></div> </div>
	 
	 <section id="aboutUs">
  <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>What we do?</h2>
      <p>Get ready for you with the right product suiting your mood right now, right there!</p>
    </div>
    <div class="row feature design">
      <div class="area1 columns right">
        <h3>Order online, get delivered to you.</h3>
        <p>We will get you the product you love most right at the palm of your hand.</br> Order online and get delivered within blink of an eye.</p>
        <p>We cover our service for the most of the nice restaurants at Khulna  </p> 
      </div>
      <div class="area2 columns feature-media left"> <img src="images/feature-img-1.png" alt="" width="100%"> </div>
    </div>
</section>
	 
 
</div>

</div>
</div>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>
