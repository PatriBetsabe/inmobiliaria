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
}else {
	echo "Conectado";
}

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) ){
	$username= $_POST["username"];
	$email= $_POST["email"];
	$password= $_POST["password"];

	$existe = buscaUsuario($email, $con);


	if ($existe){
		$clase = "visible";
		$email_repeat = "$email ya existe.";
	} else {
		$clase = "invisible";

		//Componer registro de inserción
		$consulta= $con->prepare("INSERT INTO USUARIO (username, email, password) VALUES (?,?,?)");

		print_r($consulta);
		$consulta->bind_param("sss", $username, $email, $pass_crypt);

		//Encriptar contraseña
		$pass_crypt= password_hash($password, PASSWORD_DEFAULT);

		// Ejecutar consulta
		$consulta->execute();

		echo "Usuario $username registrado.";
	}
}



function buscaUsuario($email, $con) { 
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

<html lang="es">
	<head>
		<!-- Informació Meta -->
		<meta charset="utf-8"/>
		<meta name="description" content="Inmobiliaria">
		<meta name="keywords" content="venta, pisos, alquiler, inmobiliaria">
		<meta name="author" content="Patricia Lamadrid">


		<!--CSS Intern-->
		<style type="text/css">

			.visible {
				display: block;
			}
			.invisible{
				display:none;
			}

		</style>

	</head>
	<body>
		<h2>Registrate</h2>
		<form action="registro.php" method="post">
		    <label>Nombre*:</label>
		    <input type="text" id="nombre" name="nombre" /><br/>
		    <label>Apellidos*:</label>
		    <input type="text" id="apellido" name="apellido" /><br/>
		    <label>DNI*:</label>
		    <input type="text" id="dni" name="dni" /><br/>
		    <label>Username*:</label>
		    <input type="text" id="username" name="username" /><br/>
		    <label>Email*:</label>
		    <input type="email" id="email" name="email" /><br/>
			<span style="color:red;" class=<?php echo $clase; ?>><?php echo $email_repeat; ?></span><br/>
		    <label>Password*:</label>
		    <input type="password" id="password" name="password" /><br/><br/>
	            <label>Confirmar contraseña*:</label>
		    <input type="password" id="password" name="c_password" /><br/><br/>
		
		    <button type="submit">Registrar</button>

		</form>


	</body>
</html>
