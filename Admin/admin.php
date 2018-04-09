<?php 
include "includes/header.php";
include "includes/newnav.php";
include "includes/sidebar.php";
   $user_id = $_SESSION['admin_user_id'];
		  $user_name = $_SESSION['admin_username'];
		  $email = $_SESSION['admin_email'];
		  $phone_number=$_SESSION['admin_phone_number'];
		 $address = $_SESSION['admin_address'];
		 $prev_ins = $_SESSION['prev_ins'];
          ?>
		  <div class="content-wrapper">
		  <div class="content">
         <div class="col-md-12">
		<div class="card w-75">
          <h2><?php echo "User name: ".$user_name; ?></h2></br></br>
		  <?php 
		  echo "<p>Email: {$email}</p></br>";
		   echo "<p>Phone number: {$phone_number}</p></br>";
		   echo "<p>Address: {$address}</p></br>";
		   echo "<p>Previous Address: {$prev_ins}</p></br>";
		   ?>
		   <div class="row" style="padding:50px;">
          <a class="post" href="adminLogout.php">Log Out</a>
		  
		  </div>
		  </div></div>
		  </div>
		  </div>

</body>
</html>