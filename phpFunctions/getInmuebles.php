<?php

require("../conexion.php");

$tipus = $_POST["tipus"];
$id_districte = $_POST["districte"];
$id_barri = $_POST["barri"];
$precio_max = $_POST["precioMin"];
$precio_min = $_POST["precioMax"];
$n_habitacions = $_POST["habitaciones"];
$n_banys = $_POST["banyos"];


$where_query= "WHERE tipo like ? AND id_distrito = ? AND id_barri = ? ";

if (strlen($precio_min)>0){
    $where_query.="AND precio > $precio_min ";
}

if (strlen($precio_max)>0){
    $where_query.="AND precio < $precio_max ";
}

if (strlen($n_habitacions)>0){
    $where_query.="AND habitaciones = $n_habitacions ";
}

if (strlen($n_banys)>0){
    $where_query.="AND banyos = $n_banys ";
}

$query ="SELECT id, titulo, precio, habitaciones, banyos, imageUrl1, descripcion, latitud, longitud FROM inmueble $where_query ";

$consulta=$con->prepare($query);
$bind1="sii";

$consulta->bind_param($bind1, $tipus, $id_districte, $id_barri);

// Ejecución de la consulta
$consulta->execute();
$consulta->store_result();

// Resultados
$consulta->bind_result($id, $titulo, $precio, $habitaciones, $banyos, $img, $descripcion, $latitud, $longitud);


$return = array();

if ($consulta->num_rows > 0) {
    while($consulta->fetch()) {
        $arr = array(
            'id' => $id,
            'titulo' => utf8_encode($titulo),
            'precio' => $precio,
            'habitaciones' => $habitaciones,
            'banyos' => $banyos,
            'img' => $img,
            'descripcion' => $descripcion,
            'latitud' => $latitud,
            'longitud' => $longitud,
        );
        array_push($return, $arr);
    
    }
}
    echo json_encode($return);



?>
