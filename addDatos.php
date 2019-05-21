<?php
	include("conexion_bd.php");
	
	$sql="INSERT INTO viajes SET idorigen='$_POST[origen]', iddestino='$_POST[destino]', fecha='$_POST[fecha]', hora='$_POST[hora]', plazasocupadas='$_POST[plazasocupadas]', precio='$_POST[precio]', plazasmax='$_POST[plazasmax]', email='$_POST[email]', nombre='$_POST[nombre]'";   
	mysqli_query($conexion,$sql) or die("Error en la consulta $sql");
	mysqli_close($conexion);
	header("location:index.php");

?>

