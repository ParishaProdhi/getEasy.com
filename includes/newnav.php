  <style>
 a.logoLink{
width:25%;
color:white; font-size:18pt; text-align:center; padding:8px;
}
a.logoLink:hover{
	text-decoration: none;
	color:#08182b;
	font-size:19pt;
}
a.navLink:hover{
	text-decoration: none;
	font-size:14pt;
}
a.navLink{
	color:white; font-size:13pt;  
}
.right{
	width:80%; padding:8px;float:right; text-align:right; word-spacing: 10px;
}
a.cart{
	font-size:10pt;text-align: center; text-decoration: none;display: inline-block;background-color: green;color: white;
	width: 80px;
	height:30px; padding:2px;
}
a.cart:hover{
	font-size:12pt;
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
       
        <a class="logoLink" href="../home.php" >
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
						   if(empty($_SESSION['email'])){
							   echo '<a class="navLink" href="../userlogin/login.php">LOGIN</a>';
						   }
						   else{
							   
							   echo '<a class="navLink" href="../userlogin/profile.php">'.$_SESSION['user_name'].'</a>';
							   echo '<a class="navLink" href="../userlogin/logout.php">LOGOUT</a>';
						   }
						   ?>
                                
                            
                              <a class="navLink" href="../Admin/admin_login.php">ADMIN</a>
                            
							 <a class="navLink" href="../blogs.php">BLOG</a>
							 
							 <a class="cart" href="../includes/seeCart.php">See Cart</a>
                         </div>  
                    </div>
   
    </nav>
    <!-- /NAVBAR -->