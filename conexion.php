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

?>
