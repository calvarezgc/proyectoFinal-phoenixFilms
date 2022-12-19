 <!-- expected premiere -->
 <section class="section section--bg" data-bg="img/section/section.jpg">
   <div class="container">
     <div class="row">
       <!-- section title -->
       <div class="col-12">
         <h2 class="section__title">PROXIMAMENTE</h2>
       </div>
       <!-- end section title -->
       <?php

        include("admin/inc_conexion_peliculas.php");
        /*  $query = "SELECT * FROM peliculas  WHERE estado = 'D'"; */
        //Mostrar por fecha de estreno 6 peliculas ordenadas de forma ascendente (primero la más proxima y ultima la más lejana) las peliculas con el estado Desactivado
        $query = "SELECT * FROM peliculas WHERE estado = 'D' ORDER BY estreno ASC LIMIT 6";
        $resultado = mysqli_query($conn, $query);


        if (mysqli_num_rows($resultado) != 0) {
          while ($fila = mysqli_fetch_array($resultado)) {  ?>
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

                 <!--            <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span> -->


                 <!-- fin favoritos -->

               </div>
             </div>
           </div>
           <!-- end card -->
       <?php }
        }
        ?>

       <!-- section btn -->
       <!--     <div class="col-12">
         <a href="#" class="section__btn">Mostrar Más</a>
       </div> -->
       <!-- end section btn -->
     </div>
   </div>
 </section>
 <!-- end expected premiere -->