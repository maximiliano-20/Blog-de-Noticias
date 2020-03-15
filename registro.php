<?php 


session_start();

include 'config/conexion.php';

if ($_POST) {
	$nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']):false;

  $apellido=isset($_POST['apellido']) ? mysqli_real_escape_string($conexion,$_POST['apellido']):false;

  $email=isset($_POST['email']) ? mysqli_real_escape_string($conexion,$_POST['email']):false;

  $password=isset($_POST['password']) ?  mysqli_real_escape_string($conexion,$_POST['password']):false;



    $errores=array();


    if (!empty($nombre)  &&  !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
    	# code...
    }else{
    	$errores['nombre']='<pre class="text-danger">El Campo Nombre no Es Valido o  Debe Esta Vacio</pre>';
    }


    if (!empty($apellido)  &&  !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {

    }else {

       $errores['apellido']='<pre class="text-danger">El Campo Apellido no Es Valido o  Debe Esta Vacio</pre>';

    }


   

    if (!empty($email) &&   filter_var($email,FILTER_VALIDATE_EMAIL)) {
    	# code...
    }else{

    	$errores['email']='<pre class="text-danger">El Campo Email No Es Valido o No Debe Estar Vacio</pre>';
    }



    if (!empty($password)) {
    	# code...
    }else{
    	$errores['password']='<pre class="text-danger">El Campo Contraseña No debe Estar Vacio</pre>';
    }



    if (count($errores)==0) {

      $password_segura=password_hash($password, PASSWORD_BCRYPT);


      $insertar_usuarios="INSERT INTO usuarios 

      VALUES (null,'$nombre','$apellido','$email','$password_segura')";

      $registro=$conexion->query($insertar_usuarios);





      if ($registro) {

      	$_SESSION['completado']='Usuario Insertado Correctamente';

      }else{

      	$_SESSION['errores']['general']='Fallo al Insertar el usuario';
      }


    	
    }else{

    	$_SESSION['errores']=$errores;

    	
    }


    

}


header('location:formu-registro.php');

 ?>