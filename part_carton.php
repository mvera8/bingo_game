<?php if ($numerosElegidos === 0) { ?>
	<p>Elige tus numeros!</p>
<?php } ?>
<div class="carton__block text-center">
	<h3 class="carton__block__title">Bingo</h3>
	<div class="carton__holder">
		<div class="row">
			<?php
			$count = 0;
			foreach ($numeros as $numero) {
				$count++;
				$numeroX = str_replace('x', '', $numero);
				echo '<div class="col-6 col-md-4 text-center">';
				if ($numerosElegidos == 1) {
					echo '<input type="hidden" name="cartonNumber'.$count.'" value="'.$numero.'" />';
					echo '<input type="button" onclick="numeroActivo(this)" id="cartonNumber'.$count.'" class="carton__number';
					if (strpos($numero, 'x') !== false) {
						$tieneX = 1;
					    echo ' carton__number--selected';
					}
					echo '" value="'.$numeroX.'" />';
				} else {
					echo '<input type="text" name="cartonNumber'.$count.'" class="carton__number carton__number--text" value="'.$numero.'" />';
				}
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>
