<?php
	include ("../BBDD/config.php");
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	$con= mysqli_connect($db_host, $db_user, $db_password) or die ("ERROR CONECTANDO");
		mysqli_select_db($con,$db_name) or die ("ERROR BASE DE DATOS");
	if (!$con) {
		die('No se ha podido conectar a la base de datos');
	}
	mysql_select_db($db_name);


	$idusuario = $_GET['idusuario'];

    $nombreUsuario = "";
    $reputacion = "";
    



	$resultadoViajes=mysqli_query($con, "SELECT * FROM geolocalizaciones WHERE idconductor='$idusuario'");

	if ($resultadoViajes->num_rows > 0)
	{
        $viajes_array = array();
        $peticiones = mysql_query("SELECT * FROM geolocalizaciones WHERE idconductor='$idusuario'");
		while ($viajes = mysql_fetch_array($peticiones)) {
			$sql_usuarios = mysql_query("SELECT * FROM usuarios WHERE id='$viajes[idusuario]' LIMIT 1");
			if(mysql_num_rows($sql_usuarios) > 0)
			{ // Si el usuario existe
				while ($usuario = mysql_fetch_array($sql_usuarios)) {
					array_push($viajes_array, $viajes['lat']."|".$viajes['lon']."|".$viajes['idusuario']."|".$usuario['usuario']."|".$usuario['mail']."|".$usuario['reputacion']);
				}
			}else
			{ // Si no existe, el conductor creo un viaje
				array_push($viajes_array, $viajes['lat']."|".$viajes['lon']."|".$viajes['idusuario']."|Indefinido|Indefinido|Indefinido");
			}
			
        }
		/* Viajes pedidos */
		$geolocalizacion_arr=array(
            "status" => true,
            "mensaje" => "true",
            "viajes_array" => $viajes_array
        );
	} 
	else {
            // No hay viajes
            $geolocalizacion_arr=array(
                "status" => false,
                "mensaje" => "false"
            );
            
		
	}
 
	mysqli_close($con);
	print_r(json_encode($geolocalizacion_arr));
?>