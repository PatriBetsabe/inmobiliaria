<?php

require("../conexion.php");
//$id = $_POST["id"];
//echo "hola";
$sql = "SELECT * FROM districtes";
$result = $con->query($sql);
$return = array();

if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$arr = array("name" => utf8_encode($row["name"]),"id" => $row["id"]);
		
		array_push($return, $arr);
	}
	//print_r($return);
	
}

echo json_encode($return);

// Liberar conexión
//$con->close();

?>
