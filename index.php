<?php
include 'conexion.php';

$existeBingo = $arrancoBingo = $entrada = '';
$pozo = 0;
$query = 'SELECT * FROM bingo';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['numeros']) {
		$arrancoBingo = $row['numeros'];
		$existeBingo = 1;
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
		<div class="row justify-content-center align-items-center height--full">
			<?php
			if(isset($_GET['mensaje'])){
				if($_GET['mensaje'] === 'campos'){	
					echo '<div class="alert alert-danger" role="alert">Complete todos los campos</div>';
				}
			}
			?>

			<div class="col-12 col-md-5 text-center">
				<?php
				include('part_numeros.php');
				include('part_jackpot.php');
				?>
		    </div>

			<?php if ($entrada !== '') { ?>
				<div class="col-12 col-md-7">
					<div id="participar" class="text-center <?php if (($numerosElegidos === 1)) { echo 'd-none'; } ?>">
				     	<h3>Para participar son <b>$<?php echo $entrada; ?></b></h3
				     	<p><b>Se debera girar el $$ antes o después.</b><br />Nosotros se la giraremos o se la haremos llegar al ganador.</p>
				     	<p><button type="button" class="btn btn--orange" data-toggle="modal" data-target="#giroModal">Donde Girar?</button></b></p>

						<!-- Modal -->
						<div class="modal fade" id="giroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<p>Caja de ahorro Itaú: 6456903 (Marcia)</p>
										<p>Caja de ahorro BROU: 432736-1 (Martín)</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn--orange" data-dismiss="modal">Cerrar</button>
									</div>
								</div>
							</div>
						</div>

						<p><button type="button" onclick="showCarton()" class="btn btn--green btn--big">Participar</button></p>
					</div>

					<div id="carton" class="carton <?php if (($numerosElegidos !== 1)) { echo 'd-none'; } ?>">
						<form action="form_participar.php" method="post">
							<input type="hidden" id="nombre_facebook" name="nombre_facebook" value="" />
							<input type="hidden" id="id_facebook" name="id_facebook" value="" />
							<input type="hidden" id="id_bingo" name="id_bingo" value="<?php echo $id_bingo; ?>" />
							<?php include('part_carton.php'); ?>

							<?php if ($numerosElegidos === 1) { ?>
								<p>Vuelve al bingo para ver los numeros que salen y seguir jugando!</p>
								<p><a href="bingo.php" class="btn btn--orange">Volver al bingo</a></p>
							<?php } else { ?>
								<p>
									<button type="submit" class="btn btn--green">Jugar carton</button>
									<button type="button" onclick="cambiarNumeros()" class="btn btn--orange">Cambiar numeros</button>
								</p>
							<?php } ?>
						</form>						
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>
