<?php 
function addToCart($item, $cost){
	if(empty($_SESSION['product_name'])){
	$_SESSION['product_name']=array();
	$_SESSION['price']=array();
	$_SESSION['quantity']=array();
	}
	$flag = 0;
	$product_name = $_SESSION['product_name'];
	$quantity = $_SESSION['quantity'];
	for($i=0; $i < count($product_name); $i++){
		if($product_name[$i] == $item){
			$_SESSION['quantity'][$i] = $_POST['quantity'];
	      	$flag=1;
		}
	}
	if($flag!=1){
	array_push($_SESSION['product_name'],$item);
	array_push($_SESSION['price'],$cost);
	array_push($_SESSION['quantity'],$_POST['quantity']);
	}
}

function writeCart($cnum){
	if(!empty($_SESSION['product_name'])){
		$product_name = $_SESSION['product_name'];
		$price = $_SESSION['price'];
		$quantity = $_SESSION['quantity'];
	echo "<table class='table table-bordered table-hover'><thead><tr>
       <th>Product Name</th>
       <th>Price</th>
       <th>Quantity</th>
    </tr></thead><tbody> ";
	  $total = 0;
		for($i=0; $i < count($product_name); $i++){
		echo "<tr>";
		echo "<td>".$product_name[$i]."</td>";
		echo "<td>".$price[$i]."Tk.</td>";
		if($cnum<0) {
			echo "<td><input type='text' name='quant[]' size='7' value=".$quantity[$i]."></td>";
		}
		else{
			echo "<td>".$quantity[$i]."Tk.</td>";
		}
		echo "<td>".number_format($price[$i]*$quantity[$i],2)."Tk.</td>";
		echo "</tr>";
		$total = $total + $price[$i]*$quantity[$i] ;
		}
		echo "</br><tr><td colspan='3'  ><strong>Subtotal:&nbsp;</strong></td><td>".number_format($total,2)."Tk.</td></tr>";
		if($cnum<0){
			echo "<tr><td colspan='6' align='center'>";
			echo "<input style='color:#71370f;background-color:#f7b307;' type='submit' name='update' value='UPDATE CART' >";
			echo "<input style='color:#71370f;background-color:#f7b307;' type='submit' name='clear' value='CLEAR CART'>";
			echo "<input style='color:#71370f;background-color:#f7b307;' type='submit' name='checkout' value='CHECK OUT'>";
			echo "</td></tr>";
		}
		else{
		   echo "<tr><td colspan='3'><strong>Shipping Charge:&nbsp;</strong></td><td><input type='hidden' name='total' value='".number_format(.08*$total,2)."'  >".number_format(.08*$total,2)."Tk.</td></tr>";
		   echo "<tr><td colspan='3'><strong>Total:&nbsp;</strong></td><td><input type='hidden' name='total' value='".number_format(1.08*$total,2)."'  >".number_format(1.08*$total,2)."Tk.</td></tr>";
         $subTotal = 1.08*$total;		 
		 $_SESSION['payment']= $subTotal;  
		}
		echo "</tbody></table>";
		
	}
	else{
		echo "<h3>Your cart is empty</h3>";
	}
}

function updateCart(){
	$_SESSION['quantity']=array();
	$quantA = $_POST['quant'];
	$i = 0;
	foreach($quantA as $q){
		if($q > 0){
			array_push($_SESSION['quantity'],$q);
			$i++;
		} else{
			array_splice($_SESSION['product_name'],$i,1);
			array_splice($_SESSION['price'],$i,1);
			
		}
	}
}

function clearCart(){
	unset($_SESSION['product_name']);
	unset($_SESSION['price']);
	unset($_SESSION['quantity']);
}

?>