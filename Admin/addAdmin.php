 <?php 
include "includes/header.php";
include "includes/newnav.php";
include "includes/sidebar.php";

?>
<style>
.post{
	font-size:10pt;
	background-color: blue;
	color: white;
	width: 80px;
	height:30px; padding:2px;
	text-align:center;
}
</style>
<div class="content-wrapper">
<div class="content" style="font-size:10pt;">
<form action="addAdmin.php" method="POST" >
<label>Username<span class="req">*</span></label><input  name="username" class="form-control box" type="text" placeholder="Enter username" ></br>
<label>Email<span class="req">*</span></label><input  name="email" class="form-control box" type="text" placeholder="Enter email"></br>
<label>Password<span class="req">*</span></label><input  name="password" class="form-control box" type="password" placeholder="Enter password"></br>
<label>Phone Number<span class="req">*</span></label><input  name="phone_number" class="form-control box" type="number" placeholder="Enter phone number">
<label>Address<span class="req">*</span></label><input  name="address" class="form-control box" type="text" placeholder="Enter address">
<label>Previous Institution<span class="req">*</span></label><input  name="prev_ins" class="form-control box" type="text" placeholder="Enter current working institution">
<br/>
<input class="post"  type="submit"  name="register" value="Register" >

</form>
</div>
</div>
<?php 
if(isset($_POST['register'])){
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$prev_ins = $_POST['prev_ins'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$email = mysqli_real_escape_string($connection, $email);
$phone_number = mysqli_real_escape_string($connection, $phone_number);
$address = mysqli_real_escape_string($connection, $address);
$prev_ins = mysqli_real_escape_string($connection, $prev_ins);

$insertPassword = md5($password);

$query = "INSERT INTO admin_login(user_name,email,password,address,phone_number,previous_instituition) value ('{$username}','{$email}','{$insertPassword}','{$address}',{$phone_number},'{$prev_ins}') ";
$add_admin = mysqli_query($connection,$query);
if(!$add_admin){
	 die('QUERY FAILED'.mysqli_error($connection));
 }
}
?>

</body>
</html>
