
var map, infoWindow;

function initMapHome() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 6
	});
}

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 6
	  });
	
	infoWindow = new google.maps.InfoWindow;

	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
		  var pos = {
			lat: position.coords.latitude,
			lng: position.coords.longitude
		  };

		  infoWindow.setPosition(pos);
		  infoWindow.setContent('Location found.');
		  infoWindow.open(map);
		  map.setCenter(pos);
		}, function() {
		  handleLocationError(true, infoWindow, map.getCenter());
		});
	  } else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	  }
	
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
						  'Error: Esto no esta cargando.' :
						  'Error: Your browser doesn\'t support geolocation.');
	infoWindow.open(map);
  }

var lati;
var long;

function getLatLong(address){
	/* Recibe una direccion como parametro
 * Hace una request mediante la API de Google 
 * Y recoge el JSON `results`, de este JSON guardo la longitud y latitud,
 * para finalmente mostrar el marker en el mapa.
 * */
	var geocoder = new google.maps.Geocoder();
	//var address="Carrer de la Selva de Mar 211 08020 Barcelona"; 

	geocoder.geocode( { 'address': address}, function(results, status) { 
		// TODO: Mensaje de dirección no encontrada,
		// En el caso que esta no se encuentre 
		if (status == google.maps.GeocoderStatus.OK) { 
			latitude = results[0].geometry.location.lat();  
			longitude = results[0].geometry.location.lng(); 

			var infowindow = new google.maps.InfoWindow({
				content: "<span>"+address+"</span>"
				});

			var myLatLng = {lat: latitude, lng: longitude}

			map = new google.maps.Map(document.getElementById('map'), {
		  	center: myLatLng,
			  zoom: 16,
			  styles: [
				{elementType: 'geometry', stylers: [{color: '#242f3e'}]},
				{elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
				{elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
				{
				  featureType: 'administrative.locality',
				  elementType: 'labels.text.fill',
				  stylers: [{color: '#d59563'}]
				},
				{
				  featureType: 'poi',
				  elementType: 'labels.text.fill',
				  stylers: [{color: '#d59563'}]
				},
				{
				  featureType: 'poi.park',
				  elementType: 'geometry',
				  stylers: [{color: '#263c3f'}]
				},
				{
				  featureType: 'poi.park',
				  elementType: 'labels.text.fill',
				  stylers: [{color: '#6b9a76'}]
				},
				{
				  featureType: 'road',
				  elementType: 'geometry',
				  stylers: [{color: '#38414e'}]
				},
				{
				  featureType: 'road',
				  elementType: 'geometry.stroke',
				  stylers: [{color: '#212a37'}]
				},
				{
				  featureType: 'road',
				  elementType: 'labels.text.fill',
				  stylers: [{color: '#9ca5b3'}]
				},
				{
				  featureType: 'road.highway',
				  elementType: 'geometry',
				  stylers: [{color: '#746855'}]
				},
				{
				  featureType: 'road.highway',
				  elementType: 'geometry.stroke',
				  stylers: [{color: '#1f2835'}]
				},
				{
				  featureType: 'road.highway',
				  elementType: 'labels.text.fill',
				  stylers: [{color: '#f3d19c'}]
				},
				{
				  featureType: 'transit',
				  elementType: 'geometry',
				  stylers: [{color: '#2f3948'}]
				},
				{
				  featureType: 'transit.station',
				  elementType: 'labels.text.fill',
				  stylers: [{color: '#d59563'}]
				},
				{
				  featureType: 'water',
				  elementType: 'geometry',
				  stylers: [{color: '#17263c'}]
				},
				{
				  featureType: 'water',
				  elementType: 'labels.text.fill',
				  stylers: [{color: '#515c6d'}]
				},
				{
				  featureType: 'water',
				  elementType: 'labels.text.stroke',
				  stylers: [{color: '#17263c'}]
				}
			  ]
	
			});


			var image = {
				url: "https://es.seaicons.com/wp-content/uploads/2016/03/Map-Marker-Marker-Outside-Pink-icon.png",
				size: new google.maps.Size(100, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(70, 70)
			  };

			var marker = new google.maps.Marker({
			  position: myLatLng,
			  map: map,
			  draggable: true,
          	  animation: google.maps.Animation.DROP,
			  title: address,
			  icon: image,
			});

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
		  	});

			var center = new google.maps.LatLng(latitude, longitude);
			map.setCenter(center);
			map.setZoom(16);

			lati = latitude;
			long = longitude;
			saveLatLong();

		}
	});

}

	function componerDireccion(){
		var via = $("#direccionVia option:selected").text();
		var direccionNombreVia = $("#direccionNombreVia").val();
		var direccionNumero = $("#direccionNumero").val();
		var selectPoblacio = $("#select_poblacio option:selected").text();

		if (direccionNombreVia.length == 0){
			alert("Rellena correctamente el nombre de la via para buscar la dirección en el mapa.")
			$("#direccionNombreVia").focus();
		}
		if (direccionNumero.length == 0){
			alert("Rellena correctamente el numero de via para buscar la dirección en el mapa.")
			$("#direccionNumero").focus();
		}
		var direccion = via + " " + direccionNombreVia + " " + direccionNumero + ", " + selectPoblacio;
		getLatLong(direccion);
	}


	function saveLatLong(){
		$("#latitude").val(lati);
		$("#longitude").val(long);
	
	}

	function validateNIF_NIE(value){
		var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
		var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
		var nieRexp = /^[XYZ]{1}[0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
		var str = value.toString().toUpperCase();
	
		if (!nifRexp.test(str) && !nieRexp.test(str)) return false;
	
		var nie = str
		  .replace(/^[X]/, '0')
		  .replace(/^[Y]/, '1')
		  .replace(/^[Z]/, '2');
	
		var letter = str.substr(-1);
		var charIndex = parseInt(nie.substr(0, 8)) % 23;
	
		if (validChars.charAt(charIndex) === letter) return true;
	
		return false;
	  }
	
	function comprovaDNIRepetit(data){
		var dni = $("#validationDNI").val();
		if (dni == data){
			$("#validationDNI").removeClass("is-valid").addClass("is-invalid");
			$("#feedbackDNI").html("<p>DNI ja existeix</p>");
			$("#feedbackDNI").addClass("invalid-feedback")
		} else {
			$("#validationDNI").removeClass("is-invalid").addClass("is-valid");
		}	
	}

	function validateEmail(mail) {
	  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
		return true;
	  }else{
		return false;
	  }
	}

	function comprovaEmailRepetit(data){
		var email = $("#validationEmail").val();
		if (email == data){
			$("#validationEmail").removeClass("is-valid").addClass("is-invalid");
			$("#feedbakEmail").html("<p>Email ja existeix</p>");
			$("#feedbakEmail").addClass("invalid-feedback")
		} else {
			$("#validationEmail").removeClass("is-invalid").addClass("is-valid");
		}	
	}

	function validateTelf(telf){
		var phoneno = /^\d{9}$/;
		if ((telf.match(phoneno))){
			return true;
		}
		return false;
	}

	//Funció generica per comprovar camps buits
	function checkInput(nom, identifierInput, identifierFeedback){
		if (nom == ""){
			$(identifierInput).removeClass("is-valid").addClass("is-invalid");
			$(identifierFeedback).html("<p>Aquest camp no pot estar buit</p>");
			$(identifierFeedback).addClass("invalid-feedback")
		} else {
			$(identifierInput).removeClass("is-invalid").addClass("is-valid");
		}
		
	}

	function composeUsername(){
		var username = "";
		var nom = $("#validationNom").val();
		var cognom = $("#validationCognoms").val();
		var dni = $("#validationDNI").val();
		if (dni && nom && cognom){
			var first = nom.substring(0,1).toLowerCase();
			var second = cognom.replace(/ /g, "");
			var second = second.charAt(0).toUpperCase() + second.slice(1);
			var second = second.substring(0,4);
			var third = "";

			if (dni.startsWith("X") || dni.startsWith("Y") || dni.startsWith("Z")){
				for (var i=2; i<dni.length-1; i++){
					if (i%2 == 0){
						third += dni[i];
					}
				}	
			}else {
				for (var i=0; i<dni.length-1; i++){
					if (i%2 == 0){
						third += dni[i];
					}
				}
			}
			username = first + second + third;
		}
		return username;
	
	}

	function composeDir(){
		var nom = $("#direccionVia option:selected").text();
		var nomVia = $("#direccionNombreVia").val();
		var numero = $("#direccionNumero").val();
		var pis = $("#direccionNumeroPlanta").val();
		var escala = $("#direccionEscalera").val();
		var porta = $("#direccionNumeroPuerta").val();
		var cp = $("#direccionCP").val();
		var districte = $("#select_districte option:selected").text()
		var barri = $("#select_barris option:selected").text();
		var poblacio = $("#select_poblacio option:selected").text();

		var direccion = nom + " " + nomVia + " " + numero + " " + pis + " " + escala + " " + porta + " · " + cp + " · " + districte + " · " + barri + " · " + poblacio
		$("#dir").html(direccion);
	}
	
$(document).ready(function(){

		$("#mapa_inmuebles").css("display", "none");

		$.ajax({
			method: "POST",
			url: "phpFunctions/getDistrictes.php",
			statusCode: {
				404: function(){
					alert("Página no encontrada");
				},
				500: function(){
					alert("Server error");
				}
			}
		})
		.done(function(data) {
			var obj = JSON.parse(data);
			htmlRetorn="";
			for (var i = 0; i < obj.length; i++) {
				htmlRetorn+="<option value=" + obj[i].id + ">" + obj[i].name + "</option>";				
			}
			$("#select_districte").html(htmlRetorn);			
		});
		
		$.ajax({
			method: "POST",
			url: "phpFunctions/getAllBarris.php",
			statusCode: {
				404: function(){
					alert("Página no encontrada");
				},
				500: function(){
					alert("Server error");
				}
			}
		})
		.done(function(data) {
			var obj = JSON.parse(data);
			htmlRetorn="";
			for (var i = 0; i < obj.length; i++) {
				htmlRetorn+="<option value=" + obj[i].id + ">" + obj[i].name + "</option>";				
			}
			$("#select_barris").html(htmlRetorn);			
		});

	/**
	 * Esto es la libreria TinyMCE
	 * Con setup hago validacion de datos en el textarea.
	 */
	tinymce.init({
		selector: 'textarea',
		plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
		toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
		toolbar_mode: 'floating',
		tinycomments_mode: 'embedded',
		tinycomments_author: 'Patricia Lamadrid',
		setup: function (editor) {
			editor.on('change', function () {
				tinymce.triggerSave();
			});
			editor.on('init', function(e) {
				console.log('The Editor has initialized.');
			});
			editor.on('focusout', function(e) {
				var content = tinymce.get("registraDescripcio").getContent();
				$("#descripcionPiso").html(content);

				var identifierInput = "textarea#registraDescripcio";
				var identifierFeedback = "#feedbackDesc";
				checkInput(content, identifierInput, identifierFeedback);
			});
		}
	});


	$("#select_districte").change(function(){
		var districte = $("#select_districte option:selected").val();
		$.ajax({
			method: "POST",
			url: "phpFunctions/getBarri.php",
			statusCode: {
				404: function(){
					alert("Página no encontrada");
				},
				500: function(){
					alert("Server error");
				}
			},
			data: { districte: districte}
		})
		.done(function(data) {
			var obj = JSON.parse(data);
			
			htmlRetorn="";
			for (var i = 0; i < obj.length; i++) {
				htmlRetorn+="<option value=" + obj[i].id + ">" + obj[i].name + "</option>";				
			}
			$("#select_barris").html(htmlRetorn);	
			
		});
	
	});


	$("#validationEmail").focusout(function(){
		var email = $("#validationEmail").val();

		$.ajax({
			method: "POST",
			url: "phpFunctions/checkEmail.php",
			statusCode: {
				404: function(){
					alert("Página no encontrada");
				},
				500: function(){
					alert("Server error");
				}
			},
			data: { email: email}
		})
		.done(function(data) {
			var obj = JSON.parse(data);
			for (var i = 0; i < 1; i++) {
				x = obj[i].email;					
			}
			comprovaEmailRepetit(x);
			console.log(x)
			
		});
	});

	$("#validationDNI").focusout(function(){
		var dni = $("#validationDNI").val();

		$.ajax({
			method: "POST",
			url: "phpFunctions/checkDNI.php",
			statusCode: {
				404: function(){
					alert("Página no encontrada");
				},
				500: function(){
					alert("Server error");
				}
			},
			data: { dni: dni}
		})
		.done(function(data) {
			var obj = JSON.parse(data);
			for (var i = 0; i < 1; i++) {
				x = obj[i].dni;					
			}
			comprovaDNIRepetit(x);
			console.log(x)
			
		});
	
	});

	
	//Centrar el foco en el primer campo del form
	$("#validationNom").focus();

	//Validacion para el campo nom
	$("#validationNom").focusout(function(){
		var nom = $("#validationNom").val();
		var identifierInput = "#validationNom";
		var identifierFeedback = "#feedbackNom";
		checkInput(nom, identifierInput, identifierFeedback);
	});

	// Validacion para el campo cognom
	$("#validationCognoms").focusout(function(){
		var cognom = $("#validationCognoms").val();
		var identifierInput = "#validationCognoms";
		var identifierFeedback = "#feedbackCognoms";
		checkInput(cognom, identifierInput, identifierFeedback);

	});

	// Validacion para el campo DNI
	$("#validationDNI").focusout(function(){
		var dni = $("#validationDNI").val();
		var identifierInput = "#validationDNI";
		var identifierFeedback = "#feedbackDNI";
		checkInput(dni, identifierInput, identifierFeedback);

		if (dni != ""){
			var dniValid = validateNIF_NIE(dni);
			if (!dniValid){
				$("#validationDNI").removeClass("is-valid").addClass("is-invalid");
				$("#feedbackDNI").html("<p>El format introduït és incorrecte</p>");
				$("#feedbackDNI").addClass("invalid-feedback")
			} else {
				$("#validationDNI").removeClass("is-invalid").addClass("is-valid");
			}
		}

	});

	$("#validationDNI").focusout(function(){
		var dni = $("#validationDNI").val();

		if (dni == ""){
			$("#validationDNI").removeClass("is-valid").addClass("is-invalid");
				$("#feedbackDNI").html("<p>El format introduït és incorrecte</p>");
				$("#feedbackDNI").addClass("invalid-feedback")
		} else {
			$("#validationDNI").removeClass("is-invalid").addClass("is-valid");
		}
		
	});

	// Validación y composición para el campo username
	$("#validationUsername").focusin(function(){
		var username = $("#validationUsername").val();
		var nom = $("#validationNom").val();
		var cognom = $("#validationCognoms").val();
		var dni = $("#validationDNI").val();
		if (dni && nom && cognom){
			$("#btnUsername").show();
		}else{
			$("#btnUsername").hide();
		}

		if (username == ""){
			$("#validationUsername").removeClass("is-valid").addClass("is-invalid");
			$("#feedbackUsername").html("<p>Click a '@' per generar username.</p>");
			$("#feedbackUsername").addClass("invalid-feedback")
		} else {
			$("#validationUsername").removeClass("is-invalid").addClass("is-valid");
		}
		
	});

	$("#validationUsername").focusout(function(){
		var username = $("#validationUsername").val();

		if (username == ""){
			$("#validationUsername").removeClass("is-valid").addClass("is-invalid");
			$("#feedbackUsername").html("<p>Click a '@' per generar username.</p>");
			$("#feedbackUsername").addClass("invalid-feedback")
		} else {
			$("#validationUsername").removeClass("is-invalid").addClass("is-valid");
		}
		
	});

	$("#btnUsername").click(function(){
		var username = composeUsername();
		$("#validationUsername").val(username);
	});

	// Validacion para el campo email
	$("#validationEmail").focusout(function(){
		var email = $("#validationEmail").val();
		var identifierInput = "#validationEmail";
		var identifierFeedback = "#feedbakEmail";
		checkInput(email, identifierInput, identifierFeedback);

		if (email != ""){
			var emailValid = validateEmail(email);
			if (!emailValid){
				$("#validationEmail").removeClass("is-valid").addClass("is-invalid");
				$("#feedbakEmail").html("<p>El format introduït és incorrecte</p>");
				$("#feedbakEmail").addClass("invalid-feedback")
			} else {
				$("#validationEmail").removeClass("is-invalid").addClass("is-valid");
			}
		}

		

	});

	// Validacion para el campo telefono
	$("#validationTelf").focusout(function(){
		var telf = $("#validationTelf").val();
		var identifierInput = "#validationTelf";
		var identifierFeedback = "#feedbackTelf";
		checkInput(telf, identifierInput, identifierFeedback);

		if (telf != ""){
			var telfValid = validateTelf(telf);
			if (!telfValid){
				$("#validationTelf").removeClass("is-valid").addClass("is-invalid");
				$("#feedbackTelf").html("<p>El format introduït és incorrecte</p>");
				$("#feedbackTelf").addClass("invalid-feedback")
			} else {
				$("#validationTelf").removeClass("is-invalid").addClass("is-valid");
			}
		}

	});

	$("#validationPassConfirm").focusout(function(){
		var pass = $("#validationPassword").val();
		var passConf = $("#validationPassConfirm").val();
		var identifierInput = "#validationPassConfirm";
		var identifierFeedback = "#feedbackPassConfirm";
		checkInput(passConf, identifierInput, identifierFeedback);

		if(pass != passConf && passConf.length == 0){
			console.log(pass + " " + passConf);
			$("#validationPassConfirm").removeClass("is-valid").addClass("is-invalid");
				$("#feedbackPassConfirm").html("<p>La contrasenya no coincideix.</p>");
				$("#feedbackPassConfirm").addClass("invalid-feedback")
			} else {
				$("#validationPassConfirm").removeClass("is-invalid").addClass("is-valid");
		}
	});

	$("#validationPassword").focusout(function(){
		var pass = $("#validationPassword").val();
		var identifierInput = "#validationPassword";
		var identifierFeedback = "#feedbackPassword";
		checkInput(pass, identifierInput, identifierFeedback);
	});

	
	$("#btnRegistrar").click(function(e) {
		e.preventDefault();
		a = $("#validationNom").hasClass("is-valid");
		b = $("#validationCognoms").hasClass("is-valid");
		c = $("#validationDNI").hasClass("is-valid");
		d = $("#validationUsername").hasClass("is-valid");
		e = $("#validationEmail").hasClass("is-valid");
		f = $("#validationPassword").hasClass("is-valid");
		g = $("#validationPassConfirm").hasClass("is-valid");
		h = $("#validationTelf").hasClass("is-valid");

		if (a && b && c && d && e && f && g && h){
			$("#form-user-register").submit();
		}

	});
	
	

		/* Validación del formulario
		* de pisos
		*/
		$("#registraTitol").focusout(function(){
			var titol = $("#registraTitol").val();
			var barri = $("#select_barris option:selected").text();
			var districte = $("#select_districte option:selected").text()

			var nom = titol + " " + barri + ", " + districte;
			$("#nomPis").html(nom);

			var identifierInput = "#registraTitol";
			var identifierFeedback = "#feedbackTitulo";
			checkInput(titol, identifierInput, identifierFeedback);

		});

		$("#select_barris").focusout(function(){
			var titol = $("#registraTitol").val();
			var barri = $("#select_barris option:selected").text();
			var districte = $("#select_districte option:selected").text()

			var nom = titol + " " + barri + ", " + districte;
			$("#nomPis").html(nom);
			composeDir();
		});

		/*
		$("#select_districte").focusout(function(){
			var titol = $("#registraTitol").val();
			var barri = $("#select_barris option:selected").text();
			var districte = $("#select_districte option:selected").text()

			var nom = titol + " " + barri + ", " + districte;
			$("#nomPis").html(nom);
			composeDir();
		});*/

		$("#direccionVia").focusout(function(){
			composeDir();
		});

		$("#direccionNombreVia").focusout(function(){
			composeDir();

			var via = $("#direccionNombreVia").val();
			var identifierInput = "#direccionNombreVia";
			var identifierFeedback = "#feedbackNomVia";
			checkInput(via, identifierInput, identifierFeedback);
		});

		$("#direccionNumero").focusout(function(){
			composeDir();

			var numero = $("#direccionNumero").val();
			var identifierInput = "#direccionNumero";
			var identifierFeedback = "#feedbackNumero";
			checkInput(numero, identifierInput, identifierFeedback);
		});

		$("#direccionNumeroPlanta").focusout(function(){
			composeDir();
		});

		$("#direccionEscalera").focusout(function(){
			composeDir();
		});

		$("#direccionNumeroPuerta").focusout(function(){
			composeDir();
		});

		$("#direccionCP").focusout(function(){
			composeDir();
		});

		$("#select_poblacio").focusout(function(){
			composeDir();
		});

		$("#registraPreu").focusout(function(){
			var preu = $("#registraPreu").val();
			$("#preu").html(preu);
		});

		$("#showList").click(function(){
			$("#llista_inmuebles").css("display", "block");
			$("#mapa_inmuebles").css("display", "none");
			$("#showList").addClass("active");
			$("#showMap").removeClass("active");
		});
	
		$("#showMap").click(function(){
			$("#llista_inmuebles").css("display", "none");
			$("#mapa_inmuebles").css("display", "block");
			$("#showList").removeClass("active");
			$("#showMap").addClass("active");
		});

		$("#filtrar_pisos").click(function(){
			var tipus = $("#filter_tipus option:selected").val();
			var districte = $("#select_districte option:selected").val()
			var barri = $("#select_barris option:selected").val();
			var precioMin = $("#filter_min option:selected").val()
			var precioMax = $("#filter_max option:selected").val()
			var habitaciones = $("input[name='filter_habitaciones']:checked"). val();
			var banyos = $("input[name='filter_banyos']:checked"). val();
			$.ajax({
				url: "phpFunctions/getInmuebles.php",
				type: 'POST',
				data: {	tipus: tipus,
						districte: districte, 
						barri: barri, 
						precioMin: precioMin,
						precioMax: precioMax,
						habitaciones: habitaciones, 
						banyos: banyos },
					
			}).done(
				function(data){
					initMapHome();
					map.setZoom(12);
					var obj = JSON.parse(data);
					var htmlRetorn="No s'han trobat coincidències";
						if(obj.length>0){
							htmlRetorn=`<div class='container'>
							<div class='row'>`;
								for(var i=0; i<obj.length; i++){
									htmlRetorn += 
									`<div class='col-sm-4 p-3'>
												<div class='card' >
													<img class='card-img-top' height='250px;' src=`+obj[i].img+` alt='Card image cap'>
													<div class='card-body'>
														<h3>`+obj[i].titulo+`</h3>
														<div class='row'>
															<div class='col-md-6 text-left'><h3><span class='badge badge-success'>`+obj[i].precio+` € /mes </span></h3></div>
															<div class='col-md-6 text-right'><p><span>`+obj[i].habitaciones+`<i class='fa fa-bed'></i></span> | <span>`+obj[i].banyos+`<i class='fa fa-bath'></i></span></p></div>
														</div>
														<p>`+obj[i].descripcion+`</p>
													</div>
												</div>
											</div>`;
	
									var LatLng = {lat: parseFloat(obj[i].latitud), lng: parseFloat(obj[i].longitud)};
	
									var marker = new google.maps.Marker({
										position: LatLng,
										map: map,
										title: obj[i].titulo
									});
								}
								htmlRetorn+=`</div>	
								</div>`;

								$("#llista_inmuebles").html(htmlRetorn);
						}else{
							$("#llista_inmuebles").html(htmlRetorn);
						}
				}
			);
		});


		

});
