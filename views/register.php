<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
?>

<section id="form">
	<!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="signup-form">
					<!--sign up form-->
					<h2 class='text-center'>New User Signup!</h2>
					<?php
						if (isset($_SESSION['failed']))
							echo $_SESSION['failed'];
							if (isset($_SESSION['failed-mail']))
							echo $_SESSION['failed-mail'];
						?>
					<form action="../routes/route.php" method='POST'>
						<input type="text" name='name' placeholder="Name" value="<?= (isset($_SESSION['request']['name'])) ? $_SESSION['request']['name'] : ''; ?>" />
						<input type="text" name='phone' placeholder="Phone Number" value="<?= (isset($_SESSION['request']['phone'])) ? $_SESSION['request']['phone'] : ''; ?>" />
						<?php
						if (isset($_SESSION['message']['errors']['phone']))
							echo $_SESSION['message']['errors']['phone'];
						?>
						<input type="email" name='email' placeholder="Email Address" value="<?= (isset($_SESSION['request']['email'])) ? $_SESSION['request']['email'] : ''; ?>" />
						<?php
						if (isset($_SESSION['message']['errors']['mail']))
							echo $_SESSION['message']['errors']['mail'];
						if (isset($_SESSION['message']['errors']['email'])) {
							foreach ($_SESSION['message']['errors']['email'] as $value)
								echo $value;
						}
						?>
						<input type="password" name='password' placeholder="Password" value="<?= (isset($_SESSION['request']['password'])) ? $_SESSION['request']['password'] : ''; ?>" />
						<?php
						if (isset($_SESSION['message']['errors']['password'])) {
							foreach ($_SESSION['message']['errors']['password'] as $key => $value)
								if ($key == 'confirm-required')
									continue;
								else echo $value;
						}
						?>
						<input type="password" name='confirm-password' placeholder="confirm password" value="<?= (isset($_SESSION['request']['confirm-password'])) ? $_SESSION['request']['confirm-password'] : ''; ?>" />
						<?php
						if (isset($_SESSION['message']['errors']['password'])) {
							foreach ($_SESSION['message']['errors']['password'] as $key => $value)
								if ($key == 'required')
									continue;
								else echo $value;
						}
						?>
						<select name='gender' style='margin-bottom:10px;'>
							<option  <?= (isset($_SESSION['request']['gender']) && (($_SESSION['request']['gender']) === 'm')) ? "selected" : ''; ?> value='m'>Male</option>
							<option   <?= (isset($_SESSION['request']['gender']) && (($_SESSION['request']['gender']) === 'f')) ? "selected" : ''; ?> value='f'>Female</option>
						</select>
						<button type="submit" name='register' class="btn btn-default">Signup</button>
					</form>
				</div>
				<!--/sign up form-->
			</div>
		</div>
	</div>
</section>
<!--/form-->

<?php include_once "layouts/footer.php";
include_once "layouts/foot.php";
?>