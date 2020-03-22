<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Bingo</title>
		<?php 
		$scripts_dir = 'dist/js';
		$scripts = glob($scripts_dir . '/bundle.*.js');
		$script = array_rand($scripts);
		echo '<script src="' . $scripts[$script] . '"></script>';

		$link_dir = 'dist/css';
		$links = glob($link_dir . '/bundle.*.css');
		$link = array_rand($links);
		echo '<link rel="stylesheet" href="' . $links[$link] . '">';
		?>
	</head>
	<body>
		<script>
		  function statusChangeCallback(response) {
	        // console.log(response);
	        if (response.status === 'connected') {
	            FB.api('/me', function (response) {
	                document.getElementById('status').innerHTML =
	                  'Thanks for logging in, ' + response.name + '!';
	                document.getElementById("profileImage").setAttribute("src", "https://graph.facebook.com/" + response.id + "/picture?type=normal");
	            });
	            document.getElementById('login-button').style.display = 'none';
	            document.getElementById('profileImage').style.display = 'block';
	        } else {
	            document.getElementById('status').innerHTML = 'Please loggin for play: ';
	        }
	    }

		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '1172283279776082',
		      cookie     : true,
		      xfbml      : true,
		      version    : 'v3.2'
		    });
		      
		    FB.AppEvents.logPageView();  

		    FB.getLoginStatus(function(response) {
			    statusChangeCallback(response);
			}); 
		      
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "https://connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>

		<div class="container">
			<h1>Facebook SDK login con Javascript</h1>
		</div>

		<div id="status"></div>
		<div id="login-button">
			<fb:login-button 
			  scope="public_profile,email"
			  onlogin="checkLoginState();">
			</fb:login-button>
		</div>
		<img id="profileImage" src="" style="display: none;" />


		<?php
		$number1 = rand(0, 10);
		$number2 = rand(11, 20);
		$number3 = rand(21, 30);
		$number4 = rand(31, 40);
		$number5 = rand(41, 50);

		$paquetes = array (
			$number1,
			$number2,
			$number3,
			$number4,
			$number5
		);

		$equipo_bingo = array (
			array("Marcia"),
			array("Yanet"),
			array("Martin")
		);
		 
		foreach($equipo_bingo as $equipo) {
			echo "Hoy participan: ";
		 	foreach($equipo as $jugador) {
				echo $jugador ." ";
				foreach($paquetes as $paquete) {
					echo " " . $paquete;
				}
			}
		 	echo "<br>";
		 }
		?>
	</body>
</html>