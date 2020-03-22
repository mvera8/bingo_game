<?php
include 'conexion.php';

$hayBingo = 0;

$query = 'SELECT * FROM bingo';
$resultado = mysqli_query ($link, $query);
while($row = mysqli_fetch_array($resultado)){
	if ($row['activo'] == 1) {
		$hayBingo = 1;
	}
}
include('header.php');
?>
<header class="header">
	<nav class="navbar navbar-expand-lg" role="navigation">
		<div class="container">
			<a class="navbar-brand header__brand" href="index.php">
			    <img src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
			    Bingo
			  </a>
			<div id="header-menu" class="header__menu collapse navbar-collapse justify-content-end">
				<ul class="nav navbar-nav">
				    <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
				    <li class="nav-item"><a class="nav-link" href="index.php">Bingo</a></li>
				 </ul>
			</div>
		</div>
	</nav>
</header>
<section class="py-5">
	<div class="container">
		<?php
		if(isset($_GET['mensaje'])){
			if($_GET['mensaje'] === 'campos'){	
				echo '<div class="alert alert-danger" role="alert">Complete todos los campos</div>';
			}
			if($_GET['mensaje'] === 'creado'){	
				echo '<div class="alert alert-success" role="alert">Bingo creado</div>';
			}
		}
		?>
		<div class="row">
			<div class="col-12 col-md-4">
				<?php if ($hayBingo == 1) { ?>
					<h2>Bingo creado</h2>
				<?php } else { ?>
					<h2>Crear Bingo</h2>
					<form action="form_bingo.php" method="post">
						<input type="hidden" name="id_usuario" value="8" />
						<input type="hidden" name="fecha" value="<?php echo date('Y-m-d'); ?>" />
						<div class="form-group">
			                <label for="entrada">Cuanto $ para entrar?</label>
			                <input type="number" class="form-control" name="entrada" placeholder="$$" />
			            </div>
			            <div class="form-group">
			                <label for="video">Video id</label>
			                <input type="text" class="form-control" name="video" />
			            </div>
			            <button type="submit" class="btn btn-primary">Crear</button>
					</form>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php
include('footer.php');
?>
