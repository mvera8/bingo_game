<?php
include 'conexion.php';
$query = 'SELECT * FROM bingo';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['activo'] == 1) {
		$video = $row['video'];
		echo '<div class="videoWrapper">'.$video.'</div>';
	}
}
?>

