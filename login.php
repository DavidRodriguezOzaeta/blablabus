<?php
	include("conexion_bd.php");
	$contraseña = "$_POST[clave]";    
	    
	if($contraseña != 'admin')
		echo "Contraseña incorrecta <a href='index.php'>aquí</a> para continuar";
	else
		header("location:panelControl.php");
?>