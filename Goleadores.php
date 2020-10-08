<?php
<<<<<<< HEAD
 @session_start();
 if(!isset($_SESSION['usuario'])){
     header('Location:index.html');
 }
=======
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre,  goles FROM goleadores";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goleadores</title>
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/partidos.css">
    <link rel="shortcut icon" href="#">
    <!-- Bootstrap CSS -->
    <!--  <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- ---DataTables--- -->
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">



</head>

<body>
    <header>
        <div class="contenedor">
            <h1>Sports</h1>
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
<<<<<<< HEAD
                <a href="index2.php">Inicio</a>
                <a href="Posiciones.php">Tabla De Posiciones</a>
                <a href="Partidos.php">Partidos</a>
                <a href="salir.php">Cerrar sesión</a>
=======
                <a href="index.html">Inicio</a>
                <a href="tablas.html">Tabla De Posiciones</a>
                <a href="Partidos.php">Partidos</a>
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="roow">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo Goleador</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="roow">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaGoleadores" class="table table-striped table-bordered table-coodended" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Goles</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['id'] ?></td>
                                    <td><?php echo $dat['nombre'] ?></td>
                                    <td><?php echo $dat['goles'] ?></td>
                                    <td></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formGoleadores">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="goles" class="col-form-label">Goles:</label>
                            <input type="number" class="form-control" id="goles">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar Goleador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <!-- <script src="popper/popper.min.js"></script> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<<<<<<< HEAD
    <script type="text/javascript" src="goleadores.js"></script>
=======
    <script type="text/javascript" src="Goleadores.js"></script>
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
</body>


</html>