<?php 
include "includes/header.php";
include "includes/newnav.php";
include "includes/sidebar.php";
?>

<div class="content-wrapper">
<div class="content">
<h1>View Users</h1> </hr>
</br></br></br></br>

<?php 
     if(isset($_GET['delete'])){
		$delete_user_id=$_GET['delete'];
		$query = "DELETE FROM usersignup WHERE user_id = {$delete_user_id}";
		$delete_query = mysqli_query($connection , $query);
		echo "<script language='Javascript'>document.location.replace('view_users.php');</script>";
	}

?>

<div class="content">

 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th>User Id</th>
 <th>User Name</th>
  <th>Email</th>
   <th>Phone Number</th>
 </tr>
 </thead>
 <tbody> 
 <?php
 $query = "SELECT * FROM usersignup";
 $select_post = mysqli_query($connection , $query);
 while($row = mysqli_fetch_assoc($select_post)){
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$email = $row['email'];
		$phone_number = $row['phone_number'];
		echo "<tr>";
		echo "<td>{$user_id}</td>";
		echo "<td>{$user_name}</td>";
		echo "<td>{$email}</td>";
		echo "<td>{$phone_number}</td>";
        echo "<td><a href='view_users.php?delete={$user_id}'>DELETE</a></td>";		
		echo "</tr>";
    }   
	
	?>

</tbody>
 </table>
</div>


</div>
</body>
</html>