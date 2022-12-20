<?php
$servidor = "localhost";
$bduser = "root";
$bdclave = "";
$bdnombre = "peliculas";
$conn = mysqli_connect($servidor, $bduser, $bdclave, $bdnombre);

$tmdb_apikey = '********************'; // clave obtenida al registrasrse en https://www.themoviedb.org/ 
$tmdb_ruta_poster = 'https://image.tmdb.org/t/p/w154'; // 


//para adminitir codificación en utf8
if ($conn) { //echo 'Conexión Ok';
  mysqli_set_charset($conn, 'utf8');
}
