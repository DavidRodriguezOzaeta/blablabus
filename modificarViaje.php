<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>Modificar Viaje</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<!-- jQuery, popper -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
	
		<!-- Estilos -->
		<link rel="stylesheet" href="estilos.css">
		<link rel="icon" type="image/png" href="imagenes/logo.png">
		
		<script type="text/javascript">
			function maxLengthCheck(object)
			  {
			    if (object.value.length > object.maxLength)
			      object.value = object.value.slice(0, object.maxLength)
			  }
		</script>		
	</head>
	<body style="background-image:url('imagenes/fondogestion.png');background-size:cover">
		<div class="container-fluid" id="barraSuperior">
			<a href="index.php"><img src="imagenes/blablacar2.png" width="58px" height="54px" style="margin-top:9px"></a> 
			<img src="imagenes/textmodificar.png" width="300px" height="50px" style="position:absolute;left:415px;top:23px">
		 	<input type="button" class="btn btn-danger" value="Volver" style="position:absolute;right:30px;top:20px" onclick="window.open('panelcontrol.php')">
		 </div>
		<div class="col-6 offset-3" style="margin-top:10%;background-color:darkorange;opacity:0.9;border:3px solid aqua;border-radius:2px;color:white">
			<?php
				include("conexion_bd.php");
				$sql="SELECT * FROM localidades";  
				$registros=mysqli_query($conexion,$sql) or die ("Error en la consulta $sql");  
				
				//$sql2="SELECT * FROM localidades";  
				$registros2=mysqli_query($conexion,$sql) or die ("Error en la consulta $sql"); 
				
				
				$sqlDatos="SELECT * FROM viajes as v, localidades as l WHERE idviaje=$_GET[id] AND v.idorigen=l.idlocalidad";  
				$registrosDatos=mysqli_query($conexion,$sqlDatos) or die ("Error en la consulta $sqlDatos");
				$lineaDatos=mysqli_fetch_array($registrosDatos); 
				
				$sqlDatos2="SELECT * FROM viajes as v, localidades as l WHERE idviaje=$_GET[id] AND v.iddestino=l.idlocalidad";  
				$registrosDatos2=mysqli_query($conexion,$sqlDatos2) or die ("Error en la consulta $sqlDatos2");
				$lineaDatos2=mysqli_fetch_array($registrosDatos2); 

			?>
			<form name="datos" id="datos" method="post" action="updDatos.php?id=<?php echo"$lineaDatos[idviaje]"; ?>">
				<table align="center" width="40%" style="margin-top:5%">
					<tr>
						<td><b>Origen</b></td>
						<td>
							<select name="origen" id="origen">
							<?php
								while($linea=mysqli_fetch_array($registros)){
									if($linea[idlocalidad]==$lineaDatos[idlocalidad])
										echo
										"<option value='$lineaDatos[idlocalidad]'selected>$lineaDatos[localidad]</option>";
									else
										echo 
										"<option value='$linea[idlocalidad]'>$linea[localidad]</option>";
								}
							?>
					 		</select>
						</td>
					</tr>
					<tr>
						<td><b>Destino</b></td>
						<td>
							<select name="destino" id="destino">
								<?php
									while($linea2=mysqli_fetch_array($registros2)){
										if($linea2[idlocalidad]==$lineaDatos2[iddestino])
											echo 
											"<option value='$lineaDatos2[idlocalidad]'selected>$lineaDatos2[localidad]</option>";
										else
											echo
											"<option value='$linea2[idlocalidad]'>$linea2[localidad]</option>";
									}
								?>
					 		</select>
						</td>
					</tr>
					<tr>
						<td><b>Fecha</b></td>
						<td>
							<?php
								echo"<input type='date' name='fecha' value='$lineaDatos[fecha]'>";
							?>
						</td>
					</tr>
					<tr>
						<td><b>Hora</b></td>
						<td>
							<?php
								echo"<input type='time' name='hora' value='$lineaDatos[hora]'>";
							?>
						</td>
					</tr>
					<tr>
						<td><b>Plazas Ocupadas</b></td>
						<td>
							<?php
								echo"<input type='number' name='plazasocupadas' min='1' max='65' maxlength='2' oninput='maxLengthCheck(this)' value='$lineaDatos[plazasocupadas]'";
							?>
						</td>
					</tr>
					<tr>
						<td><b>Plazas Máximas</b></td>
						<td>
							<?php
								echo"<input type='number' name='plazasmax' min='30' max='65' maxlength = '2' oninput='maxLengthCheck(this)' style='max-width:75px' value='$lineaDatos[plazasmax]'>";
							?>
						</td>
					</tr>
					<tr>
						<td><b>Precio</b></td>
						<td>
							<?php
								echo"<input type='number' name='precio' min='1500' max='2500' step='50' maxlength = '4' oninput='maxLengthCheck(this)' value='$lineaDatos[precio]'>";
							?>
						</td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td>
							<?php
								echo"<input type='email' name='email' style='max-width:350px' value='$lineaDatos[email]'>";
							?>
						</td>
					</tr>
					<tr>
						<td><b>Nombre</b></td>
						<td>
							<?php
								echo"<input type='text' name='nombre' placeholder='Nombre' style='max-width:350px' value='$lineaDatos[nombre]'>";
							?>
						</td>
					</tr>
				</table>
				<div class="btn-group" role="group" aria-label="Basic example">
					<button type="submit" class="btn btn-primary" style="margin-left:500%;margin-top:10px">Enviar</button>
				</div>
			</form>
		</div>
	</body>
</html>

