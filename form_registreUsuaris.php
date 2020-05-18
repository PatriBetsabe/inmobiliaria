<?php
// Definir variables de conexión
$host="localhost";
$user="patri";
$pass="patri";
$database="inmobiliaria";

// Establecer connexió
$con= new mysqli($host, $user, $pass, $database);

// Verificar conexión
if ($con -> connect_errno){
	printf("Connect failed: %s\n", $con->connect_error);
	exit();
}

if (isset($_POST["username"]) ){
	$username= $_POST["username"];
	$email= $_POST["email"];
	$password= $_POST["password"];
	$telefono= $_POST["telefono"];
	$dni= $_POST["dni"];
	$mensaje_final="";
	$password_repeat = $_POST["passConfirm"];

	if ($password != $password_repeat){
		$feedback_pass= "<span class='invalid-feedback'>La contraseña no coincide</span>";
	}

	//Componer registro de inserción
	$consulta= $con->prepare("INSERT INTO usuario (username, telefono, email, password, dni) VALUES (?,?,?,?,?)");

	$consulta->bind_param("sisss", $username, $telefono, $email, $pass_crypt, $dni);

	//Encriptar contraseña
	$pass_crypt= password_hash($password, PASSWORD_DEFAULT);

	// Ejecutar consulta
	$consulta->execute();
	$mensaje_final="<p>Usuario $username $existe registrado satisfactoriamente!</p><a href='login.php'>Inicia sesion</a>";
	
}



function buscaEmail($email, $con) { 
	// Retorna true si el usuario ya existe en la bbdd.
	$existe_user=false;
	$consulta_existe= $con->prepare("SELECT email FROM USUARIO WHERE email LIKE ?");
	$consulta_existe->bind_param("s", $email);
	$consulta_existe->execute();
	$consulta_existe->bind_result($e);

	while ($consulta_existe->fetch()){
		$existe_user=true;
	}

	return $existe_user;
}


// Liberar conexión
$con->close();

?>




<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Icono -->
	<link rel="shortcut icon" type="image/x-icon" href="media/icono.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

	<!-- Enllaç a l'arxiu CSS Extern -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<!-- TinyMCE -->
	<script src="https://cdn.tiny.cloud/1/x1vf6yd01nkuo7t6fsrt8ukyivtf2nweceuxbpx2ztcfzu7s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<!-- Enllaç a l'arxiu JS extern -->
	<script src="js/functions.js"></script>
	<title>SweetHome - Registrate</title>
</head>

<body>

	<header>
		<div class="content">
			<img src="media/logoo.png" height="80px;">
			<a class="enlace visible" href="home.php">Buscador</a>
			<a class="enlace" href="form_registrePisos.php">Publicar piso</a>
			<a class="enlace" href="form_registreUsuaris.php">Registrate</a>
			<a class="enlace" href="login.php">Inicia sesión</a>
		</div>
	</header>
	<div class="container pt-5">
		<h4>Registrate</h4>
		<form id="form-user-register" action="form_registreUsuaris.php" method="post">
			
			<div class="form-row mt-5 mb-4">
				<div class="col-md-4 mb-3">
					<label for="validationNom">Nom*</label>
					<input type="text" class="form-control is-valid" id="validationNom" value="" name="nombre" minlength="3" maxlength="25" required>
					<div id="feedbackNom">
						
					</div>
				</div>

				<div class="col-md-4 mb-3">
					<label for="validationCognoms">Cognoms*</label>
					<input type="text" class="form-control" id="validationCognoms" value="" name="apellido" minlength="3" maxlength="25" required>
					<div id="feedbackCognoms">
						
					</div>
				</div>

				<div class="col-4">
					<label for="validationDNI">DNI*</label>
					<input type="text" class="form-control" id="validationDNI" value="" name="dni" placeholder="DNI" required>
					<div id="feedbackDNI">
						
					</div>
				</div>
			</div>
			
			<div class="form-row mb-4">
				<div class="col-4">
					<label for="validationUsername">Username*</label>
					<div class="input-group">
						<div class="input-group-prepend" id="btnUsername">
							<span class="input-group-text">@</span>
						</div>
						<input type="text" class="form-control" id="validationUsername" name="username" required>
						<div id="feedbackUsername">
						
						</div>
					</div>
				</div>

				<div class="col-4">
					<label for="validationEmail">Email*</label>
					<input type="email" class="form-control" id="validationEmail" name="email" required>
					<div id="feedbakEmail">

					</div>
				</div>
				<div class="col-4">
					<label for="validationPassword">Contraseña*</label>
					<input type="password" class="form-control" id="validationPassword" name="password" minlength="8" maxlength="25" required>
					<div id="feedbackPassword">

					</div>
				</div>
				</div>

				<div class="form-row mb-4">
				<div class="col-4">
					<label for="validationPassConfirm">Repite contraseña*</label>
					<input type="password" class="form-control" id="validationPassConfirm" name="passConfirm" minlength="8" maxlength="25" required>
					<div id="feedbackPassConfirm">

					</div>
				</div>
				<div class="col-4">
					<label for="validationTelf">Telèfon*</label>
					<input type="text" class="form-control" id="validationTelf" name="telefono" required>
					<div id="feedbackTelf">
						
					</div>
				</div>
			</div>
			
			<div class="col-md-12 text-center mb-3">
                <button id="btnRegistrar" type="submit" class=" btn btn-block btn-primary">Registrar</button>
            </div>
			<div class="col-md-12 ">
				<div class="form-group">
					<p class="text-center"><a href="login.php">Ya tienes una cuenta?</a></p>
				</div>
			</div>

			<div>
				<?php
					if(strlen($mensaje_final)>0){
					echo $mensaje_final;
					}
				?>
			</div>
		</form>
	</div>

	<div class="row fixed-bottom">
		<div id="footer"class="col-12">
			<div class="container">
				<p class="footer_texto">© 2020 Copyright: Patricia Lamadrid</p>
				<ul class="footer_social">
					<li><i class="fa fa-github"></i></li>
					<li><a href=""><i class="fa fa-instagram"></i></a></li>
					<li><i class="fa fa-linkedin"></i></li>
				</ul>
			</div>
		</div>
	</div>



</body>
</html>
