<?php
include 'conexion.php';

$id = $_POST['id'];
$video = $_POST['video'];
$numerosSalidos = $_POST['numerosSalidos'];
$numeros = $_POST['numeros'];
if ($numerosSalidos == '*') {
	$nuevoNumero = $numeros;
} else {
	$nuevoNumero = $numerosSalidos . ',' . $numeros;
}

if(($id == '') or ($video == '') or ($numeros == '') or ($numeros == '')){
	header('location:admin.php?mensaje=campos');
}else{	
	$queryUpdate = "UPDATE bingo SET video = '".$video."', numeros = '".$nuevoNumero."' WHERE id = " .$id;
	$bolillaActualizada = mysqli_query($link, $queryUpdate);
	if($bolillaActualizada){
		header('location:admin.php?mensaje=actualizado&numero=' . $numeros);
	}
}
?>
