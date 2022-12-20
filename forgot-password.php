<?php include "admin/inc_config.php"; ?>
<?php include "includes/config.php"; ?>
<?php include "admin/inc_conexion_peliculas.php"; ?>

<?php
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: index.php");
  die();
}


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$msg = "";

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['mail']);
  $code = mysqli_real_escape_string($conn, md5(rand()));

  if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM usuarios WHERE mail='{$email}'")) > 0) {
    $query = mysqli_query($conn, "UPDATE usuarios SET code='{$code}' WHERE mail='{$email}'");

    if ($query) {
      echo "<div style='display: none;'>";
      //Create an instance; passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '****@gmail.com';                     //SMTP username
        $mail->Password   = '**************';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('****@gmail.com');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recuperacion Contraseña';
        $mail->Body    = 'Aqui tienes el enlace de recuperación<b><a href="http://localhost/proyectoFinal-phoenixFilms/change-password.php?reset=' . $code . '">http://localhost/proyectoFinal-phoenixFilms/change-password.php?reset=' . $code . '</a></b>';

        $mail->send();
        echo 'Mensaje enviado';
      } catch (Exception $e) {
        echo "No se ha podido enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
      }
      echo "</div>";
      $msg = "
      <div class='alert alert-info'>Hemos enviado un enlace de recuperación a su dirección de correo electrónico.</div>";
    }
  } else {
    $msg = "<div class='alert alert-danger'>$email - Este email no se encuentra</div>";
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<!--   Inicio de head -->

<head>

  <?php include("includes/head.php"); ?>
  <?php include("admin/inc_config.php");
  $headTitle .= "Pagina de Olvide la constraseña";
  $headDescription .= "Recuperar y cambiar contraseña";
  $headKeywords .= "olvide, contraseña, formulario, forgot, password";
  ?>


  <style>
    .alert {
      padding: 1rem;
      border-radius: 5px;
      color: white;
      margin: 1rem 0;
    }

    .alert-success {
      color: greenyellow;
    }

    .alert.alert-danger {
      color: #fc5555;
    }

    .alert-info {
      color: #ff55a5;
    }

    .alert-warning {
      color: #ff9966;
    }
  </style>
</head>
<!--   Fin de head -->

<body class="body">

  <?php include("includes/header.php"); ?>



  <div class="sign section--bg" data-bg="img/section/section.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="sign__content">
            <!-- authorization form -->

            <form name="formforgot" action="" method="POST" class="sign__form">
              <a href="index.php" class="sign__logo">
                <img src="img/logo.png" alt="">
              </a>
              <h3 style="color:white">Olvidaste la contraseña</h3>
              <?php echo $msg; ?>
              <!--               <div class="sign__group">
                <input type="text" class="sign__input" name="usuario" id="usuario" placeholder="Usuario">
              </div> -->

              <div class="sign__group">
                <input type="text" class="sign__input" placeholder="Email" name="mail">
              </div>

              <!--   <div class="sign__group sign__group--checkbox">
                <input id="remember" name="remember" type="checkbox" checked="checked">
                <label for="remember">Recuerdame</label>
              </div> -->

              <button name="submit" class="sign__btn" type="submit">Enviar</button>

              <span class="sign__text">No tienes cuenta? <a href="signup.php">Registrate!</a></span>

              <span class="sign__text"><a href="signin.php">Inicia sesión</a></span>
            </form>
            <!-- end authorization form -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include("includes/footer.php"); ?>
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
