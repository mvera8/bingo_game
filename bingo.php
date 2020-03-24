<?php
include 'conexion.php';

$hayBingo = 0;
$query = 'SELECT * FROM bingo';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['activo'] == 1) {
		$hayBingo = 1;
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
				<?php if ($hayBingo == 1) { ?>
					<?php include('part_video.php'); ?>
					<form name="contact" action="">
						<?php include('part_carton.php'); ?>
						<input type="submit" onclick="updateForm()" value="Send" />
					</form>
					<div id='message'></div>
				<?php } ?>
			</div>
			<div class="col-12 col-md-5">
				<p>Ultimo numero: 5</p>
			</div>
		</div>
	</div>
</section>


<?php
include('footer.php');
?>
