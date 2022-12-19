<?php include "includes/session.php"; ?>
<?php include "admin/inc_funciones.php"; ?>

<?php
$id = 0;
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
}
$token  = '';
if (isset($_REQUEST['token'])) {
  $token = $_REQUEST['token'];
} ?>
<!DOCTYPE html>

<head>
  <?php include "includes/head.php"; ?>

  <style>
    p {
      color: white;
      text-align: center;
      padding: 203px;
      margin: 30px;
    }

    .enlace {
      color: violet;
      text-align: center;
      padding: 203px;
      margin: 30%;
    }
  </style>
</head>

<?php include "includes/header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <?php
      // Busca en la base de datos el id y el token para validar. 
      include("admin/inc_conexion_peliculas.php");
      $query = "SELECT * FROM usuarios WHERE id = $id and token = '$token' ";
      $resultado = mysqli_query($conn, $query);
      if (mysqli_num_rows($resultado) == 0) // No  hay usuario con ese valor
      {
        echo '<p>Error id y/o token</p>';
      } else {
        //modificamos el estado de pendiente a activo si se ha activado con exito la cuenta
        $query = "UPDATE  usuarios SET estado= 'A' where id = $id";
        $resultado = mysqli_query($conn, $query);
        if ($resultado) {
          echo ' 

      <p>Ya puedes acceder a tu cuenta</p>';
      ?>


          <a class="enlace" href="signin.php" class="sign__input">Accede</a>
      <?php
        } else {
          echo '<p>Fallo en la Modificacion</p>';
        }

        mysqli_close($conn);
      } ?>
    </div>
  </div>
</div>