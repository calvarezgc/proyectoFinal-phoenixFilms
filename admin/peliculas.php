<?php include("inc_session.php"); ?>
<?php include("inc_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Head -->
  <?php include("inc_head.php");


  $headTitle .= "Peliculas";
  $headDescription .= "Muestro toda la lista de películas almacenadas en mi BD";
  $headKeywords .= "";
  $menugrupo = 'peliculas'; ?>
  <!-- End of Head -->

  <?php
  include("inc_logaccesos.php");
  $menugrupo = 'peliculas';
  if (isset($_GET['estado'])) {
    $valorestado = $_GET['estado'];
    $estado = " WHERE estado = '" . $_GET['estado'] . "'";
    switch ($valorestado) {
      case 'A':
        $menuenlace = 'peliculasA';
        $titulo = 'Lista de Peliculas Activas';
        break;
      case 'D':
        $menuenlace = 'peliculasD';
        $titulo = 'Lista de Peliculas Desactivadas';
        break;
      default:
        $menuenlace = 'peliculas';
        $titulo = 'Lista de todas las Peliculas ';
        $estado = '';
        break;
    }
  } else {
    $estado = '';
    $menuenlace = 'peliculas';
    $titulo = 'Lista de todas las peliculas';
  }
  ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("inc_sidebar.php"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include("inc_topbar.php"); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $titulo; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Descarga</a>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tmdb Id</th>
                  <th>Titulo</th>
                  <th>Cartel</th>
                  <th>Estreno</th>
                  <th>Generos</th>
                  <th>Activar</th>
                  <th>Editar</th>
                  <th>Borrar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Tmdb Id</th>
                  <th>Titulo</th>
                  <th>Cartel</th>
                  <th>Estreno</th>
                  <th>Generos</th>
                  <th>Activar</th>
                  <th>Editar</th>
                  <th>Borrar</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                include("inc_conexion_peliculas.php");
                $query = "SELECT * FROM peliculas $estado";
                $resultado = mysqli_query($conn, $query);
                //print_r($resultado);
                if (mysqli_num_rows($resultado) != 0) {

                  while ($fila = mysqli_fetch_array($resultado)) {  ?>
                    <tr id="pel_<?php echo $fila["id"] ?>">

                      <td><?php echo $fila["id"] ?> </td>
                      <td><?php echo $fila["tmdb_id"] ?></td>
                      <td><?php echo ($fila["titulo"]) ?></td>
                      <td>
                        <img src="https://image.tmdb.org/t/p/w154/<?php echo $fila["poster"] ?>" width="100px" />

                      </td>
                      <td><?php echo $fila["estreno"] ?></td>
                      <td>
                        <?php
                        $query2 = "SELECT genero.genero AS generopeli FROM genero,peli_genero WHERE peli_genero.peliculaid = " .  $fila['id'] . " AND peli_genero.generoid =genero.id";
                        $resultado2 = mysqli_query($conn, $query2);
                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                          echo ($fila2['generopeli']) . ' ';
                        }
                        ?>
                      </td>
                      <td>
                        <?php if ($fila['estado'] == 'A') {
                          echo '<a href="peliculas_genero_estado_02_AD.php?id=' . $fila['id'] . '&estado=D">Desactivar</a>';
                        } else {
                          echo '<a href="peliculas_genero_estado_02_AD.php?id=' . $fila['id'] . '&estado=A">Activar</a>';
                        }
                        ?>
                      </td>
                      <td>
                        <a href="peliculas_editar.php?id=<?php echo $fila['id']; ?>">Editar</a>
                      </td>
                      <td>
                        <a href="peliculas_borrar.php?id=<?php echo $fila['id']; ?>">Borrar</a>
                      </td>

                    </tr>
                <?php } // FIN WHILE 
                } else {
                  echo '<p>Actualmente no hay peliculas</p>';
                }
                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div> <!-- table responsive -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include("inc_footer.php"); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include("inc_modal_logout.php"); ?>
  <!-- End Logout Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>