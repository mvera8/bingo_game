<?php
include 'conexion.php';
$query = 'SELECT * FROM bingo';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['numeros']) {
		$video = $row['video'];
		$numeros = $row['numeros'];
		echo '<div class="form-group"><div class="videoWrapper">'.$video.'</div></div>';
		echo '<p>Ultimo numero: '. $numeros .'</p>';
	}
}
?>

