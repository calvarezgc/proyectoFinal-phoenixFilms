   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
       <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-laugh-wink"></i>
       </div>
       <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
       <a class="nav-link" href="index.php">
         <i class="fas fa-fw fa-tachometer-alt"></i>
         <span>Dashboard</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
       Interface
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
         <i class="fas fa-fw fa-cog"></i>
         <span>Pelis</span>
       </a>
       <div id="collapseTwo" class="collapse <?php if ($menugrupo == 'pelis') {
                                                echo 'show';
                                              } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Película:</h6>
           <a class="collapse-item  <?php if ($menuenlace == 'peliculas') {
                                      echo 'active';
                                    } ?>" href="peliculas.php">Listado de películas</a>
           <a class="collapse-item <?php if ($menuenlace == 'peliculasA') {
                                      echo 'active';
                                    } ?>" href="peliculas.php?estado=A">Películas Activas</a>
           <a class="collapse-item <?php if ($menuenlace == 'peliculasD') {
                                      echo 'active';
                                    } ?>" href="peliculas.php?estado=D">Películas Desactivadas</a>
           <a class="collapse-item" href="peliculas_buscador.php?search=">Buscar Películas</a>
         </div>
       </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
         <i class="fas fa-fw fa-wrench"></i>
         <span>Usuarios</span>
       </a>
       <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Usuarios :</h6>
           <a class="collapse-item <?php if ($menuenlace == 'usuarios') {
                                      echo 'active';
                                    } ?>" href="usuarios.php">Usuarios</a>
           <!--        <a class="collapse-item" href="conexiones.php">Conexiones</a> -->
         </div>
       </div>
     </li>

     <!-- Divider -->

     <hr class="sidebar-divider">


     <!-- Heading -->
     <div class="sidebar-heading">
       Addons
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item active">
       <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
         <i class="fas fa-fw fa-folder"></i>
         <span>Páginas</span>
       </a>
       <div id="collapsePages" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Pantallas Login:</h6>
           <a class="collapse-item" href="login.php">Iniciar Sesión</a>
           <a class="collapse-item" href="register.php">Registro</a>
           <a class="collapse-item" href="forgot-password.html">Olvidé Contraseña</a>
           <div class="collapse-divider"></div>
           <!--      <h6 class="collapse-header">Otras Páginas:</h6>
           <a class="collapse-item" href="404.html"> Página 404</a>
           <a class="collapse-item active" href="blank.html">Página en Blanco</a> -->
         </div>
       </div>
     </li>

     <!-- Nav Item - Charts -->
     <!--   <li class="nav-item">
       <a class="nav-link" href="charts.html">
         <i class="fas fa-fw fa-chart-area"></i>
         <span>Charts</span></a>
     </li>
 -->
     <!-- Nav Item - Tables -->
     <!--      <li class="nav-item">
       <a class="nav-link" href="tables.html">
         <i class="fas fa-fw fa-table"></i>
         <span>Tablas</span></a>
     </li> -->

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
       <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

   </ul>