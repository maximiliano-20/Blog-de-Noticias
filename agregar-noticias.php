<?php 

session_start();

require_once 'config/conexion.php';



if (isset($_POST)) {
	
	$titulo=isset($_POST['titulo']) ? $_POST['titulo'] : false;
	$contenido=isset($_POST['contenido']) ? $_POST['contenido'] : false;
	$categoria=isset($_POST['categoria']) ? $_POST['categoria'] : false;
	$usuario=$_SESSION['usuario']['id'];

	$errores=array();


	if (!empty($titulo)) {
		# code...
	}else{

		$errores['titulo']='<pre class="text-danger">El Titulo Esta Vacio</pre>
';
	}



	if (!empty($contenido)) {
		# code...
	}else {

		$errores['contenido']='<pre class="text-danger">El Contenido Esta Vacio</pre>
';
	}


	if (!empty($categoria)) {
		# code...
	}else {

        $errores['categoria']='<pre class="text-danger">No Haz Seleccionado Una Categoria</pre>
';
	}

    
    if (count($errores)==0) {
    
	   $sql="INSERT INTO noticias VALUES (null,'$titulo','$contenido',$categoria,$usuario,CURDATE())";

	  $noticias=$conexion->query($sql);


	  if ($noticias) {
	  	  

	  	  $_SESSION['completado']='La Noticia Ha Sido Agregada';
	  	   header('Location:index.php');



	  }else {


	  	$_SESSION['errores']['general']='Fallo al Agregar la Noticia';
	  	     header('Location:crear-noticias.php');


	  }

   
    

    

    }else {

    	$_SESSION['errores']=$errores;
    	 header('Location:crear-noticias.php');


    }





   

}












 ?>