<?php

	include("../conn/conecmysql.php"); // archivo de conexión

	$usuario_id = $_REQUEST['usuarioId'];
	$usuarios_ids = $_REQUEST['usuariosIds'];
	//$usuario_activo = $_REQUEST['usuarioActivo'];

	$sql = "SELECT * FROM usuariodatos WHERE usuarioId = '$usuarios_ids'";

	$query = mysqli_query($conexion, $sql);

	while ($row = mysqli_fetch_array($query)){
		$usuario_nombre = $row['UsuarioDatosNombre'];
		$usuario_apellido = $row['UsuarioDatosApellido'];
	}


	$sql2 = "SELECT * FROM permisos WHERE usuarioId = '$usuarios_ids'";

	$query2 = mysqli_query($conexion, $sql2);

	while ($row2 = mysqli_fetch_array($query2)){
		$permiso_nombre = $row2['permisoNombre'];
		$permiso_cod = $row2['permisoCod'];
	}


echo $usuario_nombre." ".$usuario_apellido;
?>