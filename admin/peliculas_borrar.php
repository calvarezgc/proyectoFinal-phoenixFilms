<!DOCTYPE html>

<h2>PAGINA BORRADO DE LA PELICULA</h2>

<?php
include("inc_session.php");
include("inc_config.php");
if (isset($_REQUEST['id'])) {
  include("inc_conexion_peliculas.php");
  $id = $_REQUEST['id'];
  $query = "DELETE FROM peliculas WHERE id=$id";
  $resultado = mysqli_query($conn, $query);
  if ($resultado) {
    $identificador = $id + 1;
    header("location:peliculas.php#pel_$identificador");
    exit;
    echo '<p>Se ha borrado correctamente la pelicula</>';
  } else {
    echo "<p> $query</p>";
  }
  mysqli_close($conn);
} else {
  echo '<p>No hay pelicula que borrar</p>';
}
