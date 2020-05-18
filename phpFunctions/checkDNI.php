<?php

require("../conexion.php");

$dni = trim($_POST["dni"]);

$sql="SELECT dni FROM usuario WHERE dni LIKE '" . $dni . "'";

$result = $con->query($sql);
$return = array();

if($result->num_rows>0){
	while($row = $result->fetch_assoc()){

		$arr = array('dni' => $row["dni"]);
		array_push($return, $arr);
	}
	echo json_encode($return);
}

?>
