<?php
 @session_start();
 if(!isset($_SESSION['usuario'])){
     header('Location:index.html');
 }
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id_posiciones, equipo, pj, p_ganados, p_empates, p_perdidos, gf, gc, gd, pts FROM posiciones";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posiciones</title>
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
                <a href="index2.php">Inicio</a>
                <a href="Partidos.php">Partidos</a>
                <a href="Goleadores.php">Goleadores</a>
                <a href="salir.php">Cerrar sesión</a>

            </nav>
        </div>
    </header>

    <div class="container">
        <div class="roow">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nueva Posicion</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="roow">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPosiciones" class="table table-striped table-bordered table-coodended" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>id</th>
                                <th>Equipo</th>
                                <th>PJ</th>
                                <th>PG</th>
                                <th>PE</th>
                                <th>P</th>
                                <th>GF</th>
                                <th>GC</th>
                                <th>GD</th>
                                <th>Pts</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['id_posiciones'] ?></td>
                                    <td><?php echo $dat['equipo'] ?></td>
                                    <td><?php echo $dat['pj'] ?></td>
                                    <td><?php echo $dat['p_ganados'] ?></td>
                                    <td><?php echo $dat['p_empates'] ?></td>
                                    <td><?php echo $dat['p_perdidos'] ?></td>
                                    <td><?php echo $dat['gf'] ?></td>
                                    <td><?php echo $dat['gc'] ?></td>
                                    <td><?php echo $dat['gd'] ?></td>
                                    <td><?php echo $dat['pts'] ?></td>
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


    <!--Modal para CRUD de TABLA DE POSICIONES-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  id="formPosiciones">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="equipo" class="col-form-label">Equipo:</label>
                            <input type="text" class="form-control" id="equipo">
                        </div>
                        <div class="form-group">
                            <label for="pj" class="col-form-label">PJ:</label>
                            <input type="number" class="form-control" id="pj">
                        </div>
                        <div class="form-group">
                            <label for="p_ganados" class="col-form-label">PG:</label>
                            <input type="number" class="form-control" id="p_ganados">
                        </div>
                        <div class="form-group">
                            <label for="p_empates" class="col-form-label">PE:</label>
                            <input type="number" class="form-control" id="p_empates">
                        </div>
                        <div class="form-group">
                            <label for="p_perdidos" class="col-form-label">P:</label>
                            <input type="number" class="form-control" id="p_perdidos">
                        </div>
                        <div class="form-group">
                            <label for="gf" class="col-form-label">GF:</label>
                            <input type="number" class="form-control" id="gf">
                        </div>
                        <div class="form-group">
                            <label for="gc" class="col-form-label">GC:</label>
                            <input type="number" class="form-control" id="gc">
                        </div>
                        <div class="form-group">
                            <label for="gd" class="col-form-label">GD:</label>
                            <input type="number" class="form-control" id="gd">
                        </div>
                        <div class="form-group">
                            <label for="pts" class="col-form-label">Pts:</label>
                            <input type="number" class="form-control" id="pts">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar Nueva Posicion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="posicion.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
</body>


</html>