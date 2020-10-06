 
 <?php
  
    class conexion
    {

        function conectar()
        {

            try {

                $bd = 'sport';
                $server = 'localhost';
                $user = 'root';
                $password = '';

                return mysqli_connect($server, $user, $password, $bd);
            } catch (Exception $ex) {
                return $ex;
            }
        }
    }
    ?>