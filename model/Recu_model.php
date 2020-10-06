<?php 
 require_once 'conexion_model.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require 'phpmailer/Exception.php';
 require 'phpmailer/PHPMailer.php';
 require 'phpmailer/SMTP.php';


class Recu_model{
    public function __construct()
    {
    }

    public function Main($option, $array = [])
    {

        $login = new Recu_model();
        switch ($option) {

            case 0:
                $result = $login->Send_token($array);
                break;

            case 1:
                $result = $login->Consult_token($array);
                break;
            case 2:
                $result = $login->Restartpass($array);
                break;
        }
        return $result;

    }
    public function Send_token($array){
        $object = new Conexion();
        $conexion = $object->Conectar();
        $sql = "SELECT usuario FROM aprendiz1 WHERE usuario= '$array[1]'";
        $result = $conexion->query($sql);
        $filas = $result->num_rows;

        if ($filas === 1) {

            $sql = "UPDATE aprendiz1 SET tokens=? WHERE usuario=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ss", $array[0], $array[1]);
            $stmt->execute();

            $mail = new PHPMailer(true);
            $window_restart = "<html><head>";
            $window_restart .= "<style type='text/css'>";
            $window_restart .= "
            .container-msg{
              width: 100%;
              background: #ccc;
              text-align: center;
            }
            .boton{
              margin: 20px auto;
              padding: 10px;
              border-radius: 8px;
              border-style: none;
              border: 1px solid gray;
              box-shadow: 2px 2px 4px 0 black;
              background: orange;
              cursor: pointer;
            }
            a{
              text-decoration: none;
              cursor: pointer;
              color: black;
            }
            a:hover > .boton{
              color: white;
              box-shadow: 1px 1px 2px 0 black;
            }
            ";
            $window_restart .= "</style></head><body>";
            $window_restart .= "
            <div class='container-msg'>
                <h1>Restablecer contraseña</h1>
                <p>Para restablecer su contraseña haga click en el siguiente boton: </p>

                <a href='http://localhost/Sport/recuperacion.php?tokens=" . $array[0] . "'><button class='boton'>Restablecer Contraseña</button></a>
              </div>
            ";
            $window_restart .= "</body></html>";


            //Configuración del servidor
            $mail->SMTPDebug = 0;                      // Habilitar la salida de depuración detallada
            $mail->isSMTP();                                            // Enviar usando SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host       = 'smtp.gmail.com';                    // Configure el servidor SMTP para enviar
            $mail->SMTPAuth   = true;                                   // Habilitar la autenticacion SMTP
            $mail->Username   = 'pruebacorreos6410@gmail.com';                     // Nombre de usuario SMTP
            $mail->Password   = 'Sebastian64';                               //Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('pruebacorreos6410@gmail.com', 'SPORT');
            $mail->addAddress($array[1]);     // Add a recipient

            // Contenido
            $mail->isHTML(true);                                  // Establecer el formato de correo electrónico en HTML
            $mail->Subject = 'Cambio de contraseña';
            $mail->Body    = $window_restart;

            if ($mail->send()) {
                echo "<script>alert('Se envió a su correo')</script>";
            } else {
                echo "<script>alert('No se pudo hacer el envio')</script>";
            }
        } else {
            echo "<script>alert('No se encontró el correo')</script>";
        }
    }

    
    public function Consult_token($array){

        $object = new Conexion();
        $conexion = $object->Conectar();
        $sql = "SELECT * FROM aprendiz1 WHERE tokens= ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $array[0]);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row();

    }
    public function Restartpass($array){
       
        $object = new Conexion();
        $conexion = $object->Conectar();
        $sql = "UPDATE aprendiz1 SET contraseña=MD5(?) WHERE tokens=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $array[0], $array[1]);

        if ($stmt->execute()) {
            $sql = "UPDATE aprendiz1 SET tokens=null WHERE tokens=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $array[1]);
            $stmt->execute();
            echo "<script>
            alert('Contraseña se cambió con exito');
            window.location='LOGIN.html';
            </script>";
        }
   

    }
}
?>
