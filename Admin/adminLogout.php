<?php
session_unset();
session_destroy(); 
echo "<script language='Javascript'>document.location.replace('../home.php');</script>";
?>
