<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?= isset($PageTitle) ? $PageTitle : "Bingo"?></title>
		<?php
		$link_dir = 'dist/css';
		$links = glob($link_dir . '/bundle.*.css');
		$link = array_rand($links);
		echo '<link rel="stylesheet" href="' . $links[$link] . '">';

		$scripts_dir = 'dist/js';
		$scripts = glob($scripts_dir . '/bundle.*.js');
		$script = array_rand($scripts);
		echo '<script src="' . $scripts[$script] . '"></script>';
		?>
	</head>
	<body>
		