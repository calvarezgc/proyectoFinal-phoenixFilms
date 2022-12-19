<?php include("admin/inc_session.php"); ?>
<?php include("admin/inc_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php include("includes/head.php");

  $headTitle .= " Detalles de la Pelicula";
  $headDescription .= "Muestro los detalles de la pelicula";
  $headKeywords .= "pagina, detalles, pelicula";

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

<body class="body">


  <?php
  // Incluir la clase Votacion desde el fichero votaciones.php
  include './votaciones.php';

  // Activar un objeto de trabajo
  $V = new Votacion();
  ?>

  <?php
  function limpiarVar($cadena)
  {
    return trim(addslashes(htmlentities($cadena)));
  } ?>
  <!-- header -->
  <header>
    <?php include("includes/header.php"); ?>
  </header>
  <!-- end header -->

  <!-- details -->
  <section class="section details">
    <!-- details background -->
    <div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
    <!-- end details background -->

    <!-- details content -->
    <div class="container">
      <div class="row">
        <?php
        //CONFIGURADO PARA QUE SOLO PUEDEN ACCEDER LAS PERSONAS REGISTRADAS/LOGUEADAS A LA PAGINA DETALLES
        include("admin/inc_conexion_peliculas.php");
        $estado = 'A';
        $id = limpiarVar($_GET['id']);
        $query = "SELECT * FROM peliculas  WHERE id =  " . $_GET['id']; //seleccionar de la tabla peliculas el id
        $resultado = mysqli_query($conn, $query);
        //destinguir en caso de que no exista la pelicula para el identificador seleccionado
        if (mysqli_num_rows($resultado) != 0) {

          while ($fila = mysqli_fetch_array($resultado)) {
            $tmdb_id = $fila['tmdb_id']; ?>
            <!-- title -->
            <div class="col-12">
              <h1 class="details__title"><?php echo $fila['titulo']; ?></h1>
            </div>
            <!-- end title -->

            <!-- content -->
            <div class="col-12 col-xl-6">
              <div class="card card--details">
                <div class="row">
                  <!-- card cover -->
                  <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
                    <div class="card__cover">
                      <img src="https://image.tmdb.org/t/p/w154/<?php echo $fila["poster"] ?>" alt="">
                    </div>
                  </div>
                  <!-- end card cover -->

                  <!-- card content -->
                  <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
                    <div class="card__content">
                      <div class="card__wrap">
                        <!--        <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span> -->
                        <p style="color:white">Valoración media: <?php echo $V->obtener_la_puntuacion_de($fila['id']); ?></p>


                        <!-- favoritos -->
                        <?php if (isset($_SESSION['rol'])) {
                          if ($_SESSION['rol'] == 'U' or $_SESSION['rol'] == 'A') {
                            // podemos hacer comentarios

                        ?>
                            <!--     <p> Escribe tu comentario</p>
                                        <textarea name="comentario"></textarea> -->

                            <p class="small fw-medium"> <?php echo $V->mostrar_estrellitas_para_usuario($fila['id'], $_SESSION['usuarioid']); ?></p>



                        <?php }
                        } ?>
                        <!-- fin favoritos -->

                        <ul class="card__list">
                          <li>HD</li>
                          <li>16+</li>
                        </ul>
                      </div>

                      <ul class="card__meta">
                        <li><span>Genero:</span> <?php
                                                  $query2 = "SELECT genero.genero AS generopeli FROM genero,peli_genero WHERE peli_genero.peliculaid = " .  $fila['id'] . " AND peli_genero.generoid =genero.id";
                                                  $resultado2 = mysqli_query($conn, $query2);
                                                  while ($fila2 = mysqli_fetch_array($resultado2)) {
                                                    echo '<a>' . $fila2['generopeli'] . '</a>';
                                                  }
                                                  ?>
                        </li>
                        <li><span>Estreno:</span><?php echo $fila['estreno']; ?></li>

                      </ul>

                      <div class="card__description card__description--details">
                        <?php echo $fila['overview']; ?>
                      </div>
                    </div>
                  </div>
                  <!-- end card content -->
                </div>
              </div>
            </div>
            <!-- end content -->
        <?php }
        } else {
          echo '<p>No existe la pelicula para el identificador seleccionado</p>';
        }
        ?>
        <!-- player -->
        <div class="col-12 col-xl-6">
          <div id="pelicula_detalle">


          </div>

        </div>
        <!-- end player -->

        <div class="col-12">
          <div class="details__wrap">
            <!-- availables -->
            <div class="details__devices">
              <span class="details__devices-title">Disponible en:</span>
              <ul class="details__devices-list">
                <li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
                <li><i class="icon ion-logo-android"></i><span>Android</span></li>
                <li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
                <li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
              </ul>
            </div>
            <!-- end availables -->

          </div>
        </div>
      </div>
    </div>
    <!-- end details content -->
  </section>
  <!-- end details -->


  <!-- footer -->
  <footer>
    <?php include 'includes/footer.php'; ?>
  </footer>
  <!-- end footer -->

  <!-- Root element of PhotoSwipe. Must have class pswp. -->
  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
		It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

      <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
      <!-- don't modify these 3 pswp__item elements, data is added later on. -->
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>

      <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
      <div class="pswp__ui pswp__ui--hidden">

        <div class="pswp__top-bar">

          <!--  Controls are self-explanatory. Order can be changed. -->

          <div class="pswp__counter"></div>

          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

          <!-- Preloader -->
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>

        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
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


  <!--   Template Javascript-->
  <script>
    const tmdbId = '<?php echo $tmdb_id; ?>';
    const apikey = '<?php echo $tmdb_apikey; ?>';
  </script>

  <script src="js/pelicula_detalle.js"></script>
</body>

</html>