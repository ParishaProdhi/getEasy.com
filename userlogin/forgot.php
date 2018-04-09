
<?php 
/* Reset your password form, sends reset.php password link */

include "../includes/header.php";
include "../includes/newnav.php";
include "../includes/sidebar.php";
?>
<div class="content-wrapper">
          <div class="content"> 
		<?php
// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $_POST['email'];
	$email = mysqli_real_escape_string($connection, $email);
    $query = "SELECT * FROM usersignup WHERE email='$email'";
	$result = mysqli_query($connection,$query);

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
       echo  "User with that email doesn't exist!";     
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $user_name = $user['user_name'];

        // Session message to display on success.php

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link ';
        $message_body = '
        Hello '.$user_name.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/login-system/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        echo "<p>Please check your email <span>".$email."</span>"
        . " for a confirmation link to complete your password reset!</p>";
  }
}
?>
 
   
  <div class="form" style="font-size:12pt;">

    <h2 style="color:#4d79ff;">Reset Your Password</h2> </br>

    <form action="forgot.php" method="post">
     <div class="field-wrap" >
      <label>
        Email Address<span class="req">*</span>
      </label>
      <input type="email" class="form-control" required autocomplete="off" name="email"/>
    </div>
    <input type="submit" class="post" name="reset" value="RESET"> 
    </form>
  </div>
    </div></div>      
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>
