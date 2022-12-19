<!DOCTYPE html>

<h2>PAGINA BORRADO DE LA PELICULA</h2>

<?php //include("inc_session.php");
include("inc_conexion_peliculas.php");
if (isset($_REQUEST['id'])) {
  include("inc_conexion_peliculas.php");
  $id = $_REQUEST['id'];
  $query = "DELETE FROM usuarios WHERE id=$id";
  $resultado = mysqli_query($conn, $query);
  if ($resultado) {
    $iden = $id + 1;
    header("location:usuarios.php#pel_$iden");
    exit;
    echo '<p>Usuario borrado con exito</>';
  } else {
    echo "<p> $query</p>";
  }
  mysqli_close($conn);
} else {
  echo '<p>No hay usuario que borrar</p>';
}
