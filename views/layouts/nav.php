<header id="header">
	<!--header-->
	<div class="header_top">
		<!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
							<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="https://www.dribble.com"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="https://www.google.com"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header_top-->

	<div class="header-middle">
		<!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-md-4 clearfix">
					<div class="logo pull-left">
						<a href="index.php"><img src="../assests/images/home/logo.png" alt="" /></a>
					</div>
					<div class="btn-group pull-right clearfix">
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								USA
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="">Canada</a></li>
								<li><a href="">UK</a></li>
							</ul>
						</div>

						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								DOLLAR
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="">Canadian Dollar</a></li>
								<li><a href="">Pound</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-8 clearfix">
					<div class="shop-menu clearfix pull-right">
						<ul class="nav navbar-nav">
							<li><a href="../routes/route.php?wish=true"><i class="fa fa-star"></i> Wishlist</a></li>
							<li><a href="../routes/route.php?check=true"><i class="fa fa-crosshairs"></i> Checkout</a></li>
							<li><a href="../routes/route.php?cart=true"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							<?=
							(!isset($_SESSION['user'])) ?
							 '<li><a href="../routes/route.php?login=true"><i class="fa fa-lock"></i> Login</a></li><li><a href="../routes/route.php?register=true"><i class="fas fa-registered"></i>Register</a></li>' 
							 :
							  '<li><a href="../routes/route.php?logout=true"><i class="fas fa-registered"></i>Logout</a></li><li><a href="../routes/route.php?account=true"><i class="fa fa-user"></i> Account</a></li>
								';
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header-middle-->

	<div class="header-bottom">
		<!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="../routes/route.php?index=true">Home</a></li>
							<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<li><a href="../routes/route.php?shop=true">Products</a></li>
									<li><a href="../routes/route.php?product_id=3">Product Details</a></li>
									<li><a href="../routes/route.php?check=true">Checkout</a></li>
									<li><a href="../routes/route.php?cart=true">Cart</a></li>
									<?php
									if(!(isset($_SESSION['user']))){
										echo ('<li><a href="../routes/route.php?login=true" class="active">Login</a></li>');
									}
									   else{
										echo ('<li><a href="../routes/route.php?logout=true" class="active">Logout</a></li>') ;
									   }							?>
								</ul>
							</li>
							<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<li><a href="blog.php">Blog List</a></li>
									<li><a href="blog-single.php">Blog Single</a></li>
								</ul>
							</li>
							<li><a href="contact_us.php">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="search_box pull-right">
						<input type="text" placeholder="Search" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header-bottom-->
</header>
<!--/header-->