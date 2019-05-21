<?php
	include("conexion_bd.php");
	
	$sql="UPDATE viajes SET idorigen='$_POST[origen]', iddestino='$_POST[destino]', fecha='$_POST[fecha]', hora='$_POST[hora]', plazasocupadas='$_POST[plazasocupadas]', precio='$_POST[precio]', plazasmax='$_POST[plazasmax]', email='$_POST[email]', nombre='$_POST[nombre]'   WHERE (idviaje=$_GET[id])";   
	mysqli_query($conexion,$sql) or die("Error en la consulta $sql");
	mysqli_close($conexion);
	header("location:panelcontrol.php");

?>

