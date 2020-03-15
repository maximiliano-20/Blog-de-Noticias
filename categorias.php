<?php 

include 'config/conexion.php';

session_start();




if (isset($_POST)) {

	$nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']):false;



	$errores=array();

	if (!empty($nombre)  &&  !is_numeric($nombre)) {
    	# code...
    }else{
    	$errores['nombre']='<pre class="text-danger">El Campo  Categoria Esta Vacio</pre>';
    }



   


    if (count($errores)==0) {
    	
    	$insertar="INSERT INTO categorias VALUES 
    	(null,'$nombre')";

    	$categorias=$conexion->query($insertar);



    	if ($categorias) {
    		
    		$_SESSION['categoria']='Categoria Añadida';

    	}else{

    		$_SESSION['error-categoria']='No se Añadio la Categoria';
    	}
    }else{

    		$_SESSION['errores']=$errores;
    }
	
}

header('location:crear-categoria.php');


 ?>