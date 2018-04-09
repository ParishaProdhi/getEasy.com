<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

</head>
<body>
<div class="content">
<div class="left">
<!-- Add the image name here -->
<image class="des_image" src="addidas ZNE 2 Sweat In Black.jpg" alt=""/> 
</div>
<div class="right">
<!-- Add the product name here -->
<h2>Product name<h2></br>
<a href="#"><h4>Write a review</h4></a></br>
<div class="productPriceArea">
<!-- Add the price here -->
<p>Our price: Tk.Price</p>
<!-- ANo need to touch shipping cost -->
<p>Shipping cost: Tk.50</p>
</div></br>
<div>
                        <span >QTY:</span>
                        <button field="quantity" type="button" disabled="disabled">-</button>
                        <input min="1" name="quantity" value="1" id="proQty" type="number">
                        <button class="qtyplus proQtyPlus" field="quantity" type="button">+</button>
                        
</div> </br>   
                     
 <button id="btn_add_to_cart" class="btnAddToCart" type="button" onclick="addToCart()" ><i class="fa fa-cart-plus"></i> <span>Add to Cart</span></button>
   

</div>
</div>
</br>
<div class="center">
<!-- fill all the following informations. product description goes here -->
<h4>Product information</h4>
<p>Name</p>
<p>Company:</p>
<p>Import date:</p>
<p>Manufactured in: </p>
<p>Distributor:</p>

</div>
</body>
</html>