<?php 
include "../includes/header.php";
include "../includes/newnav.php"; 
 include "../includes/sidebar.php";
?>
<body>

 <div class="content-wrapper">
                <div class="content">
				<div class="row">
					<div class="col-md-12" style="padding-left:100px;padding-top:40px;">
                            <h1 class="text-bold content-group-sm" style="color:#00264d;" ><b>Perfume</b></h1> <br/>
                        </div>
					</div>
                    <div class="row">
					<div class="col-md-12" style="padding-left:100px; ">
                            <h4 class="text-bold content-group-sm" style="color:#990000;">Have a look at our products</h4>
                        </div>
					</div>
				</div>
		<?php 
		$query = "SELECT * FROM perfume";
		$select_all_item = mysqli_query($connection , $query);
		while($row = mysqli_fetch_assoc($select_all_item)){
			$product_id = $row['product_id'];
			$review_id = $row['review_id'];
			$item = $row['product_name'];
			$cost = $row['product_cost'];
			$image= $row['product_image'];
			?>
		<div class="col-md-4" style="text-align:center; font-size:13pt;color:#660000; ">
         <div class="card">
		   <div class="card-header" style="color:#660000;">
                 <?php echo $item; ?>
              </div>
			  <div class="card-block" style="color:#660000;">
                     <image class="orderimg" src="Perfume/<?php echo $image;?>" alt=""/><br/>
					<?php  echo "Price.".$cost."tk</br>";  
                 echo "<a href='addToCosmeticsCart.php?cart_id={$product_id}&review_id={$review_id}'><button class='orderbutton'>View</button></a> "; ?>
                                </div>
                            </div>
                        </div>
	<?php } ?>
				
</div>	
			
</body>
</html>


