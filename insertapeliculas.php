<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Formulario de inserci&oacute;n</title>
		<link rel="shortcut icon" href="http://www.dit.ing.unp.edu.ar/wp-content/uploads/favicon.png" type="image/x-icon" />
	  	<link rel="stylesheet" type="text/css" href="content/css/bootstrap.min.css">
	  	<link rel="stylesheet" type="text/css" href="content/css/style.css"media="screen" />
	  	<script type="text/javascript" src="content/js/jquery-2.2.3.min.js" ></script>
	  	<script type="text/javascript" src="content/js/bootstrap.min.js"></script>
	  	<script type="text/javascript" src="content/js/buscar.js"></script>
	</head>
	<body>
		<div class="marco">
			<div class="logo">
	        	<h1><a href=" http://www.dit.ing.unp.edu.ar/"></a></h1> 
	    	</div>
	     	<div class="toppic"></div>	
	    		<div class="contenedor2">
					<?php 
						include("conectarDb.php");
						$nombre = $_POST['nombre'];
						$ponderacion = $_POST['ponderacion'];
						$url = $_POST['url'];
						$identificador = $_POST['identificador'];
						if (empty($nombre) and empty($ponderacion) and empty($url) and empty($identificador)) {  
    						echo "Todos los campos son obligatorios"; 
    					}
    					else{	
						$result = mysql_query("INSERT INTO pelicula (nombre, ponderacion, identificador,url) VALUES ('$nombre', '$ponderacion', '$identificador', '$url')", $conexion);
							echo "<strong>Pelicula insertada con exito!!</strong>";
						}
					?>
					<br></br>
					<br></br>
					<input value = "Nueva Pelicula" type="button" class="btn-success" onclick="location.href='forminserta.html';"/>
					<input value = "Volver" type="button" class="btn-defult" onclick="location.href='index.html';" />
				</div>  
		</div>
	    <div class="footer">
	    	<p>* Diego Carabajal - Carla Santos *</p>
	    </div>  
	 </body>
</html>