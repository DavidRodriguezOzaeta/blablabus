<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>BlaBlaBus</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<!-- jQuery, popper -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  		<script>
			$(document).ready(function(){
 
			 $('#destino').typeahead({
			  source: function(query, result)
			  {
			   $.ajax({
			    url:"autocomplete.php",
			    method:"POST",
			    data:{query:query},
			    dataType:"json",
			    success:function(data)
			    {
			     result($.map(data, function(item){
			      return item;
			     }));
			    }
			   })
			  }
			 });
			 
			});
		</script>  
	
		<!-- Estilos -->
		<link rel="stylesheet" href="estilos.css">
		<link rel="icon" type="image/png" href="imagenes/logo.png">
				
	</head>
	<body style="background-image:url('imagenes/fondo2.png');background-size:cover;background-repeat:no-repeat">
		<div class="container-fluid" id="barraSuperior">
			<img src="imagenes/texto.png" width="175px" height="50px" style="position:absolute;left:80px;top:23px">
		  	<a href="index.php"><img src="imagenes/blablacar2.png" width="58px" height="54px" style="margin-top:9px"></a> 
		  	<input type="button" class="btn btn-danger" value="Entrar como administrador" style="float:right;margin-top:2%" onclick="document.getElementById('loginAdmin').style.visibility='visible'">		
		 </div>
		<img src="imagenes/bus.png" class="img-fluid" alt="Responsive image" style="margin-left:39%;margin-top:4%;height:220px;width:350px">
		<div class="container-fluid" id="cuerpo">
			<h2 style="text-align:center;text-decoration:underline;margin-top:8px">Búsqueda de viajes</h2>
			<div align="center">
				<form action="buscar.php" method="post" style="margin-top:15px">
					<table cellpadding="5" id="tabla">
						<tr>
							<td align="center">Origen :</td>
							<td>
								<select>
									<option value="1">Zaragoza</option>
								</select>
							</td>				
						</tr>
	
						<tr>
							<td align="center">Destino :</td>
							<td>
								<input type="text" name="destino" id="destino" class="form-control input-lg" autocomplete="off" placeholder="Selecciona el lugar de destino" />
							</td>				
						</tr>
						<tr>
							<td align="center">Fecha :</td>
							<td><input type="date" name="fecha"></td>				
						</tr>
						<tr>
							<td align="center">Hora :</td>
							<td>
								<select name="hora">
									<option>12</option><option>11</option><option>10</option><option>9</option><option>8</option><option>7</option><option>6</option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option>							
								</select>
								:
								<select name="minutos">
									<option>00</option><option>15</option><option>30</option><option>45</option>
								</select>
								&nbsp;&nbsp;&nbsp;
								<select name="ampm">
									<option>AM</option><option>PM</option>							
								</select>
							</td>		
						</tr>
						<tr>							
							<td style="text-align:right">						
								<div class="btn-group" role="group" aria-label="Basic example">
								  <button type="submit" class="btn btn-primary" style="position:absolute;left:50px">Buscar</button>
								</div>						
							</td>
						</tr>
					</table>
				</form>
				<form action="login.php" method="post">
					<div class="form-group" id="loginAdmin" style="height:135px">
						<label for="exampleInputPassword1" style="margin-top:12px">Contraseña de administrador</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="clave" style="max-width:250px">	
						<input type="submit" value="Enviar" style="margin-top:4px">				
						<div style="margin-top:-16px;margin-left:3px;text-align:right;cursor:pointer" title="Cerrar ventana" onclick="document.getElementById('loginAdmin').style.visibility='hidden'">
							[X]
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
