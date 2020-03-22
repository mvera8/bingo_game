<script>
function showCarton() {
  var carton = document.getElementById("carton");
  var participar = document.getElementById("participar");
  if (carton.style.display === "none") {
    carton.style.display = "block";
    participar.style.display = "none";
  }
}
</script>
<div class="carton__holder">
	<div class="row no-gutters">
		<?php
		$numeros = array(rand(0, 10), rand(11, 20), rand(21, 30), rand(31, 40), rand(41, 50), rand(51, 60));
		foreach ($numeros as $numero) {
			echo '<div class="col-6 col-md-2 text-center">
				<input type="button" onclick="showCarton()" name="cartonNumber1" class="carton__number" value="'.$numero.'" />
			</div>';
		}
		?>
	</div>
</div>
