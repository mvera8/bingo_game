<?php
$pozo_acumulado = 0;
if (is_numeric($entrada) && is_numeric($cantidad)) {
  $pozo_acumulado = $entrada*$cantidad;
}
?>
<div class="jackpot">
 	<h3 class="jackpot__title">Pozo acumulado</h3>
 	<h1 class="jackpot__pozo">$<?php echo $pozo_acumulado; ?></h1>
 	<p>Hay <?php echo $cantidad; ?> personas que van a participar!</p>
</div>
