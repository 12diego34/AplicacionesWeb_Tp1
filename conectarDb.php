<?php // Conexion a la base
@$conexion=mysql_connect("localhost", "root", "") 
or exit("No se pudo establecer una conexi�n");
@$dbseleccionada=mysql_select_db("peliculas", $conexion)
or exit("No se pudo seleccionar la base de datos");
?>