<?php

	
	include("../conn/conecmysql.php"); // archivo de conexión

	$usuario_id = $_REQUEST['usuarioId'];
	$nombre = $_REQUEST['nombre'];
	$apellido = $_REQUEST['apellido'];
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];

	$stmt = $conexion->prepare("INSERT INTO usuario (usuarioUser, usuarioPass) VALUES (?, ?)");
	$stmt->bind_param("ss", $user, $pass);

	// Ejecutar la consulta
	if ($stmt->execute()) {
	    //echo "Nuevo registro user creado exitosamente";
	} else {
	    echo "Error: " . $stmt->error;
	}

	$sql = "SELECT * FROM usuario ORDER BY usuarioId DESC LIMIT 1";
	$result = $conexion->query($sql);


	if ($result->num_rows > 0) {
    // Mostrar los datos del último registro
    while($row = $result->fetch_assoc()) {
        $id_user = $row["usuarioId"]; //echo " ".$id_user." ";
    }
}
	$stmt = $conexion->prepare("INSERT INTO usuariodatos (usuarioId, usuarioDatosNombre, usuarioDatosApellido) VALUES (?, ?, ?)");
	$stmt->bind_param("iss", $id_user, $nombre, $apellido);

	// Ejecutar la consulta
	if ($stmt->execute()) {
	   // echo "Nuevo registro userData creado exitosamente";
	} else {
	    echo "Error: " . $stmt->error;
	}
	// Cerrar la conexión
	$stmt->close(); 
	$conexion->close();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Crea usuario</title>
	<script>
		function redirigir() {
			setTimeout(function() {
				window.location.href = "usuarios.php?usuarioId=<?=$usuario_id?>&usuarioActivo=1";
			}, 2000); // 2000 milisegundos = 2 segundos
		}
	</script>
</head>
<body onload="redirigir()">
	<div align="center">
	<p>Serás redirigido en 2 segundos...</p>
	</div>
</body>
</html>
