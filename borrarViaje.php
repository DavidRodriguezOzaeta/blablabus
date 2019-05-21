<?php
	include("conexion_bd.php");
	$sql="DELETE FROM Viajes WHERE idViaje=$_GET[id]";
	mysqli_query($conexion,$sql) or die("Error en la consulta $sql");
	
	mysqli_close($conexion);
	header("location:panelControl.php");

?>
