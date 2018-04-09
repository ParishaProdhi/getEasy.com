<?php 
include "../includes/header.php";
include "../includes/newnav.php";
include "../includes/sidebar.php";
?>

<div class="content-wrapper">
<div class="content" style="font-size:10pt;">
<form action="" method="POST" >
<label>Username<span class="req">*</span></label><input  name="username" class="form-control box" type="text" placeholder="Enter username" ></br>
<label>Email<span class="req">*</span></label><input  name="email" class="form-control box" type="text" placeholder="Enter email"></br>
<label>Password<span class="req">*</span></label><input  name="password" class="form-control box" type="password" placeholder="Enter password"></br>
<label>Phone Number<span class="req">*</span></label><input  name="phone_number" class="form-control box" type="number" placeholder="Enter phone number">
<br/>
<input class="post"  type="submit"  name="register" value="Register" >

</form>

<?php 
if(isset($_POST['register'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$email = mysqli_real_escape_string($connection, $email);
$phone_number = mysqli_real_escape_string($connection, $phone_number);
$insertPassword = md5($password);
$hash = rand(999,99999);
$hash = md5($hash);
$flag=0;
$query = "select * from usersignup";
$result=mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result)){
	$email_table = $row['email'];
	$password_table = $row['password'];
if($password_table == $password || $email_table == $email)	{
	  $flag = 1;
  }
}
if($flag==0){
$query = "INSERT INTO usersignup(user_name,email,password,phone_number,hash) value ('{$username}','{$email}','{$insertPassword}',{$phone_number},'{$hash}') ";
$select_user_query = mysqli_query($connection,$query);
if(!$select_user_query){
	die("Query failed".mysqli_error($connection));

}
else{
	echo "<script language='Javascript'>document.location.replace('success.php');</script>";
}
}  
else{
	echo "This email or password already exists!";
}
}


?>
</div>
</div>
</body>
</html>