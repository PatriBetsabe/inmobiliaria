<?php

require("../conexion.php");

$districte = $_POST["districte"];
$sql="SELECT * FROM barris WHERE id_districte = $districte";

$result = $con->query($sql);
$return = array();

if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$arr = array("name" => utf8_encode($row["name"]),"id" => $row["id"]);
		array_push($return, $arr);;
	}
	echo json_encode($return);
	
}





?>
