<?php 
header('Content-type: application/json');
include("conectarDb.php");

class Pelicula {
  public $ponderacion; 
  public $identificador;
  public $nombre;
  
}

if (!empty($_GET['id'])){
	$identificador = $_GET['id'];
}
else{
	$identificador = '';	
}

$consulta = mysql_query("SELECT identificador, nombre, ponderacion FROM pelicula WHERE nombre LIKE '%$identificador%' OR identificador LIKE '%$identificador%' ", $conexion);
$peliculas = array();

if (mysql_num_rows($consulta)!=0){
	while($row=mysql_fetch_assoc($consulta)) 
	{
		$pelicula = new Pelicula();
		$pelicula->ponderacion=$row['ponderacion'];
		$pelicula->identificador=$row['identificador'];
		$pelicula->nombre=$row['nombre'];
		$peliculas[] = $pelicula;
	}
}
else{
	echo "<strong>No existe la pelicula solicitada</strong>";
}

echo json_encode($peliculas);
?>	