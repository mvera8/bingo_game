<?php
$host = "{HOST}";
$user = "{USER}";
$password = "{PASSWORD}";
$database = "{DATABASE}";
$link = mysqli_connect ($host, $user, $password, $database);
mysqli_query($link, "SET NAMES 'utf8'")
?>