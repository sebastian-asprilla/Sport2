<?php
require 'model/Recu_model.php';
 if(isset($_POST['enviar'])){
  $recuperacion=new Recu_model();
  $array=[]; 
  $token=uniqid();
  array_push($array,$token,$_POST['Correo']);
  $recuperacion->Main(0,$array);

 }


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperación de contraseña</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/recuperacion.css">
</head>

<body>
    </div>
    <form class="login"  method="POST">
        <h2>Ingrese su dirección de correo electronico para restablecer la contraseña</h2>
        <input class="controls" type="email" name="Correo" id="Correo" placeholder="Ingrese su correo electronico" required>
        <button type="submit" name="enviar">Continuar</button>

    </form>
</body>

</html> 