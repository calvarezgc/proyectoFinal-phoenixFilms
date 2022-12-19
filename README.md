# Phoenix-Films | Proyecto

## REQUERIMIENTOS

- PHP 7.4
- MySql
- Apache
- <a href="https://www.themoviedb.org">API</a> - Registrase y usar la <a href="https://www.themoviedb.org/settings/api"> APIKEY</a> que te suministran. <a href="developers.themoviedb.org">Documentación de la API</a>
- <a href="https://www.templateshub.net/template/FlixGo-Online-Movies-Template">Plantilla</a> de la parte pública.
- <a href="https://startbootstrap.com/theme/sb-admin-2">Plantilla</a> con Bootstrap de la parte privada.

## INSTALACIÓN

- Descargar <a href="https://www.wampserver.com">WAMP 64</a> si lo queremos usar como servidor web local.
- Clonar el repositorio o descargarlo como Zip.
- Crear la base de datos películas en MYSQL mediante el archivo peliculas.sql que se encuentra en la carpeta database
- Configurar los ficheros de configuración con los datos de la base de datos y de la apikey obtenida:
  - admin/inc_conexion_peliculas.php
  - peliculas.sql

## ESTRUCTURA DE CARPETAS

```bash

├───📁 admin/
│   ├───📁 css/
│   ├───📁 img/
│   │	    ├───📁 perfil/
│   ├───📁 js/
│   │	    ├───📁 demo/
│   ├───📁 log/
│   ├───📁 scss/
│   │	    ├───📁 nav/
│   │	    ├───📁 utilities/
│   ├───📁 vendor/
│   │	    ├───📁 bootstrap/
│   │	    │	 ├───📁 js/
│   │	    │	 ├───📁 scss/
│   │	    │	 	    ├───📁 mixins/
│   │	    │	 	    ├───📁 utilities/
│   │	    │	 	    ├───📁 vendor/
│   │	    ├───📁 chart.js/
│   │	    ├───📁 datatables/
│   │	    ├───📁 fontawesome-free/
│   │	    │	 	    ├───📁 css/
│   │	    │	 	    ├───📁 js/
│   │	    │	 	    ├───📁 less/
│   │	    │	 	    ├───📁 metadta/
│   │	    │	 	    ├───📁 scss/
│   │	    │	 	    ├───📁 sprites/
│   │	    │	 	    ├───📁 svgs/
│   │	    │	 	    │		├───📁 brands/
│   │	    │	 	    │		├───📁 regular/
│   │	    │	 	    │		├───📁 solid/
│   │	    │	 	    ├───📁 webfonts/
│   │	    ├───📁 jquery/
│   │	    ├───📁 jquery-easing/
├───📁 css/
├───📁 database/
├───📁 fonts/
├───📁 icon/
├───📁 img/
│   ├───📁 covers/
│   ├───📁 gallery/
│   ├───📁 home/
│   ├───📁 partners/
│   ├───📁 section/
├───📁 includes/
├───📁 js/
├───📁 vendor/
│   ├───📁 composer/
│   ├───📁 phpmailer/
│   │	    ├───📁 language/
│   │	    ├───📁 src/

```

## PARTE PUBLICA

![Image text](https://github.com/calvarezgc/phoenix-films/blob/master/github-images/portal.jpg)

## PARTE PRIVADA

![Image text](https://github.com/calvarezgc/phoenix-films/blob/master/github-images/panel.png)

## MANUAL DE USUARIO

<a href="https://docs.google.com/presentation/d/1yMh6n0nVfcDOUcVNjs2_uweQZORAdMYTOgqvXI7bWwY/edit?usp=sharing">Manual de usuario
</a>
