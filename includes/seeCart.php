<?php 
 ob_start();
if(isset($_POST['checkout'])){
	header("location:../includes/checkout.php");
}
include "../includes/header.php";
include "../includes/newnav.php"; 
include "../includes/sidebar.php";
include "../includes/odCart.php";

?>
<div class="content-wrapper">
<div class="content" style="font-size:12pt;">
<form action ="" method="POST">
<?php 

if(isset($_POST['quant'])){
	updateCart();
	
} 
if(isset($_POST['clear'])){
	clearCart();
}
writeCart(-1);
ob_end_flush();
?>

</div>
</div>
</body>
</html>