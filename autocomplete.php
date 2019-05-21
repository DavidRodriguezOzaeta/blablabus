<?php
	include('conexion_bd.php');
	$request = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT * FROM municipios WHERE municipio LIKE '%".$request."%'";
	$busqueda =mysqli_query($connect, $query);

	$data = array();

if(mysqli_num_rows($busqueda) > 0){
 	while($row = mysqli_fetch_assoc($busqueda)){
  		$data[] = $row["localidad"];
 	}
 	echo json_encode($data);
}


	
?>