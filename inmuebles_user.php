<?php
session_start();

if(isset($_SESSION['user'])){
	$identificador=$_SESSION['identificador'];
} else{
	header('location:home.php');
}

$host="localhost";
$user="patri";
$pass="patri";
$database="inmobiliaria";

// Establecer conexión
$con= new mysqli($host, $user, $pass, $database);

// Verificar conexión
if ($con->connect_errno){
	printf("Connect failed: %s\n", $con->connect_error);
	exit();
} else{
	echo "Conectado";
}

$publicaciones=listarPublicaciones($con, $identificador);


function listarPublicaciones($con, $identificador){
	// Retorna las publicaciones del usuario
	$consulta=$con->prepare("SELECT titulo, precio FROM INMUEBLE WHERE usuarioId LIKE ?");
	$consulta->bind_param("i", $identificador);
	// Ejecución de la consulta
	$consulta->execute();
	$consulta->store_result();
	// Resultados
	$consulta->bind_result($t, $p);

	$result="";
	while ($consulta->fetch()){
		$result=$result. "<p>Titulo: $t</p><p>Precio: $p</p><br/>";
	}
	return $result;
}

// Liberar conexión
$con->close();
?>

<html lang="es">
	<head>
	</head>

	<body>
		<?php
			if (strlen($publicaciones)>0){
				echo $publicaciones;
			}
		?>
	</body>
</html>


