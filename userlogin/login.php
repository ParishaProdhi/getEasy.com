  <style>
  .warning{
	  text-align:center;
	  color:red;
	  font-size:10pt;
  }
  </style>
  <?php 
include "../includes/header.php";
include "../includes/newnav.php";

?> 
 
<body>
 <div class="page-container" style=" padding-top:50px;">
        <!-- PAGE CONTENT -->
        <div class="content h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="login card auth-box mx-auto my-auto" style="height:450px; padding-top:50px;">
                        <div class="card-block text-center">
                            <div class="user-icon">
                                <i class="fa fa-user-circle"></i>
                            </div>

                            <h4 class="text-light">Login</h4>

                            <div class="user-details">
                                <div class="form-group">
								<form action="" method="POST">
                                    <div class="input-group"> 
                                        <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-user-o"></i>
                                            </span>
                                        <input style="font-size:11pt;" type="text" class="form-control" name="email" placeholder="Email" aria-describedby="basic-addon1">
										 </div>
										 <div class="input-group"> 
										 <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-key"></i>
                                            </span>
                                        <input style="font-size:11pt;" type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon1">
										
                                   
									</div> </br>
									<div class="input-group">
									<input  type="checkbox" class="form-control"  name="remember"  aria-describedby="basic-addon1"><span style="font-size:11pt;">Remember Me</span>
									</div>
									<input type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="LOGIN" style="font-size:10pt; padding:5px; width:50% text-align:center;"></form>
									</form>
                                </div>
               <?php 
	if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);
	if($email  == "" || empty($email ) || $password == "" || empty($password)){
		echo "<b class='warning'>Username or Password should not be empty!</b>";
	}else{
		$query="SELECT * FROM usersignup WHERE email='{$email}' and password='{$password}'";
		$select_user = mysqli_query($connection , $query);
		 
	if ( $select_user->num_rows == 0){ // User doesn't exist
    echo "<b class='warning'>You have entered wrong email or password, try again!</b>";
	}
	else{
		$row= mysqli_fetch_assoc($select_user);
	    $_SESSION['user_id']=$row['user_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['phone_number'] = $row['phone_number'];
        $_SESSION['active'] = $row['active'];
        

        $_SESSION['logged_in'] = true;

        echo "<script language='Javascript'>document.location.replace('profile.php');</script>";
    
    
	}
}
}
			   ?>
                            </div>  
                            <div class="user-links" style="font-size:12pt;">
                                <a href="forgot.php" class="pull-left" >Forgot Password?</a>
                                <a href="registration.php" class="pull-right">Register</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /PAGE CONTENT -->
    </div>
</body>
</html>