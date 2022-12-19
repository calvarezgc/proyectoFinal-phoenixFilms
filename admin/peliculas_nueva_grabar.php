<?php

include("inc_conexion_peliculas.php");
$tmdbid = $_REQUEST['id'];

$url = "https://api.themoviedb.org/3/movie/$tmdbid?api_key=98fee347b91da83932ea8b9daa0edece&language=es";
$resultado = file_get_contents($url);
$items = json_decode($resultado, true);
// comprobar si ya existe la pelicula en nuestra bd
$tmdb_id = $items['id'];
$query = "SELECT * FROM peliculas WHERE tmdb_id = '$tmdb_id'";
$resultado = mysqli_query($conn, $query);
if (mysqli_num_rows($resultado) == 0) {
  // generar registro en peliculas
  $query = "INSERT INTO peliculas (tmdb_id,titulo,poster,estado,estreno, overview) VALUES ('" . $items['id'] . "','" . $items['title'] . "','" . $items['poster_path'] . "','D','" . $items['release_date'] . "', '" . addslashes($items['overview']) . "')";
  $query;
  $resultado = mysqli_query($conn, $query);
  if ($resultado) {

    $lastid = mysqli_insert_id($conn); // id del ultimo registro insertado
    // GRABAMOS EN LOS GENEROS EN LA TABLA peli_genero
    '<hr>';
    $generos = $items['genres']; //generos recogidos de la api
    foreach ($generos as $key => $valor) {
      '<p>' . $valor['id'] . ' = ' . $valor['name'] . '</p>';
      $queryi = "INSERT INTO peli_genero (peliculaid,generoid) VALUES ($lastid," . $valor['id'] . ")";
      $resultado1 = mysqli_query($conn, $queryi);
      header("Location: peliculas.php");
      if ($resultado1) {
      } else {
        "<p>$queryi</p>";
      }
    }
  } else {
    $query;
  }
} else {
  echo "<p>Upss lo sentimos, ya tenemos este registro de la pelicula '" . $items['title'] . "' con la fecha de estreno '" . $items['release_date'] . "'</p>";
}
mysqli_close($conn);
