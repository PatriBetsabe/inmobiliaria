<?php

session_start();
require("conexion.php");

if(isset($_SESSION['user'])){
} else {
	header('location:home.php');
}

if (isset($_SESSION['login'])){
} else {
	header("location:home.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="media/icono.ico" />
	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
    <title>SweetHome - Mi cuenta</title>
  </head>

	<header>
		<div class="content">
			<img src="media/logoo.png" height="80px;">
			<a class="enlace visible" href="destroy.php">Cerrar sesión</a> 
		</div>
	</header>
	<body>
		
		<h3>Hola <?php echo $_SESSION['user'] ?></h3>
		
	<nav>
		<ul id="menu">
		 <li><a href="#">Lorem</a></li>
		 <li><a href="#">Ipsum</a></li>
		 <li><a href="#">Dolor</a></li>
		 <li><a href="#">Sit</a></li>
		 <li><a href="#">Amet</a></li>
	 </ul>
	</nav>

		<a href="form_registrePisos.php">Publicar un inmueble</a><br/>
		<a href="inmuebles_user.php">Ver mis publicaciones</a>

		<p><?php echo $_SESSION['identificador'] ?></p>

		<div>
			<?php if (strlen($ultims_inmobles)>0){
					echo "<h1>Últimas Publicaciones</h1>";
					echo $ultims_inmobles;
				}			
			?>
		</div>

	</body>

</html>

