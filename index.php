<?
	// Conexión a la base de Datos
	include("BBDD/config.php"); // Incluimos los datos de conexion
	session_start(); // Variable sesion
	$conn= mysqli_connect($db_host, $db_user, $db_password) or die ("ERROR CONECTANDO"); // Creamos la conexion
	mysql_select_db($db_name); // Seleccionamos la base de datos MYSQL°

	if(!$_SESSION){
		header("location:login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>


	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- Notificaciones -->
	<script type="text/javascript" src="js/notifIt.js"></script>
	<link rel="stylesheet" type="text/css" href="css/notifIt.css">
</head>
<body>
	<div class="nav-menu">
		<span>TAXI</span>
		<a href="">
			<i class="fa fa-user-circle-o"></i>
		</a>
		<a href="" id="navMenuActive">
			<i class="fa fa-map-marker"></i>
		</a>
		<a href="">
			<i class="fa fa-map-signs"></i>
		</a>
		<a href="">
			<i class="fa fa-cog"></i>
		</a>
	</div>
	<div class="mapSide">
		<div id="map"></div>
	</div>


	<div class="unidadesSide">
		<div class="unidades-titulo">
			<?
			echo "asd";?>
			<span>Unidades disponibles</span>
			<a><i class="fa fa-car"></i></a>

		</div>
		<div class="unidades-tabla">
			<li id="unidadActiva">
				<span>Disponibilidad 1</span>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Disponibilidad 1</span>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Disponibilidad 1</span>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Disponibilidad 1</span>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Disponibilidad 1</span>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Disponibilidad 1</span>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Disponibilidad 1</span>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Disponibilidad 1</span>
				<i class="fa fa-circle"></i>
			</li>
		</div>
		<div class="unidades-acciones">
			<button>
				<span><i class="fa fa-paper-plane"></i> Enviar</span>
			</button>
			<button>
				<span><i class="fa fa-comment"></i> Enviar mensaje</span>
			</button>
		</div>
		<div class="unidades-chat">
			<p>Chat con 'Disponibilidad 1'</p>
			<div class="chatPanel">
				<div class="chatPanel-msg">
					<li>> asdsad / <span>10-09-19 09:10</span></li>
					<li>> asdsad / <span>10-09-19 09:10</span></li>
					<li>> asdsad / <span>10-09-19 09:10</span></li>
					<li>> asdsad / <span>10-09-19 09:10</span></li>
					<li>> asdsad / <span>10-09-19 09:10</span></li>
				</div>
				<div class="chatPanel-footer">
					<input type="text" name="" placeholder="Escribir un mensaje..."/>
					<button><i class="fa fa-paper-plane"></i></button>
				</div>
			</div>
		</div>
	</div>



	<div class="botonesAbajo">
		<button>
			<i class="fa fa-map"></i>
		</button>
		<button id="botonesAbajoActive">
			<i class="fa fa-circle"></i>
			<span>Online</span>
		</button>
	</div>





	<!-- Google Maps -->
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script>
      	var map; // Inicializamos el objeto mapa
      	var markersArray = []; // Aca insertaremos todos los marcadores para tener mayor control
      	var position;
      	function tomarPosicionAgencia() {
      		/* Comprobamos que tengamos permisos para ver la ubicación actual de la agencia */
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(relojPrincipal);
				//crearMapa();
		  	} else {
		    	x.innerHTML = "Geolocation is not supported by this browser.";
		  	}
		}
		function crearMapa(posicion) {
		//function crearMapa() {
			/* Crea el mapa y lo situa en la agencia */
	        position = posicion;
			map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: position.coords.latitude, lng: position.coords.longitude},
          	zoom: 13.5,
		    streetViewControl: true,
		    zoomControl: true,
		    fullscreenControl: true,
		    mapTypeControl: true,
            streetViewControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.LEFT_BOTTOM
            },
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.LEFT_BOTTOM
            },
            fullscreenControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.LEFT_TOP
            },
	        styles: [
	            {elementType: 'geometry', stylers: [{color: '#1E223E'}]},
	            {elementType: 'labels.text.stroke', stylers: [{color: '#1E223E'}]},
	            {elementType: 'labels.text.fill', stylers: [{color: '#ffffff'}]},
	            {
	              featureType: 'administrative.locality',
	              elementType: 'labels.text.fill',
	              stylers: [{color: '#ffffff'}]
	            },
	            {
	              featureType: 'poi',
	              elementType: 'labels.text.fill',
	              stylers: [{color: '#ffffff'}]
	            },
	            {
	              featureType: 'poi.park',
	              elementType: 'geometry',
	              stylers: [{color: '#1E223E'}]
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
	              stylers: [{color: '#ffffff'}]
	            },
	            {
	              featureType: 'road.highway',
	              elementType: 'geometry',
	              stylers: [{color: '#25284B'}]
	            },
	            {
	              featureType: 'road.highway',
	              elementType: 'geometry.stroke',
	              stylers: [{color: '#1f2835'}]
	            },
	            {
	              featureType: 'road.highway',
	              elementType: 'labels.text.fill',
	              stylers: [{color: '#ffffff'}]
	            },
	            {
	              featureType: 'transit',
	              elementType: 'geometry',
	              stylers: [{color: '#2f3948'}]
	            },
	            {
	              featureType: 'transit.station',
	              elementType: 'labels.text.fill',
	              stylers: [{color: '#ffffff'}]
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
	        marcadorAgencia();
	        relojPrincipal(); // Cada 10 seg
	        relojSecundario(); // cada 30 seg

		}


		function marcadorAgencia(){
			//Agrega el marcador en la agencia
			agregarMarcador(position.coords.latitude, position.coords.longitude, "imagenes/support.png");
		}	


		function relojPrincipal(){
			// Funcion que actualiza datos del mapa  (c/ 30s.)
			setTimeout("relojPrincipal()",10*1000); // En 10 segundos repetimos la funcion
		}

		function relojSecundario(){
			// Funcion que actualiza datos no tan importantes (c/ 30s.)
			setTimeout("relojSecundario()",30*1000);
		}

		function agregarMarcador(latitud, longitud, icono, titulo, idOperacion) {
			marker = new google.maps.Marker({
		    	position: {lat: latitud, lng: longitud},
				icon: icono,
				draggable: false,
		    	map: map
		  	});
		  	markersArray.push(marker); // Agrega el marcador al array de marcadores

		  	var infowindow = new google.maps.InfoWindow({ // Crea un adaptador para los infoWindows
                content: '<div id="content"><b>'+titulo+'</b></div>'
            });

            i = 0;
		  	google.maps.event.addListener(marker, 'click', (function(marker, i) { // Listener de InfoWindows
		        return function() {
		        	if(idOperacion != -1){
		        		asignarConductor(idOperacion)
		        	}
		            infowindow.open(map, marker);
		        }
		    })(marker, i));
		  	
		}	
		function limpiarMapa() {
			// Borra todos los marcadores del mapa
		  	if (markersArray) {
		    	for (i in markersArray) {
		      		markersArray[i].setMap(null);
		    	}
		  	}
		}

	/**
	* GeoLocalizar e Insertar en el mapa a los conductores
	*/
	function switchM(){
		// Cambiamos la forma de asignar los viajes
		$.ajax({
        type: "GET",
        url: "BBDD/switch.php",             
        dataType: 'json',
        success: function(response){}})
	}


	function actualizarMapaConductores(){
		// Llamamos a todos los conductores disponibles y su localización actual, lo insertamos en el mapa con un marcador
		$.ajax({
        type: "GET",
        url: "BBDD/locConductores.php",             
        dataType: 'json',
        success: function(response){
        	for (var i = 0; i < response.length; i++) {
        		var splitArray = response[i].split("|");
        		agregarMarcador(parseFloat(splitArray[0]), parseFloat(splitArray[1]), splitArray[2], splitArray[3], -1);
        	};
        }})
	}

	function actualizarMapaClientes(){
		// Llamamos a todos los conductores disponibles y su localización actual, lo insertamos en el mapa con un marcador
		$.ajax({
        type: "GET",
        url: "BBDD/locClientes.php",             
        dataType: 'json',
        success: function(response){
        	for (var i = 0; i < response.length; i++) {
        		var splitArray = response[i].split("|");
        		agregarMarcador(parseFloat(splitArray[0]), parseFloat(splitArray[1]), splitArray[2], splitArray[3], splitArray[4]);
        	};
        }})
	}



	function asignarConductor(id){
		// Actualiza la lista de la derecha al clickear un cliente para asignar viaje
        var divAsignarConductor = "asignarConductor";
        var urlAsignarConductor = "BBDD/Ajax/asignarConductor.php";
        var xmlHttp;
        try{ xmlHttp=new XMLHttpRequest();}catch (e){try{ xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}catch (e){try{xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}catch (e){alert("Tu explorador no soporta AJAX.");return false;}}}
        var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
        var nocacheurl = urlAsignarConductor+"?t="+timestamp;
        xmlHttp.onreadystatechange=function(){if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){document.getElementById(divAsignarConductor).innerHTML=xmlHttp.responseText;}}
        xmlHttp.open("POST",nocacheurl,true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("id="+id); // Enviamos el id de la operación
	}

	function accionAsignarConductor(idOperacion){
		// Se ejecuta cuando el usuario clickea el boton "Asignar Viaje"
		if($("#idconductor").val() != ''){ // Si el campo 'conductor' no esta vacio
			$.ajax({
	        type: "GET",
	        url: "BBDD/asignarConductor.php?idConductor="+$("#idconductor").val()+"&idOperacion="+idOperacion,             
	        dataType: 'json',
	        success: function(response){
	        	notif({
					msg: "Viaje asignado correctamente",
					type: "info",
					timeout: 2000
				});
	        	asignarConductor(-1); // Borramos la info de la derecha enviando un id '-1' que no existe
	        	reloj(); // Actualizamos el mapa y lista de conductores
	        }})
		}
	}

	function listaConductores(){
		// Lista de conductores actualizada
        var divConductores = "listaConductores";
        var urlConductores = "BBDD/Ajax/listaConductores.php";
        var xmlHttp;
        try{ xmlHttp=new XMLHttpRequest();}catch (e){try{ xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}catch (e){try{xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}catch (e){alert("Tu explorador no soporta AJAX.");return false;}}}
        var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
        var nocacheurl = urlConductores+"?t="+timestamp;
        xmlHttp.onreadystatechange=function(){if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){document.getElementById(divConductores).innerHTML=xmlHttp.responseText;}}
        xmlHttp.open("POST",nocacheurl,true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("id="); // Enviamos vacio
	}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOs96_6XIAX9TemfTO00vH3u72ThRVhww&callback=tomarPosicionAgencia"
    async defer></script>

</body>
</html>