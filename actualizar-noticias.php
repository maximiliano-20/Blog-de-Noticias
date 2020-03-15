		<?php

		//Iniciamos la Sesion
		session_start();

		//Incluimos la Conexion
		include 'config/conexion.php';



		//Se Verifica si realmente existen los datos por POST

		if (isset($_POST)) {

		 $titulo=isset($_POST['titulo']) ? mysqli_real_escape_string($conexion,$_POST['titulo']):false;

		 $contenido=isset($_POST['contenido']) ?  mysqli_real_escape_string($conexion,$_POST['contenido']):false;

		 $categoria=isset($_POST['categoria']) ?  $_POST['categoria']:false;


		$usuario=$_SESSION['usuario']['id'];

		//Creamos un array de errores
		$errores=array();

		//Verificamos que los campos sean rellenados
		if (empty($titulo)) {
		   
		   $errores['titulo']='<pre class="text-danger">El Campo  Titulo Esta Vacio</pre>';
		}


		if (empty($contenido)) {
		   
		     $errores['contenido']='<pre class="text-danger">El Campo  Descripcion Esta Vacio</pre>';

		}


		if (empty($categoria)) {

			   $errores['categoria']='<pre class="text-danger">El Campo  Categoria Esta Vacio</pre>';

		   
		}
		//Verificamos que los campos sean rellenados

		//Verifica si no existe errores
		if (count($errores)==0) {
		//Si no hay errores se insertan los datos
				$noticia_id=$_GET['editar'];
				$usuario=$_SESSION['usuario']['id'];

				$sql="UPDATE noticias SET titulo='$titulo',contenido='$contenido', categoria_id=$categoria WHERE id=$noticia_id AND usuario_id=$usuario ";
		 	 $modificar=$conexion->query($sql);



		//Verifica si la modificacion fue Exitosa
			if ($modificar) {
		//Creamos una sesion para mostrar elmensaje
				$_SESSION['entrada-ok']='Se Ha Modificado La Noticia Correctamente';
		//Redirecciona si hubo exito
				header('location:index.php');
		//Si Hubo algun error		
			}else{
		//Creamos una sesion para mostrar el mensaje
				$_SESSION['error-entrada']='Fallo al Modificar La Noticia';
		//Redirecciona si hubo algun error		
				header('location:editar-noticia.php');
			
			}
		//Creamos una sesion para mostrar el mensaje
		}else{
		//Creamos una sesion para mostrar el mensaje
			$_SESSION['error-entrada']=$errores;
		//Redirecciona si hubo algun error		
			header('location:editar-noticia.php');

		}


		 } 



		 ?>