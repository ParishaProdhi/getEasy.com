
<?php
  include "../includes/header.php";
include "../includes/newnav.php"; 
 include "../includes/sidebar.php"; 
 include "../includes/odCart.php";
   if(isset($_GET['cart_id']) && isset($_GET['review_id'])){
	   $product_id = $_GET['cart_id'];
	   $product_review_id = $_GET['review_id'];
  if($product_review_id == 1)
  {$query = "SELECT * FROM bistro_c where product_id = {$product_id}";
  $image_src = "Bistro C/";
  }
  else if($product_review_id == 2)
  {$query = "SELECT * FROM deshi_kitchen where product_id = {$product_id}";
  $image_src = "Deshi Kitchen/";
  }
  else if($product_review_id == 3)
  {$query = "SELECT * FROM firefly where product_id = {$product_id}";
  $image_src = "Fire Fly/";
  }
  else if($product_review_id == 4)
  {$query = "SELECT * FROM nawab where product_id = {$product_id}";
  $image_src = "Nawab/";
  }
		$select_all_item = mysqli_query($connection , $query);
		while($row = mysqli_fetch_assoc($select_all_item)){
			$product_id = $row['product_id'];
			$item = $row['product_name'];
			$cost = $row['product_cost'];
		   $image= $row['product_image']; 
		   $description = $row['product_description'];


     ?>

<div class="content-wrapper" >
                <div class="content">
				<div class="row">
                        <div class="col-md-12">
                            <h1 class="content-group-sm text-bold" style="color:#00264d;padding-top:40px;"><?php echo $item; ?></h1>
                        </div>
                    </div> </br>
					
				<div class="row content-group">
		        <div class="col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <image class="cartImg" src="<?php echo $image_src.$image;?>" alt=""/>
                                </div>
                            </div>
                        </div>
                <div class="col-md-6">
                            <div class="card">
                                <div class="card-block" style="font-size:15pt;color:#660000;">
								<p style="font-size:15pt;color:#1a1a1a;"><?php echo $description;?></p></br>
                              <?php  echo "Price.".$cost."tk"; ?> </br></br>
							<form  method="POST"> 
							<span >QTY:</span>
                        <input min="1" name="quantity" value="1" id="proQty" type="number"> <br/><br/>
						   <i class="fa fa-cart-plus"></i>
							<input type="submit" style="color:#71370f;background-color:#f7b307;" name="addToCart" value="Add To Cart">
							<?php 
							if(isset($_POST['addToCart'])){
							addToCart($item,$cost);
							}
							?>
							</form>
							

							
                                </div>
                            </div>
                        </div>
                    </div>
		
</div>
   <?php } ?>
   <div class="content">
   <div class="col-md-12">
		<div class="card w-75">
<form action="" method="POST">
<div class="form-group">
<label>Write a review</label>
<input style="font-size:11pt;" type="text"  class="form-control" name="review_content">
</div>
<div class="form-group">
<input class="post" type="submit" name="review" value="POST">
</div>
</form>	
   <?php
   if(isset($_POST['review'])){
	   include "../review.php";
	 }
	  $query="select * from review where review_product_id={$product_id} && review_product_review_id={$product_review_id}";
 $show_review = mysqli_query($connection,$query);
 while($row = mysqli_fetch_assoc( $show_review)){
    $review_author = $row['review_user_name'];
	$review_date = $row['review_date'];
	$review_content = $row['review_content'];
	?>
	<div class="col-md-12">
		<div class="card w-75">	
		<h3 Style="color:#4d79ff;"><?php echo     $review_author; ?> </h3>
		<h4 Style="color:#001a66;">Gave review On: <?php echo $review_date ?></h4> 
	<div class="col-md-10">
		<div class="card w-75">
		<p> <?php echo $review_content ?></p> </div></div>
		
		<br/>
		</div>
		</div>
	<?php
 }
	 
   } ?>
</div>
</div>
</div>
</div>
</body>
</html>


                        
                       
