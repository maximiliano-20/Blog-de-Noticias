






  <?php 
 session_start();
  include 'config/conexion.php';


 
   if(isset($_POST)){

    $email=mysqli_real_escape_string($conexion,$_POST['email']);

    $password=mysqli_real_escape_string($conexion,$_POST['password']);
  
 



      $consulta="SELECT * FROM usuarios WHERE email ='$email'";
      $login=$conexion->query($consulta);


      if ($login && mysqli_num_rows($login)==1) {
        $usuario=mysqli_fetch_array($login);

      $verificar=password_verify($password, $usuario['password']);



      if ($verificar) {

        $_SESSION['usuario']=$usuario;

        header('location:index.php');


        

      }else{

        $_SESSION['error-login']="Email o Password Incorrectos";
        // Redirigir al index.php
           header('Location: formu-login.php');
      }


         

      }else{
         
         $_SESSION['error-login']='Debes Rellenar Los Campos';
         // Redirigir al index.php
         header('Location: formu-login.php');
        
      }

      
          


  
}




   ?>