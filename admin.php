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
include('facebook.php');
include('nav.php');
?>
<section class="site height--full">
	<div class="site__nav">
		<div class="container">
			<?php
			if(isset($_GET['mensaje'])){
				if($_GET['mensaje'] === 'campos'){	
					echo '<div class="alert alert-danger" role="alert">Complete todos los campos</div>';
				}
				if($_GET['mensaje'] === 'vacio'){	
					echo '<div class="alert alert-danger" role="alert">No hay bingo creado.</div>';
				}
				if($_GET['mensaje'] === 'actualizado'){	
					echo '<div class="alert alert-success" role="alert">Numero actualizado: ' . $_GET['numero'] . '</div>';
				}
				if($_GET['mensaje'] === 'creado'){	
					echo '<div class="alert alert-success" role="alert">Bingo creado</div>';
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
							if ($row['numeros']) {
								$hayBingo = 1;
								$id_bingo = $row['id'];
								$video = $row['video'];
								$numerosSalidos = $row['numeros'];
							}
						}
						?>
						<?php if ($hayBingo == 1) { ?>
							<h2>Actualizar bingo</h2>
							<form action="form_bolilla.php" method="post">
								<input type="hidden" name="id" value="<?php echo $id_bingo; ?>" />
								<input type="hidden" name="numerosSalidos" value="<?php echo $numerosSalidos; ?>" />
								<div class="form-group">
					                <label for="entrada">Video</label>
					                <textarea class="form-control" name="video"><?php echo $video; ?></textarea>
					            </div>
					            <p>Salidos: <?php echo $numerosSalidos; ?></p>
					            <div class="form-group">
					                <label for="entrada">Bolilla saliente</label>
					                <input type="number" class="form-control" name="numeros" />
					            </div>
					            <button type="submit" class="btn btn--orange">Actualizar</button>
							</form>
						<?php } else { ?>
							<h2>Crear Bingo</h2>
							<form action="form_bingo.php" method="post">
								<input type="hidden" id="id_usuario" name="id_usuario" value="8" />
								<input type="hidden" name="fecha" value="<?php echo date('Y-m-d'); ?>" />
								<div class="form-group">
					                <label for="entrada">Cuanto $ para entrar?</label>
					                <input type="number" class="form-control" name="entrada" placeholder="$$" />
					            </div>
					            <div class="form-group">
					                <label for="video">Video link (iframe)</label>
					                <input type="text" class="form-control" name="video" />
					            </div>
					            <button type="submit" class="btn btn--green">Crear</button>
							</form>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include('footer.php');
?>
