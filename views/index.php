<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "../app/controllers/ShopClass.php";
include_once "../app/controllers/indexClass.php";
?>
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="../assests/images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="../assests/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="../assests/images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="../assests/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian">
						<?php
						index::getCategories();
						if (isset($_SESSION['categories'])) {
							foreach ($_SESSION['categories'] as $key => $category) {
								?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#<?= $category['name_en'] ?>">
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												<?= $category['name_en'] ?>
											</a>
										</h4>
									</div>
									<div id="<?= $category['name_en'] ?>" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												<?php
														$subcategories = Shop::getSubCategories($category['id']);
														if ($subcategories) {
															foreach ($subcategories as $key => $subcategory) {
																?>
														<li><a href="../routes/route.php?subcategory=<?=$subcategory['id']?>"> <?= $subcategory['name_en'] ?> </a></li>

													<?php }} else {?>
													<li><a href=""> No Subategories</a></li>
												<?php }?>
											</ul>
										</div>
									</div>
								</div>
							<?php  }
							}
							if (isset($_SESSION['No_Categories'])) {
								?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#">
											<?= $_SESSION['No_Categories'] ?>
										</a>
									</h4>
								</div>
							</div>
						<?php	} ?>
					</div>

					<div class="brands_products">
						<!--brands_products-->
						<h2>Brands</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<?php
								 $brands=Shop::getBrand();
								 if($brands){
									 foreach($brands as $key=>$brand){
										 ?>
								<li><a href="../routes/route.php?brand=<?=$brand['brand_id']?>"> <span class="pull-right">(<?=$brand['product_count']?>)</span><?=$brand['brand_name']?></a></li>
								 <?php } }
								 else {
								?>
								<li><a href=""> <span class="pull-right"></span>No Brands</a></li>
								<?php	 
								 }?>
							</ul>
						</div>
					</div>
					<!--/brands_products-->

					<div class="price-range">
						<!--price-range-->
						<h2>Price Range</h2>
						<div class="well">
							<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
							<b>$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div>
					<!--/price-range-->

					<div class="shipping text-center">
						<!--shipping-->
						<img src="../assests/images/home/shipping.jpg" alt="" />
					</div>
					<!--/shipping-->

				</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--New Products-->
						<h2 class="title text-center">New Products</h2>
						<?php
								$products=index:: getNewProducts();
					if($products){
						foreach($products as $key=>$product){
							?>
							<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="../assests/images/shop/<?=$product['image']?>" alt=""/>
									<h2><?=$product['price']?>LE</h2>
									<p><?=$product['name_en']?></p>
									<a href="../routes/route.php?productId=<?=$product['id']?>/&user_id=<?=$_SESSION['user']->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									<a href="../routes/route.php?product_id=<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</a>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
								<li><a href="../routes/route.php?wish=true&productId=<?=$product['id']?>/&user_id=<?=$_SESSION['user']->id?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>

							<?php
						}
					}
					else{
						?>
						<div class='text-center alert alert-info mb-3'>No Products</div>
						<?php
					}
					?>
					</div><!--New Products-->
					<div class="features_items"><!--New Rated Products-->
						<h2 class="title text-center">Most Rated Products</h2>
						<?php
						$products=index:: getMostRatedProducts();
					if($products){
						foreach($products as $key=>$product){
							?>
							<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="../assests/images/shop/<?=$product['image']?>" alt=""/>
									<h2><?=$product['price']?>LE</h2>
									<p><?=$product['name_en']?></p>
									<a href="../routes/route.php?productId=<?=$product['product_id']?>/&user_id=<?=$_SESSION['user']->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									<a href="../routes/route.php?product_id=<?=$product['product_id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</a>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
								<li><a href="../routes/route.php?wish=true&productId=<?=$product['product_id']?>/&user_id=<?=$_SESSION['user']->id?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>

							<?php
						}
					}
					else{
						?>
						<div class='text-center alert alert-info mb-3'>No Products</div>
						<?php
					}
					?>
					</div><!--Most Rated Products-->
					<div class="features_items"><!--New Ordered Products-->
						<h2 class="title text-center">New Ordered Products</h2>
						<?php
						$products=index::getMostOrderedProducts();
					if($products){
						foreach($products as $key=>$product){
							?>
							<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="../assests/images/shop/<?=$product['image']?>" alt=""/>
									<h2><?=$product['price']?>LE</h2>
									<p><?=$product['name_en']?></p>
									<a href="../routes/route.php?productId=<?=$product['product_id']?>/&user_id=<?=$_SESSION['user']->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									<a href="../routes/route.php?product_id=<?=$product['product_id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</a>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
								<li><a href="../routes/route.php?wish=true&productId=<?=$product['product_id']?>/&user_id=<?=$_SESSION['user']->id?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>

							<?php
						}
					}
					else{
						?>
						<div class='text-center alert alert-info mb-3'>No Products</div>
						<?php
					}
					?>
					</div><!--Most ordered Products-->
					<div class="features_items"><!--Most viewed Products-->
						<h2 class="title text-center">Most viewed Products</h2>
						<?php
								$products=index::getMostViewedproducts();
					if($products){
						foreach($products as $key=>$product){
							?>
							<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="../assests/images/shop/<?=$product['image']?>" alt=""/>
									<h2><?=$product['price']?>LE</h2>
									<p><?=$product['name_en']?></p>
									<a href="../routes/route.php?productId=<?=$product['id']?>/&user_id=<?=$_SESSION['user']->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									<a href="../routes/route.php?product_id=<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</a>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="../routes/route.php?wish=true&productId=<?=$product['id']?>/&user_id=<?=$_SESSION['user']->id?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>

							<?php
						}
					}
					else{
						?>
						<div class='text-center alert alert-info mb-3'>No Products</div>
						<?php
					}
					?>
					</div><!--New Products-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php
								$products=index::getRecommendProducts();
					if($products){
						foreach($products as $key=>$product){
							?>
							<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<h2><?=$product['price']?>LE</h2>
									<p><?=$product['name_en']?></p>
									<a href="../routes/route.php?productId=<?=$product['id']?>/&user_id=<?=$_SESSION['user']->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									<a href="../routes/route.php?product_id=<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</a>
								</div>
							</div>
						</div>
					</div>

							<?php
						}
					}
					else{
						?>
						<div class='text-center alert alert-info mb-3'>No Products</div>
						<?php
					}
					?>	
								</div>
								<div class="item ">
								<?php
								$products=index::getRecommendProducts();
								if($products){
						foreach($products as $key=>$product){
							?>
							<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<!-- <img src="../assests/images/shop/<?=$product['image']?>" alt=""/> -->
									<h2><?=$product['price']?>LE</h2>
									<p><?=$product['name_en']?></p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									<a href="../routes/route.php?product_id=<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</a>
								</div>
							</div>
						</div>
					</div>

							<?php
						}
					}
					else{
						?>
						<div class='text-center alert alert-info mb-3'>No Products</div>
						<?php
					}
					?>	
								</div>
							</div>
							<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>		
						</div>
					</div><!--/recommended_items-->	
				</div>
			</div>
		</div>
	</section>
	
	<?php include_once "layouts/footer.php";
	include_once "layouts/foot.php";
	?>