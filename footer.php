		<footer>
			<a class="link" href="http://martinvera.com.uy/" target="_blank">
				<div class="martinvera"></div>
			</a>
		</footer>

		<?php
		$scripts_dir = 'dist/js';
		$scripts = glob($scripts_dir . '/bundle.*.js');
		$script = array_rand($scripts);
		echo '<script src="' . $scripts[$script] . '"></script>';
		?>
	</body>
</html>
