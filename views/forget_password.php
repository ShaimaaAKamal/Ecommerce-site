<?php
include_once "layouts/header.php"
?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--verify form-->
						<h2>Enter your Email</h2>
                        <form action="../routes/route.php" method='POST'>
                            <input type="email" name='email'  placeholder="Email Address" />
                            <?php
							if (isset($_SESSION['message']['errors']['email'])) {
								foreach ($_SESSION['message']['errors']['email'] as $value)
									echo $value;}
							if (isset($_SESSION['message']['errors']['mail']['not_exist']))
							echo $_SESSION['message']['errors']['mail']['not_exist'];
							?>
							<button type="submit" name='verify-email' class="btn btn-default">Verify email</button>
						</form>
					</div><!--/verify form-->
				</div>
			</div>
		</div>
    </section><!--/form-->
    <?php
include_once "layouts/foot.php"
?>