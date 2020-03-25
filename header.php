<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="robots" content="noindex, nofollow">
		<meta name="description" content="Bingo para pasar esta cuarentena!">
		<title><?= isset($PageTitle) ? $PageTitle : "Bingo"?></title>
		<?php
		$link_dir = 'dist/css';
		$links = glob($link_dir . '/bundle.*.css');
		$link = array_rand($links);
		echo '<link rel="stylesheet" href="' . $links[$link] . '">';
		?>
	</head>
	<body>
		