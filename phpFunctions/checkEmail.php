<?php

require("../conexion.php");

$email = trim($_POST["email"]);

$sql="SELECT email FROM usuario WHERE email LIKE '" . $email . "'";

$result = $con->query($sql);
$return = array();

if($result->num_rows>0){
	while($row = $result->fetch_assoc()){

		$arr = array('email' => $row["email"]);
		array_push($return, $arr);
	}
	echo json_encode($return);
}

// Liberar conexión
$con->close();

?>
