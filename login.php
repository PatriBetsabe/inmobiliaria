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

if (isset($_POST["email"]) && isset($_POST["password"])){
	//Guardar variables de acceso
	$email=$_POST["email"];
	$password=$_POST["password"];

	$row_result=buscaUsuario($email, $con);
	$pass_result=$row_result[3];
	//var_dump($query_result);
	$loginOK= password_verify($password, $pass_result);
	if ($loginOK == 1){
		session_start();
		// creamos variables de sesiones
		//$_SESSION["usuari"]=;
		$_SESSION["user"]=$row_result[1];
		$_SESSION["identificador"]=$row_result[0];
		$_SESSION["login"]="ok";
		//echo $_SESSION["user"];
		// redigimos a la cuenta personal
		header('location:home.php'); 
	}
}


function buscaUsuario($email, $con) { 
	// Retorna true si el usuario ya existe en la bbdd.
	$consulta_existe= $con->prepare("SELECT id, username, email, password FROM USUARIO WHERE email LIKE ?");
	$consulta_existe->bind_param("s", $email);
	// Ejecución de la consulta
	$consulta_existe->execute();
	$consulta_existe->store_result();
	// Resultados
	$consulta_existe->bind_result($id, $usr, $mail, $passw);

	$row= array();
	while ($consulta_existe->fetch()){
		array_push($row, $id, $usr, $mail, $passw);
		return $row;
	}
	return false;
}

// Liberar conexión
$con->close();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="media/icono.ico" />
	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
    <title>SweetHome - Login</title>
  </head>
  <body>

	<header>
		<div class="content">
			<img src="media/logoo.png" height="80px;">
		</div>
	</header>
	<div class="container">
        	<div class="row">
			<div class="col-md-5 mx-auto">
				<div class="myform form ">
					 <div class="logo mb-6">
					</div>
					 <div class="logo mb-6">
					</div>
					<form action="login.php" method="post" name="login">
						<br/>
                           			<div class="form-group">
                              				<label for="exampleInputEmail1">Email*:</label>
                              				<input type="email" name="email"  class="form-control" id="email">
                           			</div>
                           			<div class="form-group">
                              				<label for="exampleInputEmail1">Password*:</label>
                              				<input type="password" name="password" id="password"  class="form-control">
                           			</div>

                           			<div class="col-md-12 text-center ">
                              				<button type="submit" class=" btn btn-block btn-primary">Login</button>
                           			</div>
						<br/>
                           			<div class="form-group">
                              				<p class="text-center">Eres nuevo? <a href="form_registreUsuaris.php">Crear cuenta</a></p>
                           			</div>
                  			</form>
				</div>
			</div>
		</div>
      	</div>   



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
