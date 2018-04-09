<?php include "db.php"; ?>
<header class="header">
  <div class="container">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="../home.php" class="navbar-brand scroll-top logo  animated bounceInLeft"><b><i>Get Easy</i></b></a> </div>
      <!--/.navbar-header-->
      <div id="main-nav" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" id="mainNav">
					
				    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="#">Register</a> </li>
					
	
	<?php 
		$query = "SELECT * FROM category";
		$select_all_category = mysqli_query($connection , $query);
		while($row = mysqli_fetch_assoc($select_all_category)){
			$cat_title = $row['cat_title'];
			if($cat_title == 'Food'){
				echo "<li><a href='../Food/food.php'>{$cat_title}</a></li>";
			}
			else if($cat_title == 'Fashion'){
				echo "<li><a href='../Fashion/fashion.php'>{$cat_title}</a></li>";
			}
			else{
			echo "<li><a href='#'>{$cat_title}</a></li>"; }
		}
		?>       
 
             <li><a href="../Admin/admin.php" data-toggle="modal" >Admin</a>
                    </li>
              <li><a href="../blogs.php" data-toggle="modal" >Blog</a>
                    </li>
					
					
					</ul>
     </div>
	    <!--   <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div> -->

      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header>