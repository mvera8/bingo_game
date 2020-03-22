<?php
include('conexion.php');
include('header.php');
include('facebook.php');
include('nav.php');
?>

<script>
function showCarton() {
  var carton = document.getElementById("carton");
  var participar = document.getElementById("participar");
  if (carton.style.display === "none") {
    carton.style.display = "block";
    participar.style.display = "none";
  }
}

function cambiarNumeros() {
	var cartonNumber = document.getElementsByClassName("carton__number");
	cartonNumber[0].innerHTML = Math.floor(Math.random() * 11);
	cartonNumber[1].innerHTML = Math.floor(Math.random() * 11) + 10;
	cartonNumber[2].innerHTML = Math.floor(Math.random() * 11) + 20;
	cartonNumber[3].innerHTML = Math.floor(Math.random() * 11) + 30;
	cartonNumber[4].innerHTML = Math.floor(Math.random() * 11) + 40;
	cartonNumber[5].innerHTML = Math.floor(Math.random() * 11) + 50;
}
</script>

<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-7">
				<div id="participar" class="text-center">
			     	<p>Para participar son <b>$30</b></p>
			     	<p>Se debera girar despues.</p>
					<p><button type="button" onclick="showCarton()" class="btn btn-primary">participar</button></p>
				</div>

				
				<div id="carton" class="carton" style="display: none;">
					<h2>Carton</h2>
					<div class="form-group carton__holder">
						<div class="row no-gutters">
							<?php
							$numeros = array(rand(0, 10), rand(11, 20), rand(21, 30), rand(31, 40), rand(41, 50), rand(51, 60));
							foreach ($numeros as $numero) {
								echo '<div class="col-6 col-md-2 text-center">
									<div class="carton__number">'.$numero.'</div>
								</div>';
							}
							?>
							
						</div>
					</div>
					<p><button type="button" onclick="cambiarNumeros()" class="btn btn-warning">Cambiar numeros</button></p>
				</div>

		    </div>
		    <div class="col-12 col-md-5">
		    	<div class="text-center" style="background-color: yellow;">
			     	<p>Pozo acumulado</p>
			     	<h1>$<span>3000</span></h1>
				</div>
		    </div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>
