<?php 
 @session_start();
 if(!isset($_SESSION['usuario'])){
     header('Location:index.html');
 }
 ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sports</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/Torneo.css">
    <link rel="stylesheet" href="css/slider.css">
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <h1>Sports</h1>
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="Torneo2.php">Torneos</a>
                <a href="salir.php">Cerrar sesión</a>
               
            </nav>
        </div>
    </header>

    <main>
        <div class="slider"> 
          <ul>
              <li><img src="imagenes/micro.jpg" alt=""></li>
              <li><img src="imagenes/bas.jpg" alt=""></li>  
          </ul>
        </div>

        <section id="Bienvenidos">
    
            <h2>BIENVENDOS</h2>
            <p>El deporte es lo mejor para nuestro estado fisico.</p>
        </section>

        <section id="blog">
            <h3>Lo ultimo de mi pagina</h3>
            <div class="contenedor">
                <article>
                    <img src="imagenes/fondo.jpg">
                    <h4>Es lo mejor para nuestro estado fisico.</h4>
                </article>

            </div>


        </section>

        <section id="info">
            <h3>El deporte,la mejor creación</h3>
            <div class="contenedor">
                <div class="info-balon">
                    <img src="imagenes/balon1.jpg">
                    <h4>Fútbol Sala</h4>
                </div>
                <!-- <div class="info-balon">
                    <img src="imagenes/balon2.jpg">
                    <h4>Basquetbol</h4>
                </div> -->
            </div>
        </section>


    </main>
    <footer>
        <div class="contenedeor">
            <p class="copy">Sports &copy; 2019</p>
            <div class="sociales">
                <a class="icon-facebook-1" href="https://www.facebook.com/DiiLokitho"></a>
                <a class="icon-whatsapp" href="#"></a>
                <a class="icon-stripe" href="#"></a>

            </div>
        </div>


    </footer>
</body>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.5.1.min.js"></script>
   
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>