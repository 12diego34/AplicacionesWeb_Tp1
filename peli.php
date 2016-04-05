<?php

//Clase para representar una pelicula

class Pelicula {
 public $id;
 public $nombre;
 public $identificador;
 public $ponderacion;
}



$pelicula = new pelicula();
$pelicula->id = 5;
$pelicula->nombre = "Batman";
$pelicula->identificador = "http://www.imdb.com/title/tt0096895";
$pelicula->ponderacion = "5";
echo json_encode($pelicula);
?>