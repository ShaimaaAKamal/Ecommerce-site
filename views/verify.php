<?php
include_once "layouts/header.php"
?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--verify form-->
						<h2>Verify your account</h2>
                        <form action="../routes/route.php" method='POST'>
                            <input type='hidden' name='email' value="<?=$_GET['email']?>">
                            <?php
                            if(isset($_GET['forgetpage']))
                            echo "<input type='hidden' name='forgetpage' value='".$_GET['forgetpage']."'>"
                            ?>
                            <!-- <input type='hidden' name='forgetpage' value="<?=$_GET['forgetpage']?>"> -->

                            <input type="number" name='code'  placeholder="Code" />
                            <?Php
                            if(isset($_SESSION['message']['errors']['wrong-code']))
                            echo $_SESSION['message']['errors']['wrong-code'];
                            if(isset($_SESSION['message']['errors']['something']))
                            echo $_SESSION['message']['errors']['something'];
                            ?>
							<button type="submit" name='verify' class="btn btn-default">Verify</button>
						</form>
					</div><!--/verify form-->
				</div>
			</div>
		</div>
    </section><!--/form-->
    <?php
include_once "layouts/foot.php"
?>