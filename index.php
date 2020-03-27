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
<section class="site">
	<div class="container">
		<div class="row align-items-center height--full">
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
				     	<h3>Para participar son <b>$<?php echo $entrada; ?></b></h3
				     	<p><b>Se debera girar el $$ antes o después.</b><br />Nosotros se la giraremos o se la haremos llegar al ganador.</p>
				     	<p><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Donde Girar?</button></b></p>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Cuenta Itaú: Marcia 12345</p>
										<p>Cuenta BROU: Martin 12345</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>

						<p><button type="button" onclick="showCarton()" class="btn btn-primary btn--big">Participar</button></p>
					</div>
				<?php } ?>
				<div id="carton" class="carton">
					<h2>Carton</h2>
					<p>Elige tus numeros!.</p>
					<form action="form_participar.php" method="post">
						<input type="hidden" id="nombre_facebook" name="nombre_facebook" value="" />
						<input type="hidden" id="id_facebook" name="id_facebook" value="" />
						<?php include('part_carton.php'); ?>
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
