<?php

require_once "model/Recu_model.php";
$recu = new Recu_model();
$array = [];
array_push($array, $_GET['tokens']);
$result = $recu->Main(1, $array);

if ($result != null) {
    if (isset($_POST['recuperar'])) {
        $recu = new Recu_model();
        $array = [];
        array_push($array, $_POST['Contraseña'], $_GET['tokens'] );
        $recu->Main(2, $array);
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/recuperacion.css">
    <title>Cambiar contraseña</title>
</head>

<body>
    <form method="POST">
    <h1>Ingrese su nueva contraseña</h1>
        <label for="">Nueva contraseña</label>
        <input name="Contraseña" type="password"> <br>
        <label for="">Confirmar contraseña</label>
        <input type="password">
        <button name="recuperar" type="submit">Enviar</button>
    </form>

</body>

</html>

<?php
}else{
    echo "<script>
    alert('No existe un token');
    window.location='FormRecuperacion.php';
    </script>";
}

?>