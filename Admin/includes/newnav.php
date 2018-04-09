  <style>
 a.logoLink{
width:25%;
color:white; font-size:20pt; text-align:center; padding:8px;
}
a.logoLink:hover{
	text-decoration: none;
	color:#08182b;
	font-size:22pt;
}
a.navLink:hover{
	text-decoration: none;
	font-size:16pt;
}
a.navLink{
	color:white; font-size:15pt;  
}
.right{
	width:80%; padding:10px;float:right; text-align:right; word-spacing: 20px;
}
  </style>
    <!-- NAVBAR -->
    <nav class="navbar navbar-toggleable-md">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav">
            <span>
                <i class="fa fa-code-fork"></i>
            </span>
        </button>

        <button class="navbar-toggler navbar-toggler-left" type="button" id="toggle-sidebar">
            <span>
               <i class="fa fa-align-justify"></i>
            </span>
        </button>
       
        <a class="logoLink" href="../adminLogout.php" >
            <b><i>GetEasy</i></b>
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <button class="sidebar-toggle btn btn-flat" id="toggle-sidebar-desktop">
                <span>
                    <i class="fa fa-align-justify"></i>
                </span>
            </button>
                        <div class="right">
                               <?php
							   
							   $username = $_SESSION['admin_username'];
							   echo "Welcome! ".$username;
							   ?>
                            
                              <a class="navLink" href="admin.php">Admin Home</a>
							  <a class="navLink" href="adminLogout.php">Log Out</a>
                            
                         </div>  
                    </div>
   
    </nav>
    <!-- /NAVBAR -->