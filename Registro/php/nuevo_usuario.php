<?php

	include("../conn/conecmysql.php"); // archivo de conexión

	$usuario_id = $_REQUEST['usuarioId'];

	?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nuevo Usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/style.css"> 


<script>
		
	function validarFormulario(){
		var txtUser = document.getElementById('user').value;
		var txtPass = document.getElementById('pass').value;
		var txtNombre = document.getElementById('nombre').value;
		var txtApellido = document.getElementById('apellido').value;

		if(txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre)){
			alert('Ingrese el nombre');
			return false;
		}
		
		if(txtApellido == null || txtApellido.length == 0 || /^\s+$/.test(txtApellido)){
			alert('Ingrese el apellido');
			return false;
		}

		if(txtUser == null || txtUser.length == 0 || /^\s+$/.test(txtUser)){
			alert('Ingrese el user');
			return false;
		}
		
		if(txtPass == null || txtPass.length == 0 || /^\s+$/.test(txtPass)){
			alert('Ingrese su clave');
			return false;
		}


		
		return true;
	
}	

</script>

</head>
<body>
	<br>
	<div align="center">
	<form action="crea_usuario.php" method="POST" onsubmit="return validarFormulario()">
		<table>
			<tr>
				<td colspan="5" align="center" class="titulo">
					Usuario nuevo</td>
				</td>
			</tr>
			<tr>
				<td>
					<span>Nombre:</span>
				</td>
				<td>
					<input type="text" name="nombre" id="nombre">
				</td>
				<td></td>
				<td>
					<span>Apellido:</span>
				</td>
				<td>
					<input type="text" name="apellido" id="apellido">
				</td>
			</tr>
			<tr>
				<td>
					<span>Usuario:</span>
				</td>
				<td>
					<input type="text" name="user" id="user">
				</td>
				<td><input name="usuarioId" type="hidden" id="usuarioId" value="<?=$usuario_id; ?>"></td>
				<td>
					<span>Clave:</span>
				</td>
				<td>	
					<input type="password" name="pass" id="pass">
				</td>
			</tr>
			<tr>
				<td colspan="5" align="center">
					<br>
					<input class="toolBarButton" name="send" type="submit" id="send" value="Grabar">
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>