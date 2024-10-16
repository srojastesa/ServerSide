<?php

	include("../conn/conecmysql.php"); // archivo de conexión

	$usuario = $_REQUEST['usuario'];
	$pass = $_REQUEST['password'];
	$encontro=0;

	$sql = "SELECT * FROM usuario where usuarioUser= '$usuario' AND usuarioPass = '$pass' ";
	//echo $sql;
	$query = mysqli_query($conexion, $sql);
	while($row = mysqli_fetch_array($query)){
		$usuario_id=$row['usuarioId'];
		$usuario_activo=$row['usuarioActive'];
		$encontro=1;
	}

	if(!$usuario_id && $usuario!='' && $pass!=''){
?>
		<script>
			alert('Usuario o clave inválido');
		</script>
<?php
	}

	if($encontro == 1){
?>
		<script>
			location.href = 'pantalla_inicial.php?usuarioId=<?=$usuario_id ?>&usuarioActivo=<?=$usuario_activo?>';
		</script>
<?php

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/style.css">

	<script>
		function validarFormulario(){
			var txtUsuario = document.getElementById('usuario').value;
			var txtPass = document.getElementById('password').value;

		if(txtUsuario == null || txtUsuario.length == 0 || /^\s+$/.test(txtUsuario)){
			alert('Ingrese usuario');
			return false;
		}

		if(txtPass == null || txtPass.length == 0 || /^\s+$/.test(txtPass)){
			alert('Ingrese clave');
			return false;
		}		
		return true;

		}

		function exeAction(action){

			if(action == 'Cancelar'){
				alert ("entro")
				location.href="../index.php";
			}
		}
	</script>
</head>
<body>
	<form action="" onsubmit="return validarFormulario()">
		<div align="center">
			<table>
				<tbody>
					<tr>
						<td class="titulo" align="center">Login</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="usuario" id="usuario" placeholder="Usuario">
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password" id="password" placeholder="Contraseña">
						</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" class="toolBarButton" name="send" id="send" value="Aceptar"> <a href="#" class="btn_cancelar" onClick="exeAction('<?='Cancelar'; ?> ')">Cancelar</a>
						</td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</form>
</body>
</html>