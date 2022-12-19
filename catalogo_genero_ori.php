<?php include "includes/session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php include('includes/head.php'); ?>

  <style>
    .nav-tabs {
      align-content: center;
      flex-wrap: wrap;
      cursor: pointer;
    }
  </style>
</head>


<body class="body">

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

  <!-- content -->
  <section class="content">
    <div class="content__head">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <!-- content title -->
            <h2 class="content__title">Géneros</h2>
            <!-- end content title -->
            <?php
            include("admin/inc_conexion_peliculas.php");
            include("includes/genero.php");
            $estado = "";
            echo '<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">';
            foreach ($generosT as $key => $valor) {
              echo '<li class="nav-item"><a class="nav-link" style="color:white" role="tab" data-toggle="tab"  data-genero="' . $key . '" onClick="peliculasFiltarGenero(' . $key . ')">
                    <i class="fas fa-search fa-sm"></i>' . $valor . '(' . $key . ')
                </a></li>';
              // echo '<a href="" class="btn btn-primary rounded-pill py-3 px-5  slideInLeft">Read More</a>';

            }
            echo '</ul>';
            $query = "SELECT * FROM peliculas $estado";
            /* //echo $query = "select * from peliculas,peli_genero
                          where peliculas.id = peli_genero.peliculaid and
                            peliculas.estado = 'A' and 
                            (peli_genero.generoid = 28 or peli_genero.generoid = 12 )";
                  */

            $resultado = mysqli_query($conn, $query); ?>


          </div>
        </div>
      </div>
    </div>


    </div>
    </div>
    </div>
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
          //destinguir en caso de que no exista la pelicula para el identificador seleccionado
          if (mysqli_num_rows($resultado) != 0) {

            while ($fila = mysqli_fetch_array($resultado)) {
          ?>
              <!-- card -->
              <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <?php // OBTENCION DE GENEROS DE UNA PELI 
                $query2 = "SELECT * FROM peli_genero WHERE peliculaid = " . $fila['id'];
                $resultado2 =  mysqli_query($conn, $query2);
                $clasesGenero = '';
                $textoGenero = '';
                while ($fila2 = mysqli_fetch_assoc($resultado2)) {
                  $clasesGenero .= 'genero-' . $fila2['generoid'] . ' ';
                  $textoGenero .= $generosT[$fila2['generoid']] . ' ';
                }
                $clasesGenero;
                ?>
                <article id="<?php echo $fila['id']; ?>" class="<?php echo $clasesGenero; ?>">
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
                        <p style="color:white">Géneros : <?php echo $textoGenero; ?></p>
                      </span>
                      <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                    </div>
                  </div>
              </div>
              <!-- end card -->
          <?php }
          } else {
            echo '<p>No existe la pelicula para el identificador seleccionado</p>';
          }
          ?>
          <!-- card -->
          <!--  <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
              <div class="card">
                <div class="card__cover">
                  <img src="img/covers/cover3.jpg" alt="">
                  <a href="#" class="card__play">
                    <i class="icon ion-ios-play"></i>
                  </a>
                </div>
                <div class="card__content">
                  <h3 class="card__title"><a href="#">Benched</a></h3>
                  <span class="card__category">
                    <a href="#">Comedy</a>
                  </span>
                  <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                </div>
              </div>
            </div> -->
          <!-- end card -->

        </div>
      </div>
    </section>
    <!-- paginator -->
    <div class="col-12">
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
    </div>
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


    <script>
      function peliculasFiltarGenero(genero) {
        miclase = '.genero-' + genero
        //console.log(''+ document.querySelectorAll('article'));
        articulos = document.querySelectorAll('article');
        for (i = 0; i < articulos.length; i++) {
          articulos[i].style.display = "none";
        }
        articulosver = document.querySelectorAll(miclase);
        for (i = 0; i < articulosver.length; i++) {
          articulosver[i].style.display = "block";
        }
      }
    </script>

</body>

</html>