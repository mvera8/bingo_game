<?php
include('header.php');
include('facebook.php');
?>

<section class="site">
	<div class="container">
		<div class="row align-items-center height--full">
			<div class="col-12 col-md-6">
				<div class="text-center">
					<?php include('logo.php'); ?>
					<div id="status"></div>
					<div id="login-button">
						<fb:login-button 
						   size="xlarge"
						  scope="public_profile,email"
						  onlogin="checkLoginState();">
						  Continuar
						</fb:login-button>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="square site__pelotas"></div>
			</div>
		</div>
	</div>
</section>

<?php
include('footer.php');
?>
