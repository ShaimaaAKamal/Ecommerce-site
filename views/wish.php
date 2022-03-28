<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "../app/controllers/WishClass.php";
?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Wishlist</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Name</td>
							<td class="description">Id</td>
							<td class="price">Price</td>						
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						if(isset($_SESSION['user'])){
						   $products=WishClass::wishdetails($_SESSION['user']->id);
						   if($products){
							   foreach($products as $key=>$product){
								   ?>
	<tr> 
							<td class="cart_description">
								<h4><a href="../routes/route.php?product_id=<?=$product['product_id']?>"><?=$product['product_name']?></a></h4>
							</td>
							<td><p>Web ID: <?=$product['product_id']?></p>
</td>
							<td class="cart_price">
								<p><?=$product['price']?>LE</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete"  href="../routes/route.php?delete=true&productId=<?=$product['product_id']?>&user_id=<?=$_SESSION['user']->id?>&wished=true;"><i class="fa fa-times"></i></a>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete"  href="../routes/route.php?productId=<?=$product['product_id']?>/&user_id=<?=$_SESSION['user']->id?>">Add to Cart</a>
							</td>
						</tr>
								   <?php
							   }

						   }
						   else{
							   echo "<tr><td colspan='3'><div class='text-center  mb-3'>No Products</div></td></tr>";
						   }
						}
						else{
							header("location:errors/405.php");
						}
						?>
					
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->




	<?php include_once "layouts/footer.php";
	include_once "layouts/foot.php";
	?>