<?php

	$dbhost="127.0.0.1"; //Host de MySQL
	$dbusuario ="root"; // usuario para conección a la base de datos
	$dbpassword =""; // contraseña de acceso a la DB
	$db="registro";  // Nombre de Base de Datos

	$conexion = new mysqli($dbhost, $dbusuario, $dbpassword, $db); // Realizamos la conexión


	if(!($conexion))
	{
		echo "Error de conexión con el servidor MySQL";
		exit();
	}else {
		//echo "Conexión exitosa";
	}

	global $conexion;

?>