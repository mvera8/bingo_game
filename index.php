<?php
include('conexion.php');

$query = 'SELECT * FROM bingo';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['activo'] == 1) {
		$entrada = $row['entrada'];
		$pozo = $row['pozo'];
	}
}

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
				<div id="participar" class="text-center py-5">
			     	<p>Para participar son <b>$<?php echo $entrada; ?></b></p>
			     	<p><b>Se debera girar despues.</b></p>
					<p><button type="button" onclick="showCarton()" class="btn btn-primary">Participar</button></p>
				</div>

				
				<div id="carton" class="carton" style="display: block;">
					<h2>Carton</h2>
					<form action="form_participar.php" method="post">
						<input type="text" name="nombre" value="Tin" />
						<?php include('part_carton.php'); ?>
						<p><button type="submit" class="btn btn-primary">Jugar carton</button> 
							<button type="button" onclick="cambiarNumeros()" class="btn btn-border">Cambiar numeros</button></p>
					</form>
				</div>

		    </div>
		    <div class="col-12 col-md-5">
		    	<div class="text-center py-5" style="background-color: yellow;">
			     	<p>Pozo acumulado</p>
			     	<h1>$<?php echo $pozo; ?></h1>
				</div>
		    </div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>
