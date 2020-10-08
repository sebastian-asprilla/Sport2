<<<<<<< HEAD

<?php 
 @session_start();
 include('conexion_model.php');


 class uso{

    function registro(){ //Insertando datos a la formulario de login 
=======
<?php 
 include('conexion_model.php');

 class uso{

    function registro(){
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145

        try {
         
            $nombres=$_POST['Nombres'];
            $apellidos=$_POST['Apellidos'];
            $cedula=$_POST['Cedula'];
            $ficha=$_POST['Ficha'];
            $correo=$_POST['Correo'];
            $contraseña=$_POST['Contraseña'];
<<<<<<< HEAD
            $contraseña = MD5($contraseña);
=======
           
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145

            $object = new conexion();
            $conexion = $object->conectar();


               $sql = "INSERT INTO aprendiz1 (nombres,Apellidos,cedula,Ficha,usuario,contraseña) VALUES ('$nombres', '$apellidos','$cedula','$ficha','$correo','$contraseña')";
<<<<<<< HEAD
=======
               
                  
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
                  
    
            mysqli_query($conexion,$sql);
           
<<<<<<< HEAD
=======
            
         

>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
        } catch(Exception $ex){
            return $ex;
        }
    }
<<<<<<< HEAD
    function ingreso(){ //Validando los datos de correo y usuario 
=======
    function ingreso(){
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145

        try {
         
            $correo=$_POST['Correo'];
            $contraseña=$_POST['Contraseña'];
<<<<<<< HEAD
            $contraseña = MD5($contraseña);
=======
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
           

            $object = new Conexion();
            $conexion = $object->Conectar();


               $sql2 = "SELECT * FROM aprendiz1 WHERE usuario='$correo' and contraseña='$contraseña'";
               $resultado=mysqli_query($conexion,$sql2);
<<<<<<< HEAD
               $_SESSION['usuario']=$resultado;
               $resultado1=mysqli_fetch_row($resultado);
               if($resultado1==true){
                
                header('Location:../index2.php'); 
=======
               $resultado1=mysqli_fetch_row($resultado);
               if($resultado1==true){
                
                header('Location:../index2.html');
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145

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
<<<<<<< HEAD
  
=======
 
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
 }
 


<<<<<<< HEAD
?>
=======
?>
>>>>>>> 5f606f1ff6e0523d33164979a7df64e8a464a145
