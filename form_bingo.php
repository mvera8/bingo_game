<?php
include 'conexion.php';

$id_usuario = $_POST['id_usuario'];
$fecha = $_POST['fecha'];
$entrada = $_POST['entrada'];
$video = $_POST['video'];

if(($id_usuario == '') or ($fecha == '') or ($entrada == '') or ($video == '')){
	header('location:admin.php?mensaje=campos');
}else{	
	$queryCrearBingo = "INSERT INTO bingo values ('','$id_usuario','$fecha','$entrada','0','$video','*')";
	$bingoCreado = mysqli_query($link, $queryCrearBingo);
	if($bingoCreado){
		header('location:admin.php?mensaje=creado');
	}
}
?>
