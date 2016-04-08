<?php 
header('Content-type: application/json');
include("conectarDb.php");

class Pelicula {
  public $ponderacion;
}

$pelicula = new Pelicula();

if (isset($_GET['id'])){
	$identificador = $_GET['id'];
}
else{
	$identificador = '';	
}

//$pelicula->identificador = $identificador;

$consulta = mysql_query("SELECT ponderacion FROM pelicula WHERE identificador LIKE '$identificador'", $conexion);

if (mysql_num_rows($consulta)!=0){
	while($row=mysql_fetch_array($consulta)) 
	{
	//$pelicula->id=$row['id_pelicula'];
	//$pelicula->nombre=$row['nombre'];
	$pelicula->ponderacion=$row['ponderacion'];
	echo json_encode($pelicula);
	}
}
else{
	echo '{}';
}
?>	
