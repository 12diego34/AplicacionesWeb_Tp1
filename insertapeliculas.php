<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario de inserción</title>
<link rel="stylesheet" href="content/css/style.css" type="text/css" media="screen" />

</head>
<br>
<body>
<?php 
	include("conectarDb.php");
?>

<?php

$nombre = $_POST['nombre'];
$ponderacion = $_POST['ponderacion'];
$url = $_POST['url'];
$identificador = $_POST['identificador'];


$result = mysql_query("INSERT INTO pelicula (nombre, ponderacion, identificador,url) VALUES ('$nombre', '$ponderacion', '$identificador', '$url')", $conexion);

echo "<strong>Ha insertado con &eacute;xito los siguientes datos:</strong>";
echo "<br>";
echo "<br>";
echo "Nombre de Pel&iacute;cula: <strong>".($nombre)."</strong><br>";
echo "<br>";
echo "Calificaci&oacute;n: <strong>".($ponderacion)."</strong><br>";
echo "<br>";
echo "Url de la pe&iacute;cula: <strong>".($url)."</strong><br>";
echo "<br>";
echo "Identificador: <strong>".($identificador)."</strong><br>";
echo "<br>";
?>
<br>
<h5><a href="forminserta.html">Nueva Pel&iacute;cula </a></h5>
<br>
<h5><a href="index.php">Volver a Home</a></h5>
<br>
</body>
</html>
