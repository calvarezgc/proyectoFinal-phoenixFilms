<!-- home -->
<section class="home">
  <!-- home bg -->
  <div class="owl-carousel home__bg">
    <div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
    <div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
    <div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
    <div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
  </div>
  <!-- end home bg -->

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="home__title"><b>NUESTRAS</b> PELICULAS</h1>

        <button class="home__nav home__nav--prev" type="button">
          <i class="icon ion-ios-arrow-round-back"></i>
        </button>
        <button class="home__nav home__nav--next" type="button">
          <i class="icon ion-ios-arrow-round-forward"></i>
        </button>
      </div>

      <div class="col-12">
        <div class="owl-carousel home__carousel">
          <?php

          include("admin/inc_conexion_peliculas.php");
          $query = "SELECT * FROM peliculas  WHERE estado = 'A'";
          $resultado = mysqli_query($conn, $query);


          if (mysqli_num_rows($resultado) != 0) {
            while ($fila = mysqli_fetch_array($resultado)) {  ?>

              <div class="item">

                <!-- 
              
            VER COMO HACER EL CARROUSEL CON BASE DE DATOS EN PHP 
          
          -->

                <!-- card -->
                <div class="card card--big">
                  <div class="card__cover">
                    <img src="https://image.tmdb.org/t/p/w154/<?php echo $fila["poster"] ?>" alt="">
                    <a href="pelicula_detalle.php?id=<?php echo $fila['id']; ?>" class="card__play">
                      <i class="icon ion-ios-play"></i>
                    </a>
                  </div>
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
                    <!--              <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span> -->
                  </div>
                </div>
                <!-- end card -->

              </div>
          <?php }
          } else {
            echo '<p>No existe la pelicula para el identificador seleccionado</p>';
          }
          ?>
          <!--  
          <div class="item">
            -->
          <!-- card -->
          <!-- 
      <div class="card card--big">
        <div class="card__cover">
          <img src="img/covers/cover2.jpg" alt="">
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
      </div> -->
          <!-- end card -->
          <!-- </div> -->

        </div>
      </div>
    </div>
  </div>
</section>
<!-- end home -->