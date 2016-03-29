<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Datos de la pel&iacute;cula seleccionada</title>
<style type="text/css">

</style>
</head>
<body>
<h3>Datos de la pel&iacute;cula seleccionada</h3>

<?php // Conexion a la base
@$conexion=mysql_connect("localhost", "root", "") 
or exit("No se pudo establecer una conexión");
@$dbseleccionada=mysql_select_db("pelicula", $conexion)
or exit("No se pudo seleccionar la base de datos");
?>

<?php

$id = $_GET['id'];
$consulta = mysql_query("SELECT * FROM pelicula WHERE id_pelicula='$id_pelicula'", $conexion);

while ($row=mysql_fetch_array($consulta)) {

$id_pelicula=$row['id_pelicula'];
$nombre_pelicula=$row['nombre_pelicula'];
$ponderacion=$row['ponderacion'];
$identificador=$row['identificador'];

echo "Los datos de la película que ha solicitado son los siguientes: ";
echo "<br><br>";
echo "Nombre: <strong>".($nombre_pelicula)."</strong><br>";
echo "Calificación: <strong>".($ponderacion)."</strong><br>";
echo "URL: <strong>".($identificador)."</strong><br>";
}
?>
<h5><a href="formbusca.html">Volver al formulario</a></h5>
</body>
</html>
