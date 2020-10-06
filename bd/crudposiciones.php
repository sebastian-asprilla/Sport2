<?php
include_once '../bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$equipo = (isset($_POST['equipo'])) ? $_POST['equipo'] : '';
$pj = (isset($_POST['pj'])) ? $_POST['pj'] : '';
$p_ganados = (isset($_POST['p_ganados'])) ? $_POST['p_ganados'] : '';
$p_empates = (isset($_POST['p_empates'])) ? $_POST['p_empates'] : '';
$p_perdidos = (isset($_POST['p_perdidos'])) ? $_POST['p_perdidos'] : '';
$gf = (isset($_POST['gf'])) ? $_POST['gf'] : '';
$gc = (isset($_POST['gc'])) ? $_POST['gc'] : '';
$gd = (isset($_POST['gd'])) ? $_POST['gd'] : '';
$pts = (isset($_POST['pts'])) ? $_POST['pts'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_posiciones = (isset($_POST['id_posiciones'])) ? $_POST['id_posiciones'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO posiciones (equipo, pj, p_ganados, p_empates, p_perdidos, gf, gc, gd, pts) VALUES('$equipo', '$pj', '$p_ganados', '$p_empates', '$p_perdidos', '$gf', '$gc', '$gd', '$pts') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_posiciones, equipo, pj, p_ganados, p_empates, p_perdidos, gf, gc, gd, pts FROM posiciones ORDER BY id_posiciones DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE posiciones SET equipo='$equipo', pj='$pj', p_ganados='$p_ganados', p_empates='$p_empates', p_perdidos='$p_perdidos', gf='$gf', gc='$gc', gd='$gd', pts='$pts' WHERE id='$id_posiciones' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_posiciones, equipo, pj, p_ganados, p_empates, p_perdidos, gf, gc, gd, pts FROM posiciones WHERE id_posiciones='$id_posiciones' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM posiciones WHERE id_posiciones='$id_posiciones' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
