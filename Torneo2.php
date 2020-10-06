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
    <title>Torneo</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="Torneo.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/torneo.css">
    <link rel="stylesheet" href="css/info.css">

</head>

<body>

    <body>
        <header>
            <div class="contenedor">
                <h1>Sports</h1>
                <input type="checkbox" id="menu-bar">
                <label class="icon-menu" for="menu-bar"></label>
                <nav class="menu">
                    <a href="index2.html">Inicio</a>
                    <a href="salir.php">Cerrar sesión</a>
                </nav>
            </div>
        </header>
        <main>
           <div class="balonimg"  >   <img src="imagenes/thumb-350-404604.jpg"></div>
        
            
            <section id="Bienvenidos">
                <h2> Bievenido Al Torneo Fútbol Sala</h2>
                <p>La creación de este deporte se remonta a Uruguay de los años 1930 y se lo conoce deportivamente como
                    FUTSAL
                    desde
                    1956. Este nombre se utilizó oficialmente en el Mundial de 1982 en España, organizado en ese
                    entonces por
                    FIFUSA
                    (Federación de Fútbol Sala), época en que la selección de Uruguay había ganado el campeonato del
                    mundo y la
                    medalla de oro en los Juegos Olímpicos, viviéndose en todo el país una auténtica locura por el
                    fútbol. El
                    fútbol
                    de salón nace de varios deportes: balonmano, baloncesto, waterpolo y fútbol.
                    En las calles de Montevideo, los niños jugaban al fútbol en campos de baloncesto, debido a la falta
                    de
                    campos
                    libres. Por ello, el profesor Juan Carlos Ceriani, profesor de la Asociación Cristiana de Jóvenes
                    (A.C.J.)
                    de
                    Montevideo, decidió plantear unas normas que adaptaran el deporte del fútbol a un espacio de
                    dimensiones
                    reducidas, habitualmente destinado a la práctica de otros deportes y de superficie dura. Se basó en
                    el
                    waterpolo, balonmano, y baloncesto para redactar las primeras reglas de un nuevo deporte. Algunas de
                    las que
                    se
                    adoptaron fueron: cinco jugadores en el campo (baloncesto), duración del partido de 40 minutos
                    (baloncesto),
                    aunque un partido de baloncesto dura una hora, un balón que rebotara poco, porterías pequeñas
                    (balonmano),
                    medidas del campo (balonmano) y reglamentación relacionada con los porteros (waterpolo).
                    Inicialmente se le llamó "fútbol de salón" y causó sensación en Uruguay, pasando posteriormente al
                    resto de
                    Sudamérica y de allí al mundo.
                    En 1965, se creó la Confederación Sudamericana de Fútbol de Salón, primera organización
                    internacional del
                    deporte. Ese año también se disputó el primer campeonato sudamericano de selecciones.
                    La Federación Internacional de Fútbol de Salón (FIFU SA), fue fundada en 1971 en Sao Paulo, Brasil.
                    Esta
                    organización realizó en 1982 el primer mundial del deporte, y posteriormente otros seis más. La
                    FIFUSA se
                    mantuvo como organización independiente hasta su disolución en el año 2002. </p>
            </section>

            <section id="info">

                <div class="contenedor">
                    <div class="info-pet">
                        <img src="imagenes/banner-futsala.png" alt="">
                        <h3>Fútbol Sala</h3>
                        <a href="Posiciones.php">Información del torneo </a>
                    </div>
                    <!-- <div class="info-balon">
                        <img src="imagenes/balon2.jpg">
                        <h4>Basquetbol</h4>
                    </div>
                </div> -->

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

        </div>
    </body>

</html>