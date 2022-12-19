<?php include "admin/inc_config.php"; ?>
<?php include "includes/config.php"; ?>
<?php include "admin/inc_conexion_peliculas.php"; ?>
<?php

$msg = "";

if (isset($_GET['reset'])) {
  if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM usuarios WHERE code='{$_GET['reset']}'")) > 0) {
    if (isset($_POST['submit'])) {
      $password = ($_POST['password']);
      $confirm_password = ($_POST['password2']);

      if ($password === $confirm_password) {
        $query = mysqli_query($conn, "UPDATE usuarios SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

        if ($query) {
          header("Location: signin.php");
          /*  echo "<div>'alert alert-success'>Contraseña actualizada</div>";
          echo " <span class='sign__text'><a href='signin.php'>Inicia sesión</a></span>"; */
        }
      } else {
        echo "<div class='alert alert-danger'>Las contraseñas no coinciden</div>";
      }
    }
  } else {
    echo "<div class='alert alert-danger'>El enlace de restablecimiento no coincide.</div>";
  }
} else {
  header("Location: forgot-password.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<!-- Inicio de head -->

<head>
  <?php include 'includes/head.php'; ?>
  <?php include("admin/inc_config.php");
  $headTitle .= "Formulario de cambiar contraseña";
  $headDescription .= "Formulario cambiar la contraseña";
  $headKeywords .= "formulario, cambiar, contraseña, change, password";
  ?>
  <style>
    .alert-info {
      color: #ff55a5;
      margin-top: 100px;
      /* padding: 0px; */
    }

    .alert {
      padding: 1rem;
      border-radius: 5px;
      color: white;
      margin-top: 100px;
    }

    .alert-success {
      color: greenyellow;
      margin-top: 100px;
    }

    .alert.alert-danger {
      color: #fc5555;
      margin-top: 100px;
    }
  </style>
</head>
<!-- Fin de head -->

<body>
  <!-- form start -->
  <div class="sign section--bg" data-bg="img/section/section.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="sign__content">
            <form action="" method="post" class="sign__form">
              <a href="index.php" class="sign__logo">
                <img src="img/logo.png" alt="">
              </a>
              <h2 style="color:white">Cambiar contraseña</h2>
              <?php echo $msg; ?>
              <div class="sign__group">
                <input type="password" class="password sign__input" name="password" placeholder="Enter Your Password" required>
              </div>
              <div class="sign__group">
                <input type="password" class="password2 sign__input" name="password2" placeholder="Enter Your Confirm Password" required>
              </div>
              <button name="submit" class="sign__btn" type="submit">Cambiar contraseña</button>
              <span class="sign__text"><a href="signin.php">Inicia sesión</a></span>
            </form>
            <!-- //form -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>