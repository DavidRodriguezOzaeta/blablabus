<?php
	include("conexion_bd.php");
		
	$sql="UPDATE viajes SET plazasocupadas = (plazasocupadas + $_GET[cant]) WHERE idviaje = $_GET[id]";   
	mysqli_query($conexion,$sql) or die("Error en la consulta $sql");
	mysqli_close($conexion);
	header("location:buscar.php");

?>

