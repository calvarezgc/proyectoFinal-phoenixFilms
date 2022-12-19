<head>
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

<?php
// Incluir la clase Votacion desde el fichero votaciones.php
include './votaciones.php';

// Activar un objeto de trabajo
$V = new Votacion();
?>

<!-- content -->
<section class="content">
  <div class="content__head">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- content title -->
          <h2 class="content__title">Películas Activadas</h2>
          <!-- end content title -->

          <!-- content tabs nav -->
          <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">PELICULAS</a>
            </li>

            <!--              <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">PELICULAS</a>
             </li>

             <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">SERIES</a>
             </li>

             <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">DIBUJOS</a>
             </li> -->
          </ul>
          <!-- end content tabs nav -->

          <!-- content mobile tabs nav -->
          <div class="content__mobile-tabs" id="content__mobile-tabs">
            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <input type="button" value="Nuevos items">
              <span></span>
            </div>

            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">PELICULAS</a></li>

                <!--   <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">PELICULAS</a></li>

                 <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">SERIES</a></li>

                 <li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">DIBUJOS</a></li> -->
              </ul>
            </div>
          </div>
          <!-- end content mobile tabs nav -->
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <!-- content tabs -->
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
        <div class="row">
          <?php
          include("admin/inc_conexion_peliculas.php");
          //Mostrar todas las peliculas activas
          /*       $query = "SELECT * FROM peliculas  WHERE estado = 'A'"; */
          //Mostrar de más nueva a más antigua un maximo de 8 peliculas
          /*   $query ="SELECT * FROM peliculas  WHERE estado = 'A' LIMIT 8"; */
          //Mostrar de más antigua a más reciente un maximo de 8 peliculas
          $query =
            "SELECT * FROM peliculas WHERE estado = 'A' ORDER BY estreno ASC LIMIT 8";
          $resultado = mysqli_query($conn, $query);
          //print_r($resultado);
          if (mysqli_num_rows($resultado) != 0) {

            while ($fila = mysqli_fetch_array($resultado)) {  ?>
              <!-- card -->
              <div class="col-6 col-sm-12 col-lg-6">
                <div class="card card--list">
                  <div class="row">
                    <div class="col-12 col-sm-4">
                      <div class="card__cover">
                        <img src="https://image.tmdb.org/t/p/w154/<?php echo $fila["poster"] ?>" alt="">
                        <a href="pelicula_detalle.php?id=<?php echo $fila['id']; ?>" class="card__play">
                          <i class="icon ion-ios-play"></i>
                        </a>
                      </div>
                    </div>

                    <div class="col-12 col-sm-8">
                      <div class="card__content">
                        <h3 class="card__title"><a href="pelicula_detalle.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['titulo']; ?></a></h3>
                        <span class="card__category">
                          <a href="#">
                            <?php
                            $query2 = "SELECT genero.genero AS generop FROM genero,peli_genero WHERE peli_genero.peliculaid = " .  $fila['id'] . " AND peli_genero.generoid =genero.id";
                            $resultado2 = mysqli_query($conn, $query2);
                            while ($fila2 = mysqli_fetch_array($resultado2)) {
                              echo ($fila2['generop']) . ' ';
                            }
                            ?></a>
                        </span>

                        <div class="card__wrap">
                          <!--                   <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span> -->

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

                          <ul class="card__list">
                            <li>HD</li>
                            <li>16+</li>
                          </ul>
                        </div>

                        <div class="card__description">
                          <p><?php echo $fila['overview']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card -->
          <?php }
          } else {
            echo '<p>No hay ninguna pelicula</p>';
          }
          ?>

          <!-- card -->
          <!--    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
             <div class="card">
               <div class="card__cover">
                 <img src="img/covers/cover5.jpg" alt="">
                 <a href="#" class="card__play">
                   <i class="icon ion-ios-play"></i>
                 </a>
               </div>
               <div class="card__content">
                 <h3 class="card__title"><a href="#">Blindspotting</a></h3>
                 <span class="card__category">
                   <a href="#">Comedy</a>
                   <a href="#">Drama</a>
                 </span>
                 <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
               </div>
             </div>
           </div> -->
          <!-- end card -->
        </div>
      </div>
    </div>
    <!-- end content tabs -->
  </div>
</section>
<!-- end content -->