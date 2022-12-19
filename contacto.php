<?php include "includes/session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<?php include "includes/config.php"; ?>
<?php include "admin/inc_conexion_peliculas.php"; ?>

<!DOCTYPE html>
<html lang="es">

<!-- Inicio de head -->

<head>
  <?php
  /* variables particulares de pagina */
  $headTitle .= " Contacto";
  $headDescription .= "Contacta con nosotros ";
  $headKeywords .= "contacto, contacta";
  $menugrupo = '';
  $menuenlace = 'contacto';
  include("includes/head.php");
  ?>

  <style>
    .sign__content {
      color: white;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100vh;
      padding: 40px 0;
      margin-top: 100px;
      font-family: 'Open Sans', sans-serif;
    }

    textarea {
      overflow: auto;
      resize: vertical;
      background-color: #2B2B31;
      border-color: #2B2B31;
    }

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
      margin-top: 100px !important;
    }

    .alert-warning {
      color: #ff9966;
    }
  </style>
</head>
<!-- Fin de head -->

<body>


  <!-- Inicio de header -->
  <header>
    <?php include("includes/header.php"); ?>
  </header>
  <!-- Fin de header -->

  <!-- Contact Start -->
  <?php
  if ($_POST) {
    $textmail = $mailEnvioCabecera;
    foreach ($_POST as $key => $valor) {
      $$key = $valor;
    }
    $textomail = "<h1>Mensaje Recibido de la web</h1>";
    $textomail .= "<p>Asunto  : $asunto </p>";
    $textomail .= "<p>Nombre : $nombre </p>";
    $textomail .= "<p>email : $email </p>";
    $textomail .= "<p>Mensaje</p>";
    $textomail .= "<p>$mensaje</p>";
    $textomail .= $mailEnvioPie;
    $asunto = 'recepcion de formulario página contacto';
    //echo $textomail;
    echo "<div class='alert alert-info'>Gracias $nombre, hemos recibido su mensaje, en breve nos pondremos en contacto con usted a tarvés del correo $email</div> ";

    include('includes/PHPMailer.php');
  } else { ?>
    <div class="sign section--bg" data-bg="img/section/section.jpg">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="sign__content">

              <form name="formlogin" action="" method="POST" class="sign__form">
                <a href="index.php" class="sign__logo">
                  <img src="img/logo2.png" alt="">
                </a>
                <h2 class="text-primary">Contactanos</h2>
                <h3 class="mb-4">Contáctanos sin compromiso</h3>
                <div class="sign__group">
                  <label for="name">Tu Nombre</label>
                  <input type="text" class="sign__input" name="nombre" id="nombre" placeholder="Tu Nombre">
                </div>
                <div class="sign__group">
                  <label for="name">Tu Email</label>
                  <input type="text" class="sign__input" name="email" id="email" placeholder="Tu Email">
                </div>
                <div class="sign__group">
                  <label for="name">Asunto</label>
                  <input type="text" class="sign__input" name="asunto" id="asunto" placeholder="Asunto..">
                </div>

                <div class="form-group fer">
                  <label class="col-sm-3 control-label">Mensaje</label>
                  <div class="col-sm-9">
                    <textarea name="mensaje" id="message" class="form-control" style="height: 200px; width:400px" placeholder="Dejanos tu consulta"></textarea>
                  </div>

                  <button class="sign__btn" type="submit">Enviar Mensaje</button>

                </div>
              </form>
            </div>
          </div>
          <!--     <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
            <div class="position-relative h-100">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d18728.684905698297!2d-1.9765021781178382!3d43.312164511445545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1663937046084!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div> -->
        </div>
      </div>
    </div>

    <!-- Contact End -->
  <?php } ?>

</body>

<!-- Footer Start -->
<?php include("includes/footer.php"); ?>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>