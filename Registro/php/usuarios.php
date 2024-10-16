<?php

	include("../conn/conecmysql.php"); // archivo de conexión

	$usuario_id = $_REQUEST['usuarioId'];
	$usuario_activo = $_REQUEST['usuarioActivo'];

	$sql = "SELECT * FROM usuariodatos WHERE usuarioId = '$usuario_id'";

	$query = mysqli_query($conexion, $sql);

	while ($row = mysqli_fetch_array($query)){
		$usuario_nombre = $row['UsuarioDatosNombre'];
		$usuario_apellido = $row['UsuarioDatosApellido'];
	}

	$sql2 = "SELECT * FROM permisos WHERE usuarioId = '$usuario_id'";

	$query2 = mysqli_query($conexion, $sql2);

	while ($row2 = mysqli_fetch_array($query2)){
		$permiso_nombre = $row2['permisoNombre'];
		$permiso_cod = $row2['permisoCod'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenidos</title>
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="https://kit.fontawesome.com/3446bbef4a.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
	<div class='container'>
		<a href="../index.php">
			<img src="../img/logo.png" height="50px" class="header-logo">
			<div align="center"><font size="1px"><?=$usuario_nombre." ".$usuario_apellido?></font>			
			</div>
			<div align="center"><font size="1px"><?=$permiso_nombre?></font>
			</div>
		</a>
		
		<?php
			if($usuario_activo==1){
		?>
		<nav>
			<a href='pantalla_inicial.php?usuarioId=<?=$usuario_id ?>&usuarioActivo=<?=$usuario_activo?>'>Inicio</a>

			<a href="datos.php?usuarioId=<?=$usuario_id ?>">Datos Personales</a>
			
			<a href="registro.php?usuarioId=<?=$usuario_id ?>">Registros</a>
			<?php
			if($permiso_cod==1){
			?>
			<a href="usuarios.php?usuarioId=<?=$usuario_id ?>&usuarioActivo=<?=$usuario_activo?>">Usuarios</a>
			<?php } ?>
		</nav>
	<?php }else{
		echo "Usuario Desactivado";
	} ?>
	<a href="#" class="hamb"><i class="fa-solid fa-bars"></i></a>
	</div>
</header>

<main>
		<section id="inicio">
			<img src="../img/banner.png" height="100px">
			<form method="post" name="form1">
				<br>
				<div align="center">
					<a href="nuevo_usuario.php?usuarioId=<?=$usuario_id?>" class="boton boton-rojo">
										Nuevo Usuario</a>
					<table>
						<tr align="center" valign="middle" bgcolor="grey">
							<td>#</td>
							<td>Id</td>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Activo</td>
							<td>Editar</td>
						</tr>
						<?php
							$contador=1;
							$sql3 = "SELECT * FROM usuariodatos";

							$query3 = mysqli_query($conexion, $sql3);

							while ($row3 = mysqli_fetch_array($query3)){ ?>
								<tr>
									<td align="center">
										<?=$contador++;?>
									</td>
									<td align="center">
										<?php
										$usuarios_ids = $row3['usuarioId'];
										echo $usuarios_ids;
										?>
									</td>
									<td align="center">
										<!--<a href="editar_usuario.php?usuariosIds=<?=$usuarios_ids?>&usuarioId=<?=$usuario_id?>" class="boton boton-rojo">-->
										<?php
										$usuarios_nombres = $row3['UsuarioDatosNombre'];
										echo $usuarios_nombres;
										?>
										<!--</a>-->
									</td>
									<td align="center">
										<?php
										$usuarios_apellidos = $row3['UsuarioDatosApellido'];
										echo $usuarios_apellidos;
										?>
									</td>
									<td align="center">
										<?php
										$sql4 = "SELECT * FROM usuario WHERE usuarioId=$usuarios_ids";
										//echo $sql4;

										$query4 = mysqli_query($conexion, $sql4);

										while ($row4 = mysqli_fetch_array($query4)){

										$usuarios_activos = $row4['usuarioActive'];

										}
										echo $usuarios_activos;
										?>
									</td>
									<td align="center">
										<a href="editar_usuario.php?usuariosIds=<?=$usuarios_ids?>&usuarioId=<?=$usuario_id?>" class="boton boton-rojo">
										<i class="fa-regular fa-pen-to-square"></i></a>
									</td>
								</tr>			
						<?php	} ?>

					</table>
				</div>
				
			</form>
		</section>
</main>
</body>
<footer>
			<div class="barra-footer">
				&copy; Derechos Reservados - 2024
			</div>
	</footer>
</html>
