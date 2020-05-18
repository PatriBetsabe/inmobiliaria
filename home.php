<!doctype html>

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
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

	<!-- Enllaç a l'arxiu CSS Extern -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	
	<!-- TinyMCE -->
	<script src="https://cdn.tiny.cloud/1/x1vf6yd01nkuo7t6fsrt8ukyivtf2nweceuxbpx2ztcfzu7s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<!-- Enllaç a l'arxiu JS extern -->
	<script src="js/functions.js"></script>

	<!-- Titol de la pàgina -->
    <title>SweetHome - Encuentra tu hogar</title>
</head>
<body>

	<header>
		<div class="content">
			<img src="media/logoo.png" height="80px;">
			<a class="enlace" href="form_registrePisos.php">Publicar piso</a>
			<a class="enlace" href="form_registreUsuaris.php">Registrate</a>
			<a class="enlace" href="login.php">Inicia sesión</a> 
		</div>
	</header>

	<div class="filtros container">
	</br>
	<h3 style="text-align:center;">Comienza a buscar!</h3>
	<!-- Inicio de primera fila de filter formulari -->
	<div class="form-row">
		<!-- Tipus -->
		<div class="form-group col-md-4">
			<label for="inputTipus">Tipo</label>
			<select id="filter_tipus" class="custom-select" name="filter_tipus">
				<option value="alquilar" selected>Piso en alquiler</option>
				<option value="vender" >Piso en venta</option>
			</select>
		</div>
		<!-- Districte -->
		<div class="form-group col-md-4">
			<label for="inputDistricte">Districte</label>
			<select id="select_districte" class="custom-select filter_districte" name="filter_districte">

			</select>
		</div>

		<!-- Barri -->
		<div class="form-group col-md-4">
			<label for="inputBarri">Barri</label>
			<select id="select_barris" class="custom-select filter_barris" name="filter_barri">

			</select>
		</div>

	</div>
	<!-- Fin de first row filter formulari -->
	
	<!-- Inicio second row -->

	<div class="form-row">
		<!-- Precio -->
		<div class="form-group col-md-4">
			<label for="selectPrice">Precio</label>
			<select id="filter_min" class="custom-select" name="filter_min">
				<option selected value="">Min</option>
				<option value=400>400</option>
				<option value=450>450</option>
				<option value=500>500</option>
				<option value=600>600</option>
				<option value=650>650</option>
				<option value=700>700</option>
				<option value=750>750</option>
				<option value=800>800</option>
				<option value=850>850</option>
				<option value=900>900</option>
				<option value=950>950</option>
				<option value=1000>1000</option>
				<option value=1100>1100</option>
				<option value=1200>1200</option>
				<option value=1300>1300</option>
				<option value=1400>1400</option>
				<option value=1450>1450</option>
				<option value=1500>1500</option>
				<option value=1600>1600</option>
				<option value=1700>1700</option>
			</select>
			</br></br>
			<select id="filter_max" class="custom-select" name="filter_max">
				<option selected value="">Max</option>
				<option value=400>400</option>
				<option value=450>450</option>
				<option value=500>500</option>
				<option value=600>600</option>
				<option value=650>650</option>
				<option value=700>700</option>
				<option value=750>750</option>
				<option value=800>800</option>
				<option value=850>850</option>
				<option value=900>900</option>
				<option value=950>950</option>
				<option value=1000>1000</option>
				<option value=1100>1100</option>
				<option value=1200>1200</option>
				<option value=1300>1300</option>
				<option value=1400>1400</option>
				<option value=1450>1450</option>
				<option value=1500>1500</option>
				<option value=1600>1600</option>
				<option value=1700>1700</option>
			</select>
		</div>

		<!-- Número de habitaciones -->
		<div class="form-group col-md-4">
			<label class="col-form-label col-sm-12">Nº habitaciones</label></br>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-check">
							<input class="form-check-input" type="radio" name="filter_habitaciones" id="gridRadios0" value="" checked>
							<label class="form-check-label" for="gridRadios0">--</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="radio" name="filter_habitaciones" id="gridRadios1" value="1">
						<label class="form-check-label" for="gridRadios1">1</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="radio" name="filter_habitaciones" id="gridRadios2" value="2">
						<label class="form-check-label" for="gridRadios2">2</label>
					</div>

					<div class="form-check ">
						<input class="form-check-input" type="radio" name="filter_habitaciones" id="gridRadios3" value="3" >
						<label class="form-check-label" for="gridRadios3">3</label>
					</div>

					<div class="form-check ">
						<input class="form-check-input" type="radio" name="filter_habitaciones" id="gridRadios4" value="4" >
						<label class="form-check-label" for="gridRadios4">4</label>
					</div>

					<div class="form-check ">
						<input class="form-check-input" type="radio" name="filter_habitaciones" id="gridRadios5" value="5" >
						<label class="form-check-label" for="gridRadios4">5+</label>
					</div>
				</div>
			</div>
		</div>

		<!-- Número de banyos -->
		<div class="form-group col-md-4">
			<label class="col-form-label col-sm-12">Nº baños</label></br>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-check">
					<input class="form-check-input" type="radio" name="filter_banyos" id="grid0" value="" checked>
					<label class="form-check-label" for="grid0">
					--
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" type="radio" name="filter_banyos" id="grid1" value="1">
					<label class="form-check-label" for="grid1">
					1
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" type="radio" name="filter_banyos" id="grid2" value="2">
					<label class="form-check-label" for="gridRadios2">
					2
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" type="radio" name="filter_banyos" id="grid3" value="3" >
					<label class="form-check-label" for="gridRadios3">
					3
					</label>
					</div>
					<div class="form-check ">
					<input class="form-check-input" type="radio" name="filter_banyos" id="grid4" value="4" >
					<label class="form-check-label" for="gridRadios4">
					4
					</label>
					</div>
					<div class="form-check ">
					<input class="form-check-input" type="radio" name="filter_banyos" id="grid5" value="5" >
					<label class="form-check-label" for="gridRadios4">
					5+
					</label>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- Fin second row -->

	<!-- Button filter formulari -->
	<div class="form-group row">
		<div class="col-md-12 text-center">
			<button type="submit" id="filtrar_pisos" class="btn btn-primary center">Buscar</button>
		</div>
	</div>			
	<!-- Final Button filter formulari -->
	<br>

</div>

<div class='container resultado'>
	<div class='row'>
		<div class='col-md-12'>
			<nav aria-label='Page navigation example'>
				<ul class='pagination justify-content-end'>
					<li class='page-item active' id='showList'><a class='page-link'><i class='fa fa-list'></i></span> Vista Lista</a></li>
					<li class='page-item' id='showMap'><a class='page-link'><i class='fa fa-map'></i></span> Vista Mapa</a></li>
				</ul>
			</nav>
		</div>
	</div>


	<div class="col-md-12">
		<div class="container" id="llista_inmuebles">
		<br><br><br><br>
		</div>

		<div class="container" id="mapa_inmuebles">
			<div class="container" id="map"></div>
			<br><br><br><br><br>
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

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1LqPNfReHlA4RTAU1YOuVKZxTqvCPa0g&callback=initMap" async defer></script>

</html>
