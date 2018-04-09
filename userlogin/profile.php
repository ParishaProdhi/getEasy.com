<?php
include "../includes/header.php";
include "../includes/newnav.php";
include "../includes/sidebar.php"; 

if ( $_SESSION['logged_in'] != 1 ) {
 echo "You must log in before viewing your profile page!";    
}
else {
    $user_id = $_SESSION['user_id'];
	$active = $_SESSION['active'];
}

  if(isset($_POST['update'])){
		  if(isset($_POST['edit_un']) || isset($_POST['edit_pn'])){
			  $new_user_name = $_POST['edit_un'];
			  $new_phone_number = $_POST['edit_pn'];
			  $_SESSION['user_name'] = $new_user_name;
			  $_SESSION['phone_number']= $new_phone_number;
			  $query = "update usersignup set user_name='{$new_user_name}',phone_number={$new_phone_number} where user_id = {$user_id}";
			  $result = mysqli_query($connection , $query);
			  
		  }
	
		   
	  }
	  if(isset($_GET['delete'])){
		$delete_post_id = $_GET['delete'];
		$query = "delete from posts where post_id = {$delete_post_id}";
		$result = mysqli_query($connection , $query);
		if(!$result){
	 die('QUERY FAILED'.mysqli_error($connection));
	}
	  }
?>
<style>
p{
	 font-size:11pt;
	 color:#6699ff;
 }
.post{
	font-size:10pt;
	background-color: blue;
	color: white;
	width: 80px;
	height:30px; padding:2px;
	text-align:center;
}
a.post:hover{
	text-decoration:none;
	color:white;
}
h1{
	color:#00004d;
}
h2,h3{
	color:#0055ff;
	font-size:13pt;
}
</style>
  <div class="content-wrapper">
          <div class="content">
  

          <h1>Welcome</h1>
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
		  $query = "select * from usersignup where user_id = {$user_id}";
		  $result = mysqli_query($connection , $query);
          while($row = mysqli_fetch_assoc($result)){
		 
		  $user_name = $row['user_name'];
		  $email = $row['email'];
		  $phone_number = $row['phone_number'];
		  $password = $row['password'];
		  if(isset($_POST['change'])){
			  $old_pass= $_POST['old_pass'];
			  $old_pass = mysqli_real_escape_string($connection, $old_pass);
			  $old_pass = md5($old_pass);
			  if($old_pass == $password){
			  $new_pass = $_POST['new_pass'];
			  $new_pass = mysqli_real_escape_string($connection, $new_pass);
			  $new_pass = md5($new_pass);
			  $query = "update usersignup set password='{$new_pass }' where user_id={$user_id}";
			  $result2 = mysqli_query($connection , $query);
			  if(!$result2){
	 die('QUERY FAILED'.mysqli_error($connection));
 }
			  }
			  else{
				  echo "wrong password!";
			  }
		  }
          ?>
         <div class="col-md-12">
		<div class="card w-75">
          <h2><?php echo "User name: ".$user_name; ?></h2></br></br>
		  <?php 
		  echo "<p>Email: {$email}</p></br>";
		   echo "<p>Phone number: {$phone_number}</p></br>";
		   ?>
		   <div class="row" style="padding:50px;">
          <a class="post" href="logout.php">Log Out</button></a> &nbsp;&nbsp;&nbsp;&nbsp;
		  <form action="" method="POST">
		  <input type="submit" class="post" name="edit" value="Edit Profile"> &nbsp;&nbsp;&nbsp;&nbsp;
		   <input type="submit" class="post" name="change_pass" value="Change Password"></br>
		   <?php 
		   if(isset($_POST['edit'])){
			   include "test1.php";
		   }
		   if(isset($_POST['change_pass'])){
		 include "change_pass.php";
	}
		   ?>
		  </form>
		  </div>
		  </div></div>
		 <h2>Products You have bought</h2> 

	  <?php 
	  }
	  $query = "select * from transaction where customer_user_id={$user_id}";
	  $result = mysqli_query($connection , $query);
	  include "profile_transact.php";
	  $query = "select * from posts where author_id={$user_id}";
	  $result = mysqli_query($connection , $query);
	  include "profile_see_posts.php";
	 ?>
	 
   </div>
   </div>


</body>
</html>
