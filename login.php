<?php
include('header.php');
include('facebook.php');
?>

<div class="container text-center">
	<h1>Bingo</h1>
</div>
<div id="status"></div>
<div id="login-button">
	<fb:login-button 
	  scope="public_profile,email"
	  onlogin="checkLoginState();">
	</fb:login-button>
</div>
<?php
include('footer.php');
?>
