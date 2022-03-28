<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "../app/controllers/ShopClass.php";
include_once "../app/controllers/SingleProduct.php";

?>
	
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
					<div class="product-details"><!--product-details-->
						
						
							<?php
							if(isset($_SESSION['product'])){
								Singleproduct::increaseview($_SESSION['product']->id)
								?>
								<div class="col-sm-5">
							<div class="view-product">
								<img src="../assests/images/shop/<?=$_SESSION['product']->image?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="../assests/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../assests/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../assests/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="../assests/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../assests/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../assests/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="../assests/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../assests/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../assests/images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
								<div class="product-information"><!--/product-information-->
								<?php
								if($_SESSION['product']->cond == 'new')
								echo('<img src="../assests/images/product-details/new.jpg" class="newarrival" alt="" />');
								?>
								<h2><?=$_SESSION['product']->details_en?></h2>
								<p>Web ID: <?=$_SESSION['product']->id?></p>
								<img src="../assests/images/product-details/rating.png" alt="" />
								<div>
									<span style='font-size:bold;color:orange;'> <?=$_SESSION['product']->price?>LE</span>
									<form method='POST' action='../routes/route.php'>
									<label>Quantity:</label>
									<input type='hidden' name='productId' value="<?=$_SESSION['product']->id?>">
									<input type='hidden' name='user_id' value="<?=$_SESSION['user']->id?>">
									<input type="text" name='quantity'  value="" />
									<input type="submit" name ='cart' class="btn btn-fefault cart" value="Add to cart">
										<!-- <i class="fa fa-shopping-cart"></i>
										Add to cart -->
									</form>
							</div>
								<p><b>Availability:</b> <?=
								($_SESSION['product']->amount >0)?"In Stock":"Out of Stock";?></p>
								<p><b>Condition:</b> <?=
								($_SESSION['product']->cond == 'new')?"New":"";?></p>
								<p><b>Brand:</b> <?=$_SESSION['product']->brand_name?></p>
								<a href=""><img src="../assests/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
							</div>
					</div>
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (<?php
								$reviewData=Singleproduct::getReview($_SESSION['product']->id);
								if($reviewData) echo $reviewData->review_number;
								else echo "0";
								?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../assests/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<?php
									if($reviewData){
										 $reviews=Singleproduct::display($_SESSION['product']->id);
										 foreach($reviews as $key=>$review)	{
											 ?>
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?=$review['username']?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php
										  $created_atTime=(explode(" ",$review['created_at']))[1];
										  $hourCheck=explode(":", $created_atTime)[0];
										if($hourCheck >12){
											$uhr=$hourCheck-12;
											echo $uhr.":".explode(":", $created_atTime)[1]." PM";
										}
										else{

											echo  $hourCheck.":".explode(":", $created_atTime)[1]." AM";

										}
										?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?=(explode(" ",$review['created_at']))[0]?></a></li>
									</ul>
									<p><?=$review['comment']?></p>
											 <?php
										 }									
									}
									?>
									

									<p><b>Write Your Review</b></p>
									<form action="../routes/route.php" method='POST'>
										<span>
										   <input type="hidden" name='product_id' value="<?=$_SESSION['product']->id?>"/> 
											<input type="email" name='email' placeholder="Email Address"/>
											<input type="number" name ='value' min="1" max="5" placeholder="Rate Value" style='margin-top:5px;'/>
											<?php
											if(isset($_SESSION['email']))
											echo $_SESSION['email'];
											if(isset($_SESSION['value']))
											echo $_SESSION['value'];
											?>
										</span>
										<textarea name="comment" ></textarea>
										<!-- <b>Rating: </b> <img src="../assests/images/product-details/rating.png" alt="" /> -->
										<input type="submit" name="review"  class="btn btn-default pull-right">
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php
								$products=Singleproduct::getRecommendedProducts($_SESSION['product']->id,$_SESSION['product']->subcategory_id);
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
						</div>
					</div><!--/recommended_items-->
							<?php
							}
							else{?>
							<div class="product-information mb-2 text-center alert alert-info">
							<h2 >There is no information about that product</h2>
							<div>
							</div>
					       </div>
							<?php

							}
							?>
				</div>
			</div>
		</div>
	</section>
	
	<?php include_once "layouts/footer.php";
	include_once "layouts/foot.php";
	?>