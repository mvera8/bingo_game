<?php
include 'conexion.php';

$id_facebook = $_POST['id_facebook'];
$name = $_POST['name'];
$value = $_POST['value'];


// $queryUpdate = "UPDATE usuarios SET ".$name." = ".$value." WHERE id_facebook = " .$id_facebook;
$queryUpdate = "UPDATE usuarios SET ".$name." = '".$value."' WHERE id_facebook = " .$id_facebook;
$participanteCambiado = mysqli_query($link, $queryUpdate);

?>
