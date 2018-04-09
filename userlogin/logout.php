<?php

include "../includes/header.php";
include "../includes/newnav.php";
include "../includes/sidebar.php";
session_unset();
session_destroy(); 
?>

<body>
  <div class="content-wrapper">
          <div class="content">
    <div class="form">
          <h1>Thanks for stopping by</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="../home.php"><button class="post"/>Home</button></a>

    </div>
	</div>
	</div>
</body>
</html>
