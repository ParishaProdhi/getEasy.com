<?php
  include "includes/header.php";
include "includes/newnav.php"; 
 include "includes/sidebar.php"; 
 include "includes/odCart.php";
   if(isset($_GET['cart_id']) && isset($_GET['review_id'])){
	   $product_id = $_GET['cart_id'];
	   $product_review_id = $_GET['review_id'];
   }
   $query = "SELECT * FROM menz_wear where product_id = {$product_id}";
		$select_all_item = mysqli_query($connection , $query);
		while($row = mysqli_fetch_assoc($select_all_item)){
			$product_id = $row['product_id'];
			$item = $row['product_name'];
			$cost = $row['product_cost'];
		   $image= $row['product_image']; 
		
?>

<div class="content-wrapper" height="100%">
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
                                    <image style="height:700px; wight:500px;" src="Menz wear/<?php echo $image;?>" alt=""/>
                                </div>
                            </div>
                        </div>
                <div class="col-md-6">
                            <div class="card">
                                <div class="card-block" style="font-size:15pt;color:#660000;">
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
   <?php } 
   include "../review.php";
   ?>
</div>

</body>
</html>


                        
                       
