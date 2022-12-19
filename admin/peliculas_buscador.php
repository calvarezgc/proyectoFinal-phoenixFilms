<?php include("inc_session.php"); ?>
<?php include("inc_config.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Head -->
  <?php include("inc_head.php"); ?>

  <?php
  $headTitle .= "Buscador de peliculas";
  $headDescription .= "Buscador para encontrar y agregar la pelicula que quieras a la BD";
  $headKeywords .= "buscador, pelicula, peliculas, buscar";
  $menugrupo = 'peliculas';
  $menuenlace = 'peliculas_buscar';
  include("inc_head.php");
  ?>
  <!-- End of Head -->

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
            <h1 class="h3 mb-0 text-gray-800">Buscar Peliculas</h1>

          </div>
          <?php include("inc_conexion_peliculas.php");
          $search = urlencode($_REQUEST['search']);
          if ($search != '') {
            $pagina = 1;
            if (isset($_REQUEST['pagina'])) {
              $pagina = $_REQUEST['pagina'];
            }
            $url = "https://api.themoviedb.org/3/search/movie?api_key=$tmdb_apikey&language=es&query=$search&page=1&include_adult=false";
            $resultado = file_get_contents($url);
            $items = json_decode($resultado, true);
            echo "<p>La busqueda ha terminado : $search</p>";
            $page = $items['page']; // resultado con la lista de peliculas encontradas  
            $pelis = $items['results']; // lista de peliculas
            $total_pages = $items['total_pages'];
            $total_results = $items['total_results'];

            if ($total_results > 0) {
              // calculo de pagina 
              $limiteI = ($page - 1) * 20 + 1;
              $limiteS = $page * 20;
              if ($limiteS > $total_results) {
                $limiteS = $total_results;
              }
              "<p><strong>Pagina : $page </strong> Mostrando resultados $limiteI a $limiteS </p> ";
              // paginacion 
              for ($i = 1; $i <= $total_pages; $i++) {
                $tab = $i - 1;
                if ($pagina == $i) {
                  $activo = 'activeA';
                  $activeP = "active";
                }
                "<li class='paginate_button page-item $activeP' >";
                "<a href='peliculas_buscador.php?search=$search&pagina=$i'  aria-controls='dataTable' data-dt-idx='$i' tabindex='$tab' class='page-link $activo' >Pagina $i</a>";
                '</li>';
              }

              //pagina anterior
              $pagAnt = $pagina - 1;
              $previousD = '';
              if ($pagina == 1) {
                $previousD = 'disabled';
                $pagAnt = 1;
              }
              '<li class="paginate_button page-item previous" id="dataTable_previous">
           <a href="peliculas_buscador.php?search=' . $search . '&pagina=' . $pagAnt . '" 
          aria-controls="dataTable"  
          data-dt-idx="0" 
          tabindex="0"
          class="page-link ' . $previousD . '">
          Anterior</a></li>';

              //pagina siguiente
              $pagSig = $pagina + 1;
              $nextD = '';
              if ($pagina == 1) {
                $nextD = 'disabled';
                $pagSig = 1;
              }
              '<li class="paginate_button page-item previous" id="dataTable_previous">
           <a href="peliculas_buscador.php?search=' . $search . '&pagina=' . $pagSig . '" 
          aria-controls="dataTable"  
          data-dt-idx="0" 
          tabindex="0"
          class="page-link ' . $nextD . '">
          Siguiente</a></li>';

              //fin de paginacion
          ?>


              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Estreno</th>
                      <th>Título</th>
                      <th>Grabar</th>
                      <th>Poster</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Estreno</th>
                      <th>Título</th>
                      <th>Grabar</th>
                      <th>Poster</th>
                    </tr>
                  </tfoot>
                  <tbody>
                <?php

                foreach ($pelis as $valor) {
                  $tmdbid = $valor['id'];
                  echo '<tr>';
                  echo '<td>' . $valor['id'] . '</td><td>' . $valor['release_date'] . '</td><td>' . $valor['original_title'] . '</td><td> <a href="peliculas_nueva_grabar.php?id=' . $tmdbid . '">Grabar</a></td><td>';
                  echo '<img src="' . $tmdb_ruta_poster . $valor['poster_path'] . '" width="40px">';
                  echo '</td>';
                  echo '</tr>';
                }
                echo '</tbody>
                        </table>';
              } else {
                var_dump($items);
                echo '<p>No hay resultados para esa busqueda</p>';
              }
            } else {
              echo '<p>Busqueda de elemento vacio</p>';
            }
            mysqli_close($conn); ?>
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


    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>