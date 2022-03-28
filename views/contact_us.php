<!DOCTYPE html>
<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <?php
                        if(isset($_SESSION['success']))
                        echo     $_SESSION['success'];
                        if(isset($_SESSION['failed']))
                        echo     $_SESSION['failed'];
                        ?>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" action="../routes/route.php" method="POST">
				            <div class="form-group col-md-12">
				                <input type="text" name="name" class="form-control" placeholder="Name">
							</div>
							<?=isset($_SESSION['data']['name'])? $_SESSION['data']['name']:"";?>
				            <div class="form-group col-md-12">
				                <input type="email" name="email" class="form-control" placeholder="Email">
							</div>
							<?=isset($_SESSION['data']['email'])? $_SESSION['data']['email']:"";?>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" placeholder="Subject">
							</div>
							<?=isset($_SESSION['data']['subject'])? $_SESSION['data']['subject']:"";?>

				            <div class="form-group col-md-12">
				                <textarea name="message" id="message"  class="form-control" rows="8" placeholder="Your Message Here"></textarea>
							</div>            
							<?=isset($_SESSION['data']['messag'])? $_SESSION['data']['messag']:"";?>
            
				            <div class="form-group col-md-12">
				                <input type="submit" name="feedback" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
    <?php include_once "layouts/footer.php";
	include_once "layouts/foot.php";
	?>