<?php

require_once("conexion.php");
$userId=1;
// Definir variables para componer query, e insertar inmueble :)
if (isset($_POST["publicar_titulo"])){

	$tipo= $_POST["publicar_tipus"];
	$titulo = $_POST["publicar_titulo"];
	$via = $_POST["publicar_via"];
	$nombreVia = $_POST["publicar_nombreVia"];
	$numero = $_POST["publicar_numero"];
	$poblacio = $_POST["publicar_poblacion"];
	$districte = $_POST["publicar_districte"];
	$barri = isset($_POST["publicar_barri"]) ? $_POST["publicar_barri"] : false;
	$latitude = $_POST["publicar_latitude"];
	$longitude = $_POST["publicar_longitude"];
	$precio = $_POST["publicar_precio"];
	$habitacion = $_POST["habitaciones"];
	$banyos = $_POST["banyos"];
	$descripcion = isset($_POST["publicar_descripcion"]) ? $_POST["publicar_descripcion"] : "Sin descripción proporcionada";

	if ($_FILES["imatge1"]["error"]>0){
		echo $_FILES["imatge1"];	
	} else{
		$target_dir1="./media/".$email_login."_";
		$target_file1=$target_dir1.basename($_FILES['imatge1']['name']);

		move_uploaded_file($_FILES["imatge1"]["tmp_name"], $target_file1);
        pujarInmoble($con, $userId, $tipo, $titulo, $via, $nombreVia, $numero, $poblacio, $districte, $barri, $latitude, $longitude, $precio, $habitacion, $banyos, $descripcion, $target_file1);
	$mensaje_final="<p>Piso publicado satisfactoriamente!</p>";
	}
}

function pujarInmoble($con, $userId, $tipo, $titulo, $via, $nombreVia, $numero, $poblacion, $idDistricte, $idBarri, $latitud, $longitud, $precio, $habitaciones, $banyos, $descripcion, $imatge1){
	// Componer registro de inserción
	$consulta=$con->prepare("INSERT INTO inmueble (usuarioId, tipo, titulo, via, calle, numero, poblacion, id_distrito, id_barri, latitud, longitud, precio, habitaciones, banyos, descripcion, imageUrl1) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$consulta->bind_param("issssisiidddiiss", $userId, $tipo, $titulo, $via, $nombreVia, $numero, $poblacion, $idDistricte, $idBarri, $latitud, $longitud, $precio, $habitaciones, $banyos, $descripcion, $imatge1);

	// Ejecutar consulta
	$consulta->execute();
}

// Liberar conexión
$con->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   	 <!-- Required meta tags -->
    	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Icono -->
	<link rel="shortcut icon" type="image/x-icon" href="media/icono.ico" />

	<!-- Iconos del footer -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>

	<!-- Enllaç a l'arxiu CSS Extern -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1LqPNfReHlA4RTAU1YOuVKZxTqvCPa0g&callback=initMap" async defer></script>

	<!-- TinyMCE -->
	<script src="https://cdn.tiny.cloud/1/x1vf6yd01nkuo7t6fsrt8ukyivtf2nweceuxbpx2ztcfzu7s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


	<!-- Enllaç a l'arxiu JS extern -->
	<script src="js/functions.js"></script>
    	
	<title>SweetHome - Publicar inmueble</title>
  </head>
  <body>

	<header>
		<div class="content">
			<img src="media/logoo.png" height="80px;">
			<a class="enlace visible" href="home.php">Buscador</a>
			<a class="enlace" href="form_registrePisos.php">Publicar piso</a>
			<a class="enlace" href="form_registreUsuaris.php">Registrate</a>
			<a class="enlace" href="login.php">Inicia sesión</a>
		</div>
	</header>
	<div class="container pt-5">
		<h4>Formulari de registre de pisos</h4>

		<div class="row">
			<div class="col-6">
				<form id="form-registre-pisos" enctype="multipart/form-data" action="form_registrePisos.php" method="post">
					<p>Omple correctament el següent formulari.</p>
					
					<!-- Inicio de fila publicar piso formulario -->
					<div class="form-row mt-5 mb-4">						
						<!-- Tipo -->
						<div class="col-6">
							<label for="">Que vols fer?</label>
							<select name="publicar_tipus" id="publicar_tipus" class="custom-select">
								<option value="alquilar" selected>Llogar inmoble</option>
								<option value="vender">Vendre inmoble</option>
							</select>
						</div>

						<!-- Titulo -->
						<div class="col-6">
							<label for="">Escriu un títol*</label>
							<input type="text" class="form-control" id="registraTitol" placeholder="Piso en estreno" value="" name="publicar_titulo" required>
							<div id="feedbackTitulo">
							</div>
						</div>
						
					</div>


					<!-- Inicio de fila publicar piso formulario -->
					<div class="form-row mb-4">
						<div class="col-12">
							<label for="">Afegeix una descripció</label> <br/>	
							<textarea class="form-control" rows="7" cols="12" id="registraDescripcio" name="publicar_descripcion">

							</textarea>
							<div id="feedbackDesc">
							</div>
						</div>
					</div>

					<!-- Inicio de fila de publicar piso formulario -->
					<div class="form-row mb-4">
						<!-- Via -->
						<div class="col-4">
							<label for="">Via*</label>
							<select class="custom-select" id="direccionVia" name="publicar_via">
								<option selected value="Carrer">Carrer</option>
								<option value="Torrent">Torrent</option>
								<option value="Avinguda">Avinguda</option>
							</select>
						</div>

						<!-- Nom via -->
						<div class="col-4">
							<label for="">Nom via*</label>
							<input type="text" class="form-control" id="direccionNombreVia" name="publicar_nombreVia" required>
							<div id="feedbackNomVia">

							</div>
						</div>

						<!-- Numero -->
						<div class="col-4">
							<label for="">Número*</label>
							<input type="text" class="form-control" id="direccionNumero" name="publicar_numero" required>
							<div id="feedbackNumero">

							</div>

						</div>
					</div>

					<!-- Inicio de fila publicar piso formulario -->
					<div class="form-row mb-4">
						<!-- Piso -->
						<div class="col-4">
							<label for="">Pis</label>
							<input type="text" class="form-control" id="direccionNumeroPlanta" name="direccionNumeroPlanta">
						</div>

						<!-- Escalera -->
						<div class="col-4">
							<label for="">Escala</label>
							<input type="text" class="form-control" id="direccionEscalera" name="direccionEscalera">
						</div>

						<!-- Numero de puerta -->
						<div class="col-4">
							<label for="">Porta</label>
							<input type="text" class="form-control" id="direccionNumeroPuerta" name="direccionNumeroPuerta">
						</div>
					</div>

					
					<!-- Inicio de fila publicar piso formulario -->
					<div class="form-row mb-4">
						<!-- Código postal -->
						<div class="col-4">
							<label for="">CP</label>
							<input type="text" class="form-control" id="direccionCP">
						</div>
						
						<!-- Distrito -->
						<div class="col-4">
							<label for="">Districte</label>
							<select class="custom-select" id="select_districte" name='publicar_districte'>

							</select>
						</div>

						<!-- Barrio -->
						<div class="col-4">
							<label for="">Barri</label>
							<select class="custom-select" id="select_barris" name='publicar_barri'>
							</select>
						</div>
					</div>

					<div class="form-row mb-4">
						<div class="col-4">
							<label for="">Població</label>
							<select class="custom-select" id="select_poblacio" name='publicar_poblacion'>
								<option selected value="1">Barcelona</option>
							</select>
						</div>

						<!-- Latitud -->
						<div class="col-4">
							<label for="">Latitud</label>
							<input type="text" class="form-control" id="latitude" name="publicar_latitude">
							<div id="feedbackLatitude">
								<?php
									if(strlen($latitude<1)){
										echo $feedback_map;
									}
								?>
							</div>
						</div>

						<!-- Longitud -->
						<div class="col-4">
							<label for="">Longitud</label>
							<input type="text" class="form-control" id="longitude" name="publicar_longitude">
							<div id="feedbacLongitude">
								<?php
									if(strlen($longitude)<1){
										echo $feedback_map;
									}
								?>
							</div>
						</div>

					</div>

					<!-- Inicio de la fila de publicar piso formulario -->

					<div class="form-row mb-4">
						<button type="button" class="btn btn-secondary" id="findLoc" onclick=componerDireccion();>Click para ubicar adreça*</button>
					</div>
					<div class="form-row mb-4">
						<div id="map"></div>
					</div>

					<!-- Inicio de la sexta fila de publicar piso formulario -->
					<div class="form-row">
						<!-- Precio -->
						<div class="form-group col-md-4">
							<label for="publicarPrecio">Preu*</label>
							<input type="number" class="form-control" id="registraPreu" value="" name="publicar_precio" required>
							<div id="feedbacPrecio">
								<?php
									if(strlen($precio)<1){
										echo $feedback;
									}
								?>
							</div>
						</div>

						<!-- Número de habitaciones -->
						<div class="form-group col-md-4">
						      <label class="col-form-label col-sm-12">Nº habitacions</label></br>
						    <div class="row">
						      <div class="col-sm-12">
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="habitaciones" id="gridRadios1" value="1" checked>
							  <label class="form-check-label" for="gridRadios1">
							   1
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="habitaciones" id="gridRadios2" value="2">
							  <label class="form-check-label" for="gridRadios2">
							   2
							  </label>
							</div>
							<div class="form-check ">
							  <input class="form-check-input" type="radio" name="habitaciones" id="gridRadios3" value="3" >
							  <label class="form-check-label" for="gridRadios3">
							   3
							  </label>
							</div>
							<div class="form-check ">
							  <input class="form-check-input" type="radio" name="habitaciones" id="gridRadios4" value="4" >
							  <label class="form-check-label" for="gridRadios4">
							   4
							  </label>
							</div>
							<div class="form-check ">
							  <input class="form-check-input" type="radio" name="habitaciones" id="gridRadios5" value="5" >
							  <label class="form-check-label" for="gridRadios4">
							   5 ó +
							  </label>
							</div>
						      </div>
						    </div>
						</div>
				
						<!-- Número de banyos -->
						<div class="form-group col-md-4">
						      <label class="col-form-label col-sm-12">Nº banys</label></br>
						    <div class="row">
						      <div class="col-sm-12">
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="banyos" id="grid1" value="1" checked>
							  <label class="form-check-label" for="grid1">
							   1
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="banyos" id="grid2" value="2">
							  <label class="form-check-label" for="gridRadios2">
							   2
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="banyos" id="grid3" value="3" >
							  <label class="form-check-label" for="gridRadios3">
							   3
							  </label>
							</div>
							<div class="form-check ">
							  <input class="form-check-input" type="radio" name="banyos" id="grid4" value="4" >
							  <label class="form-check-label" for="gridRadios4">
							   4
							  </label>
							</div>
							<div class="form-check ">
							  <input class="form-check-input" type="radio" name="banyos" id="grid5" value="5" >
							  <label class="form-check-label" for="gridRadios4">
							   5 ó +
							  </label>
							</div>
						      </div>
						    </div>
						</div>
					</div>

					<!-- Inicio de la septima fila de publicar piso formulario -->
					<div class="form-row mb-4">
						<div class="col-4">
							<label for="file">Imatge</label>
							<input type="file" id="imatge1" name="imatge1"><br>
						</div>
					</div>

					<!-- Inicio de la decima fila de publicar piso formulario -->
					<div class="form-group row">
						<div class="col-md-12 text-center">
							<button type="submit" id="btnPublicarPiso" class="btn btn-primary center">Publicar</button>
						</div>
					</div>

					<div>
						<?php
							if(strlen($mensaje_final)>0){
							echo $mensaje_final;
							}
						?>
					</div>

				</form><br><br><br><br><br>
			</div>
			<div class="col-6 ">
				<div class="col-12 pt-5">
					<h4 id="nomPis"></h4>
					<p id="dir"></p>
					<p id="preu"></p>
					<p id="descripcionPiso"></p>
				</div>

			</div>
		</div>
	</div>

	<div class="row fixed-bottom">
		<div id="footer" class="col-12">
			<div class="container">
				<p class="footer_texto">© 2020 Copyright: Patricia Lamadrid</p>
				<ul class="footer_social">
					<li><i class="fa fa-github"></i></li>
					<li><a href=""><i class="fa fa-instagram"></i></a></li>
					<li><i class="fa fa-linkedin"></i></li>
				</ul>
			</div>
		</div>
	</div>

</body>
</html>
