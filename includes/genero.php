<?php
//Requiere que exista $conn
//Genero el array de generos
$query = "SELECT * FROM genero";
$resultado = mysqli_query($conn, $query);
$generosT = []; //inicializo generosT como array;

while ($fila = mysqli_fetch_assoc($resultado)) {
  $generosT[$fila['id']] = $fila['genero']; //añado elemento al array
}

/* 
$generosT[12] = 'Aventura';
$generosT[28] = 'Accion'; 
*/
