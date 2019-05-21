<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>Panel de control</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<!-- jQuery, popper -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
	
		<!-- Estilos -->
		<link rel="stylesheet" href="estilos.css">
		<link rel="icon" type="image/png" href="imagenes/logo.png">
				
	</head>
	<body style="background-image:url('imagenes/fondogestion.png');background-size:cover">
		<div class="container-fluid" id="barraSuperior">
			<a href="index.php"><img src="imagenes/blablacar2.png" width="58px" height="54px" style="margin-top:9px" title="Volver a la página principal"></a> 
			<img src="imagenes/textpaneldecontrol.png" width="300px" height="50px" style="position:absolute;left:415px;top:23px">
		 	<input type="button" class="btn btn-danger" value="Cerrar Sesión" style="position:absolute;right:30px;top:20px" onclick="window.open('index.php')">	
		 </div>
		<?php
			include("conexion_bd.php");
			$sql="SELECT v.*, l.localidad AS origen, r.localidad AS destino FROM viajes as v, localidades as l, localidades as r WHERE (v.idorigen=l.idlocalidad) AND (v.iddestino=r.idlocalidad) ORDER BY fecha ASC, hora ASC";  
			
			$registros=mysqli_query($conexion,$sql) or die("Error en la consulta $sql");   //Ejecuta la consulta y mete el contenido de los registros en una variable.
		?>				
		<table align="center" width="60%" style="background-color:white;opacity:0.88;margin-top:8%;border:2px solid black;min-height:46px">
			<tr align="center">
				<td align="center">Origen</td>
				<td align="center">Destino</td>
				<td align="center">Fecha</td>
				<td align="center">Hora</td>
				<td align="center">Plazas Ocupadas</td>
				<td align="center">Plazas Max</td>
				<td align="center">Precio</td>
				<td align="center">Email</td>
				<td align="center">Nombre</td>
				<td align="center">Acción</td>
			</tr>
	
				<?php
					while($linea=mysqli_fetch_array($registros)){
						echo "<tr align='center' bgcolor='#CCCCCC' style='border:2px solid black'>
							<td>$linea[origen]</td><td>$linea[destino]</td><td>$linea[fecha]</td><td>$linea[hora]</td><td>$linea[plazasocupadas]</td><td>$linea[plazasmax]</td><td>$linea[precio] €</td><td>$linea[email]</td><td>$linea[nombre]</td>
							<td><a href='borrarViaje.php?id=$linea[idviaje]'><img src='./imagenes/delete.png' width='36' heigth='36' title='Borrar'></a>
							<a href='modificarViaje.php?id=$linea[idviaje]'><img src='./imagenes/update.png' width='36' heigth='36' title='Editar'></a></td>
						</tr>";	
					}
				?>
			</table>
		
	</body>
</html>

