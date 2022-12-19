<?php include "includes/session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<?php include "admin/inc_funciones.php"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include "includes/head.php"; ?>
</head>

<body class="body">



  <div class="sign section--bg" data-bg="img/section/section.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="sign__content">
            <!-- registration form -->
            <?php include("admin/inc_conexion_peliculas.php");

            if (isset($_POST['nombre'])) {
              foreach ($_REQUEST as $key => $valor) {
                //echo "<P>$key => $valor </p>";
                $$key = limpiarVar($valor); // genera variables con nombre $key y el contenido $valor

              }
              // validar datos
              $nombre = $_REQUEST['nombre'];
              $apellidos = $_REQUEST['apellidos'];
              //
              $ahora = time();
              $query = "UPDATE usuarios SET nombre= '$nombre',apellidos='$apellidos',mail = '$mail',telefono= '$telefono',modified_at=$ahora WHERE id = $id";

              $resultado = mysqli_query($conn, $query);
              if ($resultado) {
                //si se ha actualizado con exito nos vuelve a la pagina indicada
                header("Location:index.php");
              } else {
                echo '<p>Fallo en la Modificion</p>';
              }
            } else {
              // entramos por get (mostrar el formulario)
              $id = $_REQUEST['id'];
              $query = "SELECT * FROM usuarios WHERE id = $id ";
              $resultado = mysqli_query($conn, $query);
              if (mysqli_num_rows($resultado) > 0) // ya haya un usuario con ese valor
              {
                $fila = mysqli_fetch_array($resultado);
                foreach ($fila as $key => $valor) {
                  $$key = $valor;
                }
            ?>
                <form action="" method="POST" class="sign__form">

                  <a href="index.php" class="sign__logo">
                    <img src="img/logo.png" alt="">
                  </a>
                  <h5 style="color:white">Modificar usuario</h5>
                  <!--         <div class="sign__group">
                  <input type="text" class="sign__input" id="usuario" name="usuario" placeholder="Tu Usuario">
                </div> -->

                  <div class="sign__group">
                    <input type="text" class="sign__input" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo $nombre; ?>">
                  </div>

                  <div class=" sign__group">
                    <input type="text" class="sign__input" id="apellidos" name="apellidos" placeholder="Tus Apellidos" value="<?php echo $apellidos; ?>">
                  </div>

                  <div class=" sign__group">
                    <input type="text" class="sign__input" id="mail" name="mail" placeholder="Tu Email" value="<?php echo $mail; ?>">
                  </div>

                  <!--   <div class="sign__group">
                    <input type="password" class="sign__input" id="password" name="password" placeholder="Contraseña">
                  </div>

                  <div class="sign__group">
                    <input type="password" class="sign__input" id="password2" name="password2" placeholder="Repite Contraseña">
                  </div>
 -->
                  <div class="sign__group">
                    <input type="text" class="sign__input" id="telefono" name="telefono" placeholder="Tu Telefono" value="<?php echo $telefono; ?>">
                  </div>

                  <input type="hidden" name="id" value="<?php echo $id; ?>">

                  <button class="sign__btn" type="submit">Actualizar</button>

                </form>

                <!-- registration form -->
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } else {
                echo "<p>Error id $id</p>";
              }
            }

            mysqli_close($conn);
?>

<? include 'includes/footer.php'; ?>
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