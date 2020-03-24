<?php
include('conexion.php');

$pozo = 0;
$entrada = '';
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
<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-7">
				<?php
				if(isset($_GET['mensaje'])){
					if($_GET['mensaje'] === 'campos'){	
						echo '<div class="alert alert-danger" role="alert">Complete todos los campos</div>';
					}
				}
				?>
				<?php if ($entrada === '') { ?>
					<p>No hay bingo creado</p>
				<?php } else { ?>
					<div id="participar" class="text-center py-5">
				     	<p>Para participar son <b>$<?php echo $entrada; ?></b></p>
				     	<p><b>Se debera girar despues.</b></p>
						<p><button type="button" onclick="showCarton()" class="btn btn-primary">Participar</button></p>
					</div>
				<?php } ?>
				<div id="carton" class="carton">
					<h2>Carton</h2>
					<p>Elige tus numeros!.</p>
					<form action="form_participar.php" method="post">
						<input type="hidden" id="nombre_facebook" name="nombre_facebook" value="" />
						<input type="hidden" id="id_facebook" name="id_facebook" value="" />
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
