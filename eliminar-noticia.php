<?php 


session_start();

require_once 'config/conexion.php';



//Compruebo si el usuario esta identificado y si el id por GET existe

if (isset($_SESSION['usuario']) && isset($_GET['id'])) {
    
    //Creo una Variable pasada por GET
    $noticia_actual=$_GET['id'];
     //Creo una Variable pasada de la SESSION
    $usuario_id=$_SESSION['usuario']['id'];

   $sql="DELETE FROM noticias WHERE usuario_id=$usuario_id AND id=$noticia_actual";

   $borra=$conexion->query($sql);



   if ($borra) { 

   	$_SESSION['eliminar']='Se Elimino Correctamente la Noticia';
   	

   }




}



//Redirigo al index
header('location:index.php');

 ?>