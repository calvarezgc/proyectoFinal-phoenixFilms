<?php include "includes/session.php"; ?>
<?php include "admin/inc_funciones.php"; ?>

<!DOCTYPE html>
<html lang="es">

<!--   Inicio de head -->

<head>
  <?php include "includes/head.php"; ?>
  <?php include("admin/inc_config.php");
  $headTitle .= "Formulario de registro";
  $headDescription .= "Formulario de registro";
  $headKeywords .= "formulario, registro, cuenta, signup";
  ?>

  <link href="css/mi_estilo.css" rel="stylesheet">

  <style>
    a.sign__input {
      background-color: #ff5860;
      color: white;
      border-radius: 60px;
      top: 20%;
      left: 40%;
      font-size: 20px;
    }

    p.sign__input {
      background-color: #ff5860;
      color: white;
      border-radius: 60px;
      top: 20%;
      left: 40%;
      font-size: 15px;
    }
  </style>
</head>
<!--   Fin de head -->

<body class="body">

  <?php
  if (isset($_POST['nombre'])) {
    foreach ($_REQUEST as $key => $valor) {
      "<p>$key => $valor </p>";
      $$key = $valor;
    }
    $token = str_shuffle("jkldsfndsfegi93knfdsf2313ikfndsf" . uniqid());
    // RECOGIDA Y LIMPIA DE VARS
    $usuario = trim($_REQUEST['usuario']);
    $nombre = limpiarVar($nombre);
    $apellidos = limpiarVar($apellidos);
    $rol = 'U';
    $estado = 'P';
    /*     $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $password2 = mysqli_real_escape_string($conn, md5($_POST['password2'])); */


    // BUSCAR NOMBRE DE USUARIO
    include("admin/inc_conexion_peliculas.php");
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' ";
    $resultado = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultado) > 0) // ya haya un usuario con ese valor
    {
      echo '<p class="sign__input">Usuario ya existe, introduce otro</p>';
    } else {
      if ($password != $password2) {
        echo '<p>No coinciden las contraseñas</p>';
      } else {
        $created_at = time(); // obtengo timestamp
        $modified_at = time(); // obtengo timestamp

        $query = "INSERT INTO usuarios (nombre,apellidos,mail,usuario,password,telefono,rol,estado,token,created_at,modified_at)
                 VALUES ('$nombre','$apellidos','$mail','$usuario','$password','$telefono','$rol','$estado','$token','$created_at','$modified_at')";
        $reultado = mysqli_query($conn, $query);
        if ($resultado) {
          $id = mysqli_insert_id($conn);
          $texto = '<a class="sign__input" href="usuario_activar.php?id=' . $id . "&token=$token" . '" > Activar usuario </a>';

          echo $texto;
        } else {
          echo '<p>Fallo en la Inserción</p>';
        }
      }
    }


    mysqli_close($conn);
  } else {

  ?>


    <div class="sign section--bg" data-bg="img/section/section.jpg">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="sign__content">
              <!-- registration form -->
              <form action="" method="POST" class="sign__form">
                <a href="index.php" class="sign__logo">
                  <img src="img/logo.png" alt="">
                </a>
                <div class="sign__group">
                  <input type="text" class="sign__input" id="usuario" name="usuario" placeholder="Tu Usuario" required>
                </div>

                <div class="sign__group">
                  <input type="text" class="sign__input" id="nombre" name="nombre" placeholder="Tu Nombre" required>
                </div>

                <div class="sign__group">
                  <input type="text" class="sign__input" id="apellidos" name="apellidos" placeholder="Tus Apellidos">
                </div>

                <div class="sign__group">
                  <input type="text" class="sign__input" id="mail" name="mail" placeholder="Tu Email" required>
                </div>

                <div class="sign__group">
                  <input type="password" class="sign__input" id="password" name="password" placeholder="Contraseña" required>
                </div>

                <div class="sign__group">
                  <input type="password" class="sign__input" id="password2" name="password2" placeholder="Repite Contraseña" required>
                </div>

                <div class="sign__group">
                  <input type="text" class="sign__input" id="telefono" name="telefono" placeholder="Tu Telefono">
                </div>

                <!--   <div class="sign__group sign__group--checkbox">
                  <input id="remember" name="remember" type="checkbox" checked="checked">
                  <label for="remember">Acepto <a href="#">los terminos</a></label>
                </div> -->

                <button class="sign__btn" type="submit">Registrarse</button>

                <span class="sign__text">Ya tienes cuenta? <a href="signin.php">Inicia Sesión!</a></span>
              </form>
              <!-- registration form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- JS -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.mousewheel.min.js"></script>
  <script src="js/jquery.mCustomScrollbar.min.js"></script>
  <script src="js/wNumb.js"></script>
  <script src="js/nouislider.min.js"></script>
  <script src="js/plyr.min.js"></script>
  <script src="js/jquery.morelines.min.js"></script>
  <script src="js/photoswipe.min.js"></script>
  <script src="js/photoswipe-ui-default.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>