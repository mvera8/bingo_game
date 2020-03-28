<?php
include 'conexion.php';

$nombre_facebook = $_POST['nombre_facebook'];
$id_facebook = $_POST['id_facebook'];
$id_bingo = $_POST['id_bingo'];
$cartonNumber1 = $_POST['cartonNumber1'];
$cartonNumber2 = $_POST['cartonNumber2'];
$cartonNumber3 = $_POST['cartonNumber3'];
$cartonNumber4 = $_POST['cartonNumber4'];
$cartonNumber5 = $_POST['cartonNumber5'];
$cartonNumber6 = $_POST['cartonNumber6'];

if(($nombre_facebook == '')){
	header('location:index.php?mensaje=campos');
}else{
	$listar = 0;
	$queryId = "SELECT * FROM usuarios";
	$resultId = mysqli_query($link, $queryId);
	
	while($row = mysqli_fetch_array($resultId)){
		if($row['id_facebook'] == $id_facebook){
			$listar = 1;
			$queryUpdate = "UPDATE usuarios SET cartonNumber1 = ".$cartonNumber1.", cartonNumber2 = ".$cartonNumber2.", cartonNumber3 = ".$cartonNumber3.", cartonNumber4 = ".$cartonNumber4.", cartonNumber5 = ".$cartonNumber5.", cartonNumber6 = ".$cartonNumber6." WHERE id_facebook = " .$id_facebook;
      		$participanteCambiado = mysqli_query($link, $queryUpdate);
			if($participanteCambiado){
				header('location:bingo.php');
			}
		}
	}

	if($listar == 0){
		$queryParticipar = "INSERT INTO usuarios values ('','$id_facebook','$nombre_facebook','$id_bingo','$cartonNumber1','$cartonNumber2','$cartonNumber3','$cartonNumber4','$cartonNumber5','$cartonNumber6','participante')";
		$participanteCreado = mysqli_query($link, $queryParticipar);
		if($participanteCreado){
			header('location:bingo.php');
		}
	}
}
?>
