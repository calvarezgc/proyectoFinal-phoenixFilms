<?php
include("inc_conexion_peliculas.php");
$id = $_REQUEST['id'];
$estado = $_REQUEST['estado']; // VIENEN DE peliculas_genero_estado_02.PHP
$query = "UPDATE  peliculas SET estado = '" . $estado . "'  WHERE id = $id";
$resultado = mysqli_query($conn, $query);
if ($resultado) {
  header("location:peliculas_genero_estado_02.php");
} else {
  echo $query;
}
