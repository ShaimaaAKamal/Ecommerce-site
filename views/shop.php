<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "../app/controllers/ShopClass.php";
?>


<section id="advertisement">
	<div class="container">
		<img src="../assests/images/shop/advertisement.jpg" alt="" />
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian">
						<?php
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
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Features Items</h2>
					<?php
					if(isset($_SESSION['subcategorypage'])){
					  $products=$_SESSION['subcategorypage'];
					}elseif(isset($_SESSION['brands'])){
						$products=$_SESSION['brands'];
					}
					else {$products=Shop::getProducts();}
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
								<!-- <div class="product-overlay">
									<div class="overlay-content">
									<h2><?=$product['price']?>LE</h2>
									<p><?=$product['name_en']?></p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div> -->
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
					<!-- end of products -->
				</div>
                <div class='text-center '>
				<ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>
				</div>
				<!--features_items-->
			</div>
		</div>
	</div>
</section>

<?php include_once "layouts/footer.php";
include_once "layouts/foot.php";
?>