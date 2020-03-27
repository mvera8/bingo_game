<?php
include 'conexion.php';

$tieneX = 0;
$numerosElegidos = 0;
$numeros = array(rand(0, 10), rand(11, 20), rand(21, 30), rand(31, 40), rand(41, 50), rand(51, 60));
$query = 'SELECT * FROM usuarios';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['cartonNumber1'] !== '') {
		$numerosElegidos = 1;
		$numeros = array($row['cartonNumber1'], $row['cartonNumber2'], $row['cartonNumber3'], $row['cartonNumber4'], $row['cartonNumber5'], $row['cartonNumber6']);
	}
}
?>
<div class="carton__block text-center">
	<h3 class="carton__block__title">Bingo</h3>
	<div class="carton__holder">
		<div class="row">
			<?php
			$count = 0;
			foreach ($numeros as $numero) {
				$count++;
				$numeroX = str_replace('x', '', $numero);
				echo '<div class="col-6 col-md-4 text-center">';
				if ($numerosElegidos == 1) {
					echo '<input type="hidden" name="cartonNumber'.$count.'" value="'.$numeroX.'" />';
					echo '<input type="button" onclick="numeroActivo(this)" id="cartonNumber'.$count.'" class="carton__number';
					if (strpos($numero, 'x') !== false) {
						$tieneX = 1;
					    echo ' carton__number--selected';
					}
					echo '" value="'.$numeroX.'" />';
				} else {
					echo '<input type="text" name="cartonNumber'.$count.'" class="carton__number carton__number--text" value="'.$numero.'" />';
				}
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>
<?php if ($tieneX === 0) { ?>
	<p><button type="submit" class="btn btn--green">Jugar carton</button> 
	<button type="button" onclick="cambiarNumeros()" class="btn btn--border">Cambiar numeros</button></p>
<?php } ?>
