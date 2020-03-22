<?php
include 'conexion.php';

$nombre = $_POST['nombre'];

if(($nombre == '')){
	header('location:index.php?mensaje=campos');
}else{	
	$queryParticipar = "INSERT INTO usuarios values ('','$nombre','participante')";
	$participanteCreado = mysqli_query($link, $queryParticipar);
	if($participanteCreado){
		header('location:bingo.php');
	}
}
?>
