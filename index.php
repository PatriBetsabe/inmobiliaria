
<!doctype html>
<html lang="es">
	<head>
		<!-- Informació Meta -->
		<meta charset="utf-8"/>
		<meta name="description" content="Inmobiliaria">
		<meta name="keywords" content="venta, pisos, alquiler, inmobiliaria">
		<meta name="author" content="Patricia Lamadrid">

		<!-- Google Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Fahkwang|Roboto" rel="stylesheet">

		<!-- Enllaç a l'arxiu CSS Extern -->
		<link rel=stylesheet href="css/style.css" type="text/css"/>

		<!--CSS Intern-->
		<style type="text/css">

		</style>

		<!-- Enllaç a Javascript Extern -->
		<script  type="text/javascript" src="js/javascript.js"></script>

		<!-- favicon -->
		<link href="img/favicon.ico" rel="icon" type="image/x-icon" />

		<!-- Títol de la pàgina -->
		<title>Inmobiliaria</title>
	</head>
	<body>
		<h2>Registrate</h2>
		<form action="index.php" method="post">
		    <label>Nombre:</label>
		    <input type="text" id="nombre" name="nombre" /><br/>
		    <label>Email:</label>
		    <input type="email" id="email" name="email" /><br/>
		    <label>Password:</label>
		    <input type="password" id="password" name="password" /><br/><br/>
			<label>Confirmar contraseña:</label>
		    <input type="password" id="password" name="password" /><br/><br/>
		
		    <button type="submit">Registrar</button>
		</form>

		<h2>Login</h2>
		<form action="login.php" method="post">
		    <label>E-mail:</label>
		    <input type="email" id="email" name="email" /><br/>
		    <label>Password:</label>
		    <input type="password" id="password" name="password" /><br/><br/>
		
		    <button type="submit">Entrar</button>
		</form>
	

	</body>
</html>

<?php

// Definir variables de conexión

if (isset($_POST["nombre"] && $_POST["email"] && ) && $_POST["password"]){

	// Variables de registro
	$nombre= $_POST["nombre"];
	$email= $_POST["email"];
	$password= $_POST["password"];


	$host="localhost";
	$user="patri";
	$password="patri";
	$database="inmobiliaria";

	// Establecer connexió
	$con= new mysqli($host, $user, $password, $database);


	// Verificar conexión
	if ($con -> connect_errno){
		printf("Connect failed: %s\n", $con->connect_error);
		exit();
	} else {
		echo "Conectado <br/>";
	}



	//Validación de datos de usuario

	//Verificar si usuario ya existe
	$consulta_existe= $con->prepare("SELECT email FROM USUARIO WHERE email LIKE ?");
	$consulta_existe->bind_param("s", $email);
	$consulta_existe->execute();

	$consulta_existe->bind_result($e);

	while ($consulta_existe->fetch()){
		$existe_user=true;
	}

	if ($existe_user){
		$mensaje= "$email ya existe.";
	} else {
		//Componer inserción de registro
		$consulta= $con->prepare("INSERT INTO USUARIO (nombre, email, password) VALUES (?,?,?)");

		$consulta->bind_param("sss", $nombre, $email, $pass_crypt);

		//Encriptar contraseña
		$pass_crypt= password_hash($password, PASSWORD_DEFAULT);

		// Ejecutar consulta
		$consulta->execute();

		$mensaje=  "Usuario $nombre registrado.";
	}
	echo $mensaje;

	// Liberar conexión
	$con->close();
}else {
	echo "hola estoy vivo";
}



?>
