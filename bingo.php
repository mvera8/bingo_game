<?php
include 'conexion.php';

$hayBingo = 0;
$query = 'SELECT * FROM bingo';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['numeros']) {
		$hayBingo = 1;
		$pozo = $row['pozo'];
	}
}

include('header.php');
include('facebook.php');
include('nav.php');
?>
<section class="site height--full">
	<div class="site__nav">
		<div class="container">
			<div class="row">
				<?php if ($hayBingo == 1) { ?>
					<div class="col-12 col-md-5">
						<?php include('part_video.php'); ?>
					</div>
					<div class="col-12 col-md-7">
						<form name="contact" action="">
							<?php
							include('part_numeros.php');
							include('part_carton.php');
							?>
						</form>
						<p><button type="button" id="buttonBingo" class="btn btn--green btn--big d-none" data-toggle="modal" data-target="#bingoModal">BINGO!</button></p>
						<div id="message"></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="bingoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p>GANASTE $<?php echo $pozo; ?>!</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn--orange" data-dismiss="modal">Salir</button>
			</div>
		</div>
	</div>
</div>

<?php
include('footer.php');
?>
