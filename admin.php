<?php
session_start(); /* Starts the session */

if(isset($_POST['Submit'])){
	$logins = array('tincho8' => '314490');
	$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
	if (isset($logins[$Username]) && $logins[$Username] == $Password){
		$_SESSION['UserData']['Username']=$logins[$Username];
		header("location:admin.php");
		exit;
	} else {
		$msg="<span style='color:red'>Invalid Login Details</span>";
	}
}
include('header.php');
?>
<header class="header">
	<nav class="navbar navbar-expand-lg" role="navigation">
		<div class="container">
			<?php include('logo.php'); ?>
			<div id="header-menu" class="header__menu collapse navbar-collapse justify-content-end">
				<ul class="nav navbar-nav">
					<li class="nav-item"><a class="nav-link" href="index.php">Bingo</a></li>
				    <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
				    <?php
				    if(isset($_SESSION['UserData']['Username'])){
				    	echo '<li class="nav-item"><a class="nav-link" href="logout.php">Salir</a></li>';
				    }
				    ?>
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
		}
		?>
		<div class="row">
			<div class="col-12 col-md-4">
				<?php if(!isset($_SESSION['UserData']['Username'])){
					// no logueado
					?>
					<h2>Login</h2>
					<form action="" method="post" name="Login_Form">
						<div class="form-group">
							<label for="Username">Usuario</label>
						  	<input name="Username" type="text" class="form-control">
					  	</div>
					  	<div class="form-group">
						  	<label for="Password">Contraseña</label>
						  	<input name="Password" type="password" class="form-control">
					  	</div>
					    <input name="Submit" type="submit" value="Login" class="btn btn-primary">
					</form>
				<?php } else { 
					// logueado
					include 'conexion.php';

					$hayBingo = 0;

					$query = 'SELECT * FROM bingo';
					$resultado = mysqli_query ($link, $query);
					while($row = mysqli_fetch_array($resultado)){
						if ($row['activo'] == 1) {
							$hayBingo = 1;
						}
					}
					?>
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
				                <label for="video">Video link (iframe)</label>
				                <input type="text" class="form-control" name="video" />
				            </div>
				            <button type="submit" class="btn btn-primary">Crear</button>
						</form>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php
include('footer.php');
?>
