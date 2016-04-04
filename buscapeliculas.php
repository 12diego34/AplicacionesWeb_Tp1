<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Buscar pel&iacute;culas</title>

</head>
<body>
<h3>Resultado de la b&uacute;squeda </h3>

<?php 
	include("conectarDb.php");
?>

<?php

if (isset($_GET['nombre'])){
	$nombre = $_GET['nombre'];
}
else{
	$nombre = '';	
}

if (isset($_GET['ponderacion'])){
	$ponderacion = $_GET['ponderacion'];
}
else{
	$ponderacion = '';	
}

if (isset($_GET['identificador'])){
	$identificador = $_GET['identificador'];
}
else{
	$identificador = '';	
}
	
$consulta = mysql_query("SELECT * FROM pelicula WHERE nombre LIKE '$nombre' OR ponderacion LIKE '$ponderacion' OR identificador LIKE '$identificador'", $conexion);

if (mysql_num_rows($consulta)!=0){
	while($row=mysql_fetch_array($consulta)) 
	{
	$id_pelicula=$row['id_pelicula'];
	$nombre=$row['nombre'];
	$ponderacion=$row['ponderacion'];
	$identificador=$row['identificador'];
	
	echo ("<table width='100%' border='0' cellpadding='0'>\n");
	echo ("<tr>\n");
	echo ("<td width='26%'><a href='peliculas.php?id_pelicula=$id_pelicula'>".($nombre)."</a></td>\n");
	echo ("<td width='26%'>".($ponderacion)."</td>\n");
	echo ("<td width='26%'>".($identificador)."</td>\n");
	echo ("<tr>\n");
	echo ("</table>\n");
	echo ("<hr align='left' width='100%'/>");
	}
}
else{
	echo '<b>No hay pel&iacute;culas con las características seleccionadas</b><br /><br />';
}
?>
<h5><a href="buscar.html">Volver a Buscar</a></h5>
<h5><a href="index.php">Volver a Home</a></h5>
</body>
</html>
