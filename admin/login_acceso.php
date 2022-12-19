<?php
session_start(); //Iniciamos sesión

//definimos variables
$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];
include("inc_conexion_peliculas.php");

//hacemos consulta para seleccionar y comprobar si el usuario que está iniciando sesión es Admin o no.
$query = "SELECT  * FROM  usuarios 
WHERE (usuario = '$usuario' AND  password='$password') AND estado='A'";
$resultado = mysqli_query($conn, $query);
$urllogin = 'login.php';
if (isset($_REQUEST['origen'])) {
  if ($_REQUEST['origen'] == 'web') {
    $urllogin = '../signin.php';
  }
}
if (mysqli_num_rows($resultado) == 1) {
  $fila = mysqli_fetch_array($resultado);
  $_SESSION['rol']  = $fila['rol'];
  $rol = $fila['rol'];
  $_SESSION['usuario'] = $usuario = $fila['usuario'];
  $_SESSION['usuarioid']  = $fila['id'];
  $_SESSION['telefono']  = $fila['telefono'];
  $_SESSION['nombre']  = $fila['nombre'];


  mysqli_close($conn);
  include("inc_logaccesos.php");

  //  personalizar la pagina de inicio según el rol asignado
  switch ($rol) {
      //si el usuario tiene el rol de Admin va a:
    case 'A':
      header("location:peliculas.php");
      break;
      //si el usuario tiene el rol de Invitado va a:
    case 'I':
      header("location:../index.php");
      break;
      //si el usuario tiene el rol de Usuario va a:
    case 'U':
      header("location:../index.php");
      break;
      //si el usuario tiene el rol de Editor va a:
    case 'E':
      header("location:peliculas.php");
      break;
      //si no se cumple ninguna devolvemos al usuario a la pagina de login
    default:
      header("location:$urllogin?msg=4");
      break;
  }
  exit;
} else {
  // en caso de error de acceso enviar a la pagina de inicio en este caso la variable $urllogin es la pagina de login.
  header("location:$urllogin?msg=1");
  exit;
}
