<?php

/************************** */
/* fichero de configuracion */
/************************** */


/* definicion de variables genrales */

$sitioTitulo = 'Mi panel de control'; // Aparecera en la cebereca
$sitioRutaLocal = ''; // si la aplicación  no esta directamente colocado en la raiz de sitio.
$rutaImagenes = '/img/'; // carpeta donde guarderemos las imagenes 
$rutaImagenesPerfil = 'admin/img/perfil/'; // carpeta donde se guardan las fotos de perfil de los usuarios
$rutaLog = '/proyecto/admin/log/';
/* definicion de variables del head */
$headTitle = $sitioTitulo; // para cambiarlo añadir la variable en el fichero particular;
$headDescription = ''; // meta 
$headKeywords = ''; // meta description
$headAutor = 'Cristina Álvarez';
$pagina = $_SERVER['SCRIPT_NAME'];


/* conexion a base de datos */

// podriamos definirlo  aqui o usar otro include (inc_conexion.php);
