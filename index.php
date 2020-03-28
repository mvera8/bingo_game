<?php
include('conexion.php');

$pozo = 0;
$entrada = '';
$query = 'SELECT * FROM bingo';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['activo'] == 1) {
		$id_bingo = $row['id'];
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
				     	<p><button type="button" class="btn btn--orange" data-toggle="modal" data-target="#giroModal">Donde Girar?</button></b></p>

						<!-- Modal -->
						<div class="modal fade" id="giroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<p>Cuenta Itaú: Marcia 12345</p>
										<p>Cuenta BROU: Martin 12345</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn--orange" data-dismiss="modal">Cerrar</button>
									</div>
								</div>
							</div>
						</div>

						<p><button type="button" onclick="showCarton()" class="btn btn--green btn--big">Participar</button></p>
					</div>
				<?php } ?>
				<div id="carton" class="carton">
					<form action="form_participar.php" method="post">
						<input type="hidden" id="nombre_facebook" name="nombre_facebook" value="" />
						<input type="hidden" id="id_facebook" name="id_facebook" value="" />
						<input type="hidden" id="id_bingo" name="id_bingo" value="<?php echo $id_bingo; ?>" />
						<?php include('part_carton.php'); ?>
						<a href="bingo.php" class="btn btn--orange">Volver an Bingo</a>
					</form>
				</div>
		    </div>
		    <div class="col-12 col-md-5">
		    	<div class="text-center py-5" style="background-color: yellow;">
			     	<h3>Pozo acumulado</h3>
			     	<h1>$<?php echo $pozo; ?></h1>
			     	<p>Hay 3 personas que van a participar!</p>
				</div>
		    </div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>
