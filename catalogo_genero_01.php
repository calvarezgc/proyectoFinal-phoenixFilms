<?php include "includes/session.php"; ?>
<!DOCTYPE html>
<html lang="es">

<!-- Inicio de head -->

<head>
  <?php include('includes/head.php'); ?>
  <?php include("admin/inc_config.php");
  $headTitle .= "Catálogo por generos";
  $headDescription .= "Muestro el catálogo de las películas";
  $headKeywords .= "géneros, catálogo, película";
  ?>
  <style>
    .nav-tabs {
      align-content: center;
      flex-wrap: wrap;
      cursor: pointer;
    }

    @media (max-width: 576px) {
      .content__tabs {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;

      }

      .content__tabs li {
        margin-right: 30px;
      }

      .content__tabs li:last-child {
        margin-right: 0;
      }

      .content__tabs a {
        display: block;
        line-height: 50px;
        color: #fff;
        position: relative;
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 300;
        letter-spacing: 0.2px;
        color: rgba(255, 255, 255, 0.5);
      }

      .content__tabs a:hover {
        color: #fff;
      }

      .content__tabs a:before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        display: block;
        background-image: -moz-linear-gradient(90deg, #ff55a5 0%, #ff5860 100%);
        background-image: -webkit-linear-gradient(90deg, #ff55a5 0%, #ff5860 100%);
        background-image: -ms-linear-gradient(90deg, #ff55a5 0%, #ff5860 100%);
        background-image: linear-gradient(90deg, #ff55a5 0%, #ff5860 100%);
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-transition: 0.4s ease;
        -moz-transition: 0.4s ease;
        transition: 0.4s ease;
        -webkit-transform: translateY(2px);
        -moz-transform: translateY(2px);
        transform: translateY(2px);
      }

      .content__tabs a.active {
        color: #fff;
      }

      .content__tabs a.active:before {
        -webkit-transform: translateY(0);
        -moz-transform: translateY(0);
        transform: translateY(0);
        -webkit-box-shadow: 0 0 20px 0 rgba(255, 88, 96, 0.5);
        box-shadow: 0 0 20px 0 rgba(255, 88, 96, 0.5);
      }
    }

    .card {
      margin-right: 20px;
      width: 341px;
    }

    .card img {
      width: 341px;
      height: 500px;
    }



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

            //Generar la lista con los generos
            $estado = "";
            echo '<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">';
            foreach ($generosT as $key => $valor) {
              echo '<li class="nav-item"><a class="nav-link" style="color:white" role="tab" data-toggle="tab"  data-genero="' . $key . '" onClick="peliculasFiltarGenero(' . $key . ')">
                    <i class="fas fa-search fa-sm"></i>' . $valor . '(' . $key . ')
                </a></li>';
              // echo '<a href="" class="btn btn-primary rounded-pill py-3 px-5  slideInLeft">Read More</a>';

            }
            echo '</ul>';
            //$query = "SELECT * FROM peliculas $estado";
            $query = "SELECT * FROM peliculas where estado = 'A'";
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


          <?php if (mysqli_num_rows($resultado) != 0) {
            while ($fila = mysqli_fetch_array($resultado)) { ?>

              <?php
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
              <!-- card -->

              <article id="<?php echo $fila['id']; ?>" class="<?php echo $clasesGenero; ?>">


                <div class=" card">
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

                    <!--    <span class="card__rate"><i class="icon ion-ios-star">8.4</i></span> -->

                    <p> <?php echo $V->mostrar_estrellitas_para($fila['id']); ?></p>

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
                  </div>
                </div>
              </article>


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