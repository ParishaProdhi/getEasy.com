<?php 
include "../includes/db.php";
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LOGIN</title>
</head>
<body>
<form action="index.php" method="POST">
<input name="username" type="text" placeholder="Enter username" >
<input name="password" type="password" placeholder="Enter password">
<br/>
<span class="input-group-btn">
<button class="btn btn-primary" name="login" type="submit">SUBMIT</button>
</span>
</form>
</body>
</html>
<?php 

	echo $_COOKIE['user'];

?>