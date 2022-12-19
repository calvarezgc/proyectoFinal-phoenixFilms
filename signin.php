<?php include "includes/session.php"; ?>


<!DOCTYPE html>
<html lang="es">

<head>
  <!--   Inicio de head -->
  <?php include("includes/head.php"); ?>
  <?php include("admin/inc_config.php");
  $headTitle .= "Formulario de inicio de sesion";
  $headDescription .= "Formulario de inicio de sesion";
  $headKeywords .= "formulario, inicio, sesion, signin";
  ?>
  <!--   Fin de head -->
</head>

<body class="body">

  <div class="sign section--bg" data-bg="img/section/section.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="sign__content">
            <!-- authorization form -->

            <?php
            if (isset($_REQUEST['msg'])) {
              /* mirar codigo de admin/login.php */
              switch ($_REQUEST['msg']) {
                case 1:
                  $texto = "Error de autentificación";
                  break;
                case 2:
                  $texto = "Desconexión correcta";
                  break;
                case 3:
                  $texto = "vienes de la pagina caducada ";
                  break;
                case 4:
                  $texto = "Contacta con administracio por tu rol";
                  break;
                default:
                  $texto = "Ups !! que ha pasado";
                  break;
              }
              echo $texto;
            }
            ?>
            <form name="formlogin" action="admin/login_acceso.php" method="POST" class="sign__form">
              <a href="index.php" class="sign__logo">
                <img src="img/logo.png" alt="">
              </a>

              <div class="sign__group">
                <input type="text" class="sign__input" name="usuario" id="usuario" placeholder="Usuario">
              </div>

              <!--
                <div class="sign__group">
                <input type="text" class="sign__input" placeholder="Email">
              </div> -->

              <div class="sign__group">
                <input type="password" class="sign__input" name="password" id="password" placeholder="Tu Contraseña">
              </div>

              <div class="sign__group sign__group--checkbox">
                <input id="remember" name="remember" type="checkbox" checked="checked">
                <label for="remember">Recuerdame</label>
              </div>

              <button class="sign__btn" type="submit">Inicia Sesión</button>

              <span class="sign__text">No tienes cuenta? <a href="signup.php">Registrate!</a></span>

              <span class="sign__text"><a href="forgot-password.php">Olvidaste la contraseña?</a></span>
            </form>
            <!-- end authorization form -->
          </div>
        </div>
      </div>
    </div>
  </div>

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