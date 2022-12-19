<!-- header -->


<header class="header">
  <div class="header__wrap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="header__content">
            <!-- header logo -->
            <a href="index.php" class="header__logo">
              <img src="img/logo2.png" alt="">
            </a>
            <!-- end header logo -->

            <!-- header nav -->
            <ul class="header__nav">

              <li class="header__nav-item">
                <a href="index.php" class="header__nav-link">Inicio</a>
              </li>
              <!-- dropdown -->
              <!-- <li class="header__nav-item">
                <a class="dropdown-toggle header__nav-link" href="index.php" role="button" id="dropdownMenuHome" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inicio</a> -->


              <!--
                  <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuHome">
                  <li><a href="index.html">Home slideshow bg</a></li>
                  <li><a href="index2.html">Home static bg</a></li>
                </ul> -->
              </li>
              <!-- end dropdown -->

              <li class="header__nav-item">
                <a href="catalogo.php" class="header__nav-link">Catálogo</a>
              </li>
              <!-- dropdown -->
              <!--  <li class="header__nav-item">
                <a class="dropdown-toggle header__nav-link" href="catalogo.php" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalogo</a> -->

              <!--        <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
                  <li><a href="catalog1.html">Catalog en Grid</a></li>
                  <li><a href="catalog2.html">Catalogo en Lista</a></li>
                  <li><a href="details1.html">Detalles Películas</a></li>
                  <li><a href="details2.html">Detalles Series TV</a></li>
                </ul> -->
              </li>
              <!-- end dropdown -->

              <li class="header__nav-item">
                <a href="catalogo_genero_01.php" class="header__nav-link">Catálogo Géneros</a>
              </li>

              <li class="header__nav-item">
                <a href="about.php" class="header__nav-link">Información</a>
              </li>


              <!-- dropdown -->
              <li class="dropdown header__nav-item">
                <a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

                <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
                  <li><a href="signin.php">Inicia Sesión</a></li>
                  <li><a href="signup.php">Registrate</a></li>
                  <li><a href="contacto.php">Contacto</a></li>
                  <li><a href="faq.php">Ayuda</a></li>
                  <li><a href="404.php">Pagina 404</a></li>
                </ul>
              </li>
              <!-- end dropdown -->
            </ul>
            <!-- end header nav -->

            <!-- header auth -->
            <div class="header__auth">
              <button class="header__search-btn" type="button">
                <i class="icon ion-ios-search"></i>
              </button>



              <?php
              session_id();
              if (isset($_SESSION['usuario'])) { ?>
                <a class="header__sign-in" href="usuario_modificacion.php?id=<?php echo $_SESSION['usuarioid']; ?> "><?php echo $_SESSION['nombre']; ?> <i class="fa fa-arrow-right ms-3"></i></a>
              <?php } else { ?>
                <a href="signin.php" class="header__sign-in">Inicia sesión<i class="fa icon ion-ios-log-in"></i></a>
              <?php } ?>



              <!--  <a href="signin.php" class="header__sign-in">
                <i class="icon ion-ios-log-in"></i>
                <span>Inicia Sesión</span>
              </a> -->
            </div>
            <!-- end header auth -->

            <!-- header menu btn -->
            <button class="header__btn" type="button">
              <span></span>
              <span></span>
              <span></span>
            </button>
            <!-- end header menu btn -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- header search -->
  <form action="#" class="header__search">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="header__search-content">
            <input type="text" placeholder="Search for a movie, TV Series that you are looking for">

            <button type="button">Buscar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- end header search -->
</header>
<!-- end header -->