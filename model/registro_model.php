
<?php 
 @session_start();
 include('conexion_model.php');


 class uso{

    function registro(){ //Insertando datos a la formulario de login 

        try {
         
            $nombres=$_POST['Nombres'];
            $apellidos=$_POST['Apellidos'];
            $cedula=$_POST['Cedula'];
            $ficha=$_POST['Ficha'];
            $correo=$_POST['Correo'];
            $contraseña=$_POST['Contraseña'];
            $contraseña = MD5($contraseña);

            $object = new conexion();
            $conexion = $object->conectar();


               $sql = "INSERT INTO aprendiz1 (nombres,Apellidos,cedula,Ficha,usuario,contraseña) VALUES ('$nombres', '$apellidos','$cedula','$ficha','$correo','$contraseña')";
                  
    
            mysqli_query($conexion,$sql);
           
        } catch(Exception $ex){
            return $ex;
        }
    }
    function ingreso(){ //Validando los datos de correo y usuario 

        try {
         
            $correo=$_POST['Correo'];
            $contraseña=$_POST['Contraseña'];
            $contraseña = MD5($contraseña);
           

            $object = new Conexion();
            $conexion = $object->Conectar();


               $sql2 = "SELECT * FROM aprendiz1 WHERE usuario='$correo' and contraseña='$contraseña'";
               $resultado=mysqli_query($conexion,$sql2);
               $_SESSION['usuario']=$resultado;
               $resultado1=mysqli_fetch_row($resultado);
               if($resultado1==true){
                
                header('Location:../index2.php'); 

               }
               if($resultado1==false){

                header('Location:../LOGIN.html');
                   return;}

               } catch(Exception $ex){
                   return $ex;
               }
              
                  
    }
}
      
 $object = new uso();
 
 if(!empty($_POST['Nombres'])){
 $object->registro();
 header('Location:../LOGIN.html');
 }elseif(empty($_POST['contraseña'])){
 $object->ingreso();
  
 }
 


?>