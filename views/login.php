<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
?>

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<?php
						if (isset($_SESSION['login-failed']))
						echo $_SESSION['login-failed'];
						?>
						<form action="../routes/route.php" method='POST'>
							<input type="email" name='email' placeholder="Email Address"  value="<?= (isset($_SESSION['request']['email'])) ? $_SESSION['request']['email'] : ''; ?>"/>
							<?php
							if (isset($_SESSION['message']['errors']['email'])) {
								foreach ($_SESSION['message']['errors']['email'] as $value)
									echo $value;}
							if (isset($_SESSION['message']['errors']['mail']['not_exist']))
							echo $_SESSION['message']['errors']['mail']['not_exist'];
							?>
							<input type="password" name='password' placeholder="Password" />
							<?php
							if (isset($_SESSION['message']['errors']['password'])) {
								foreach ($_SESSION['message']['errors']['password'] as $key => $value)
									 echo $value;
							}
							?>
							<div class='text-right'> <a href="../routes/route.php?forget=1"> Forget Password?</a></div>
							<button type="submit" name='login' class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

	<?php include_once "layouts/footer.php";
	include_once "layouts/foot.php";
	?>