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
		<link rel="stylesheet" href="estilos.css" style="">
		<link rel="icon" type="image/png" href="imagenes/logo.png">
		
		
		<script type="text/javascript">
			function comprar(id, idviaje){		
				cantidad = document.getElementById(id).value;
				resultado = "comprar.php?cant="+cantidad+"&id="+idviaje;
				window.open(resultado, '_parent');
			}
		</script>
	</head>
	<body style="background-image:url('imagenes/fondogestion.png');background-size:cover">
		<div class="container-fluid" id="barraSuperior" style="height:80px;">
			<a href="index.php"><img src="imagenes/blablacar2.png" width="58px" height="54px" style="margin-top:9px" title="Volver a la página principal"></a> 
			
			<div style="position:absolute; top:0;left:500px;font-size:50;font-family:Century Gothic"> Viajes</div>
		 	
		 </div>

		<?php
			include("conexion_bd.php");
			$sql="SELECT v.*, l.localidad AS origen, r.localidad AS destino FROM viajes as v, localidades as l, localidades as r WHERE (v.idorigen=l.idlocalidad) AND (v.iddestino=r.idlocalidad) AND (v.iddestino=$_POST[destino]) ORDER BY fecha DESC";
				
			$registros=mysqli_query($conexion,$sql) or die("Error en la consulta $sql");   //Ejecuta la consulta y mete el contenido de los registros en una variable.
		?>				
		<table class="text-center" align="center" width="60%" style="background-color:white;margin-top:8%;border:2px solid black">
			<tr>
				<td>Origen</td>
				<td>Destino</td>
				<td>Fecha</td>
				<td>Hora</td>
				<td>Plazas Ocupadas</td>
				<td>Plazas Max</td>
				<td>Precio</td>
				<td>Email</td>
				<td>Nombre</td>
				<td></td>
			</tr>		
				<?php
					$i = 0;
					while($linea=mysqli_fetch_array($registros)){
						echo "<tr bgcolor='#CCCCCC' style='border:2px solid black;'>
								<td>$linea[origen]</td>
								<td>$linea[destino]</td>
								<td>$linea[fecha]</td>
								<td>$linea[hora]</td>
								<td>$linea[plazasocupadas]</td>
								<td>$linea[plazasmax]</td>
								<td>$linea[precio] €</td>
								<td>$linea[email]</td>
								<td>$linea[nombre]</td>
								<td><input id=$i type='number' style='max-width:50px'><input type='button' value='Comprar' onclick='comprar($i, $linea[idviaje])'></td>
							</tr>";	
							$i++;
					}
				?>
			<tr style="opacity:1">
				<td colspan=10 style="font-size:35;font-family:Century Gothic;cursor:pointer" onclick="window.open('anadir.php', '_parent')">Añadir viaje <img width=50 height=50 src="imagenes/add.png"></td>
			</tr>
		</table>
	</body>
</html>

