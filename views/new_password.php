<?php
include_once "layouts/header.php"
?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--verify form-->
                        <h2>Enter your Email</h2>
                        <?php
                        	if (isset($_SESSION['same']))
                                     echo $_SESSION['same'];
                            
                            ?>
                        <form action="../routes/route.php" method='POST'>
                            <input type="hidden" name='email'  placeholder="Email Address"  value="<?= $_GET['email']?>"/>
                            <input type='password' name='password' placeholder='password'>
                            <?php
						if (isset($_SESSION['message']['errors']['password'])) {
							foreach ($_SESSION['message']['errors']['password'] as $key => $value)
								if ($key == 'confirm-required')
									continue;
								else echo $value;
						}
						?>
                            <input type='password' name='confirm-password' placeholder='Confirm-password'>
                            <?php
						if (isset($_SESSION['message']['errors']['password'])) {
							foreach ($_SESSION['message']['errors']['password'] as $key => $value)
								if ($key == 'required')
									continue;
								else echo $value;
						}
						?>
							<button type="submit" name='change_password' class="btn btn-default">Change password</button>
						</form>
					</div><!--/verify form-->
				</div>
			</div>
		</div>
    </section><!--/form-->
    <?php
include_once "layouts/foot.php"
?>