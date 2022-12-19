<!DOCTYPE html>
<html lang="es">
<?php
include("inc_conexion_peliculas.php");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  echo 'No hay nada que modificar';
  exit;
} ?>

<head>
  <?php include("inc_config.php"); ?>
  <?php include("inc_head.php"); ?>
  <link href="css/my_style2.css" rel="stylesheet">
</head>

<body class="body">
  <div class="sign section--bg" data-bg="img/section/section.jpg">
    <div class="container">
      <h3 class="title">EDITANDO PELICULA</h3>
      <div class="row2">
        <div class="col-12">
          <div class="sign__content">
            <div class="panel-body">
              <?php
              //VER ARCHIVO peliculas-editar-grabar.php para ver las consultas realizadas para actualizar/editar los campos

              $query = "SELECT * FROM peliculas WHERE id = $id";
              $resultado = mysqli_query($conn, $query);
              //print_r($resultado);
              if (mysqli_num_rows($resultado) != 0) {

                echo '<form name="form1" action="peliculas-editar-grabar.php" method="post" class="sign__form">';
                echo "
                <h2 class='h2'>Datos</h2>";
                while ($fila = mysqli_fetch_array($resultado)) {  ?>
                  <div class="imagenes">
                    <img src="https://image.tmdb.org/t/p/w154/<?php echo $fila["poster"] ?>" />
                  </div>
                  <div class="sign__group">
                    <label class="col-sm-3 control-label">ID</label>
                    <div class="col-sm-9">
                      <input type="text" name="id" id="id" class="sign__input" value="<?php echo $fila["id"]; ?>">
                    </div>
                  </div>
                  <!--  <div class="sign__group">
                    <label class="col-sm-3 control-label">TMDID</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="tmdbid" id="tmdbid" class="sign__input" value="<?php echo $fila["tmdb_id"]; ?>">
                    </div>
                  </div> -->
                  <div class="sign__group">
                    <label class="col-sm-3 control-label">Titulo</label>
                    <div class="col-sm-9">
                      <input type="text" name="titulo" id="titulo" class="sign__input" value="<?php echo $fila["titulo"]; ?>">
                    </div>
                  </div>
                  <div class="sign__group">
                    <label class="col-sm-3 control-label">Estreno</label>
                    <div class="col-sm-9">
                      <input type="date" name="estreno" id="estreno" class="sign__input" value="<?php echo $fila["estreno"]; ?>">
                    </div>
                  </div>
                  <div class="row2">
                    <br>
                    <!--Mostrar la imagen del poster!-->
                    <?php



                    $query2 = "SELECT *  FROM genero";
                    $resultado2 = mysqli_query($conn, $query2);
                    /*      echo "
                <h2 class='h2'>Generos</h2>"; */
                    while ($fila2 = mysqli_fetch_array($resultado2)) {
                    ?>


                      <?php
                      $generoid = $fila2['id'];
                      $genero = $fila2['genero'];

                      $query3 = "SELECT * FROM peli_genero WHERE peliculaid = $id AND generoid= $generoid";
                      $resultado3 = mysqli_query($conn, $query3);
                      $chequeado = "";

                      if (mysqli_num_rows($resultado3) > 0) {
                        $chequeado = "checked";
                      }
                      echo "<div class='container-genres'>";
                      echo $fila2['genero'] . ' ';
                      ?>
                      <input type="checkbox" name=genero[] value="<?php echo $generoid; ?>" <?php echo $chequeado ?>>
                      <?php
                      echo  ' <br> '; ?>
                    <?php

                      echo "</div>";
                    }
                    ?>
                  </div>

                  <h2 class='h2'>Estado</h2>
                  <div class="form-group cont">
                    <label>
                      <div class="col-sm-9 radios">
                        <div class="form-check  form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="estado" class="form-check form-check-inline" value="A" <?php if ($fila['estado'] == 'A') {
                                                                                                                echo 'CHECKED';
                                                                                                              } ?>>Activado
                          </label>
                        </div>


                        <div class="form-check  form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="estado" class="form-check form-check-inline" value="D" <?php if ($fila['estado'] == 'D') {
                                                                                                                echo 'CHECKED';
                                                                                                              } ?>>Desactivado
                          </label>
                        </div>

                        <div class="form-check  form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="estado" class="form-check form-check-inline" value="S" <?php if ($fila['estado'] == 'S') {
                                                                                                                echo 'CHECKED';
                                                                                                              } ?>>Suspendido
                          </label>
                        </div>
                      </div>
                    </label>
                  </div>


                  <div class="form-group fer">
                    <label class="col-sm-3 control-label">Overwiew</label>
                    <div class="col-sm-9">
                      <textarea name="overview" class="form-control" col="800"><?php echo $fila["overview"]; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group fer">
                    <label class="col-sm-3 control-label">Opinion</label>
                    <div class="col-sm-9">
                      <textarea name="opinion" class="form-control"><?php echo $fila["opinion"]; ?></textarea>
                    </div>
                  </div>

                <?php } // FIN WHILE 
                ?>
                <div class="text-right">
                  <button type="submit" name="submit" class="btn btn-lg btn-primary largo">Grabar</button>
                </div>

                </form>
              <?php
              } else { ?>

              <?php } ?>
              <?php mysqli_close($conn);
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>