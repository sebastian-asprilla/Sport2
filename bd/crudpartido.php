<?php
include_once '../bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$equipos = (isset($_POST['equipos'])) ? $_POST['equipos'] : '';
$lugar = (isset($_POST['lugar'])) ? $_POST['lugar'] : '';
$hora = (isset($_POST['hora'])) ? $_POST['hora'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO partidos1 (equipos, lugar, hora) VALUES('$equipos', '$lugar', '$hora') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, equipos, lugar, hora FROM partidos1 ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
<<<<<<< HEAD
        $consulta = "UPDATE partidos1 SET equipos='$equipos', lugar='$lugar',  hora='$hora' WHERE id='$id' ";		
=======
        $consulta = "UPDATE partidos1 SET equipos='$equipos', lugar='$lugar', hora='$hora' WHERE id='$id' ";		
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, equipos, lugar, hora FROM partidos1 WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM partidos1 WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
