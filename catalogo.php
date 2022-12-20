<!DOCTYPE html>
<html lang="es">

<!-- Inicio de head -->

<head>
  <?php include('includes/head.php'); ?>
  <?php include("admin/inc_config.php");
  $headTitle .= "Catalogo";
  $headDescription .= "Muestro el catalogo de las películas activas";
  $headKeywords .= "generos, catalogo, pelicula, activas";
  ?>

  <style>
    /* Estilo CSS para las estrellas */
    .estrellas {
      text-shadow: 0 0 1px #F48F0A;
      cursor: pointer;
    }

    .estrella_dorada {
      color: gold;
    }

    .estrella_normal {
      color: black;
    }
  </style>

  <!-- Incluir jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- Definir la función de puntuación -->
  <script type="text/javascript">
    function ratestar($id, $puntuacion) {
      $.ajax({
        type: 'GET',
        url: 'votaciones.php',
        data: 'votarElemento=' + $id + '&puntuacion=' + $puntuacion,
        success: function(data) {
          alert(data);
          location.reload();
        }
      });
    }
  </script>
</head>
<!-- Fin de head -->

<body class="body">

  <?php
  // Incluir la clase Votacion desde el fichero votaciones.php
  include './votaciones.php';

  // Activar un objeto de trabajo
  $V = new Votacion();
  ?>

  <!-- header -->
  <header>
    <?php include('includes/header.php'); ?>
  </header>
  <!-- end header -->

  <!-- page title -->
  <section class="section section--first section--bg" data-bg="img/section/section.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section__wrap">
            <!-- section title -->
            <h2 class="section__title">Catálogo</h2>
            <!-- end section title -->

            <!-- breadcrumb -->
            <ul class="breadcrumb">
              <li class="breadcrumb__item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb__item breadcrumb__item--active">Catálogo</li>
            </ul>
            <!-- end breadcrumb -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end page title -->
  <!-- end catalog -->

  <!-- expected premiere -->
  <section class="catalog" data-bg="img/section/section.jpg">
    <div class="container">
      <div class="row">
        <!-- section title -->

        <div class="col-12">
          <h2 class="section__title"></h2>
        </div>
        <!-- end section title -->
        <?php
        include("admin/inc_conexion_peliculas.php");
        //Muestro todas las peliculas con el estado Activo
        $query = "SELECT * FROM peliculas  WHERE estado = 'A'";
        $resultado = mysqli_query($conn, $query);
        //destinguir en caso de que no exista la pelicula para el identificador seleccionado
        if (mysqli_num_rows($resultado) != 0) {

          while ($fila = mysqli_fetch_array($resultado)) {
        ?>
            <!-- card -->
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
              <div class="card">
                <div class="card__cover">
                  <img src="https://image.tmdb.org/t/p/w154/<?php echo $fila["poster"] ?>" alt="">
                  <a href="pelicula_detalle.php?id=<?php echo $fila['id']; ?>" class="card__play">
                    <i class="icon ion-ios-play"></i>
                  </a>
                </div>
                <div class="card__content">
                  <h3 class="card__title"><a href="#"><?php echo $fila['titulo']; ?></a></h3>
                  <span class="card__category">
                    <?php
                    $query2 = "SELECT genero.genero AS generopeli FROM genero,peli_genero WHERE peli_genero.peliculaid = " .  $fila['id'] . " AND peli_genero.generoid =genero.id";
                    $resultado2 = mysqli_query($conn, $query2);
                    while ($fila2 = mysqli_fetch_array($resultado2)) {
                      echo '<a>' . $fila2['generopeli'] . '</a>';
                    }
                    ?>
                  </span>
                  <!--  <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span> -->

                  <p> <?php echo $V->mostrar_estrellitas_para($fila['id']); ?></p>

                  <!-- favoritos -->

                  <!-- fin favoritos -->
                </div>
              </div>
            </div>
            <!-- end card -->
        <?php }
        } else {
          echo '<p>No existe la pelicula para el identificador seleccionado</p>';
        }
        ?>
      </div>
    </div>
  </section>
  <!-- paginator -->
  <!--  <div class="col-12">
    <ul class="paginator">
      <li class="paginator__item paginator__item--prev">
        <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
      </li>
      <li class="paginator__item paginator__item--active"><a href="#">1</a></li>
      <li class="paginator__item"><a href="#">2</a></li>
      <li class="paginator__item"><a href="#">3</a></li>
      <li class="paginator__item"><a href="#">4</a></li>
      <li class="paginator__item paginator__item--next">
        <a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
      </li>
    </ul>
  </div> -->
  <!-- end paginator -->
  <!-- end expected catalog -->


  <!-- footer -->
  <footer>
    <?php include('includes/footer.php'); ?>
  </footer>
  <!-- end footer -->

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