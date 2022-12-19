<!DOCTYPE html>
<html lang="es">

<head>
  <?php include('includes/head.php'); ?>
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
            <h2 class="section__title">Catalogo</h2>
            <!-- end section title -->

            <!-- breadcrumb -->
            <ul class="breadcrumb">
              <li class="breadcrumb__item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb__item breadcrumb__item--active">Catalogo</li>
            </ul>
            <!-- end breadcrumb -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end page title -->

  <!-- filter -->
  <!--  <div class="filter">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="filter__content">
            <div class="filter__items"> -->
  <!-- filter item -->
  <!--  <div class="filter__item" id="filter__genre">
                <span class="filter__item-label">GENRE:</span>

                <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <input type="button" value="Aventura">
                  <span></span>
                </div>

                <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
                     <li>Aventura</li>
                  <li>Fantasia</li>
                  <li>Animacion</li>
                  <li>Drama</li>
                  <li>Terror</li>
                  <li>Accion</li>
                  <li>Comedia</li>
                  <li>Historia</li>
                  <li>Western</li>
                  <li>Suspense</li>
                  <li>Crimen</li>
                  <li>Documental</li>
                  <li>Ciencia ficcion</li>
                  <li>Misterio</li>
                  <li>Musica</li>
                  <li>Romance</li>
                  <li>Familia</li>
                  <li>Belica</li>
                  <li>Pelicula TV</li>
                </ul>
              </div> -->
  <!-- end filter item -->

  <!-- filter item -->
  <!--   <div class="filter__item" id="filter__quality">
                <span class="filter__item-label">QUALITY:</span>

                <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-quality" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <input type="button" value="HD 1080">
                  <span></span>
                </div>

                <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-quality">
                  <li>HD 1080</li>
                  <li>HD 720</li>
                  <li>DVD</li>
                  <li>TS</li>
                </ul>
              </div> -->
  <!-- end filter item -->

  <!-- filter item -->
  <!--  <div class="filter__item" id="filter__rate">
    <span class="filter__item-label">IMBd:</span>

    <div class="filter__item-btn dropdown-toggle" role="button" id="filter-rate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="filter__range">
        <div id="filter__imbd-start"></div>
        <div id="filter__imbd-end"></div>
      </div>
      <span></span>
    </div>

    <div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-rate">
      <div id="filter__imbd"></div>
    </div>
  </div> -->
  <!-- end filter item -->

  <!-- filter item -->
  <!--  <div class="filter__item" id="filter__year">
    <span class="filter__item-label">RELEASE YEAR:</span>

    <div class="filter__item-btn dropdown-toggle" role="button" id="filter-year" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="filter__range">
        <div id="filter__years-start"></div>
        <div id="filter__years-end"></div>
      </div>
      <span></span>
    </div>

    <div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-year">
      <div id="filter__years"></div>
    </div>
  </div> -->
  <!-- end filter item -->
  <!-- </div> -->

  <!-- filter btn -->
  <!--  <button class="filter__btn" type="button">apply filter</button> -->
  <!-- end filter btn -->
  <!--  </div>
  </div>
  </div>
  </div>
  </div> -->
  <!-- end filter -->


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
</body>

</html>