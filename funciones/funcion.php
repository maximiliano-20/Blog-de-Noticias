<?php 


///Funcion para mostrar los errores de validacion
function mostrarErrores($errores,$campo){
 
 $alerta='';

 if (!empty($errores[$campo]) &&  isset($campo) ) {

 	$alerta=$errores[$campo];
 }

 return $alerta;

}
///Funcion para mostrar los errores de validacion



///Funcion para borrar los errores de validacion

function borrar(){

	$borrado = false;
	
	if(isset($_SESSION['errores'])){
		$_SESSION['errores'] = null;
		$borrado = true;
	}

	$borrado = false;
	
	if(isset($_SESSION['completado'])){
		$_SESSION['completado'] = null;
		$borrado = true;
	}

	return $borrado;
}

///Funcion para borrar los errores de validacion


///Funcion para mostrar las categorias



function Categorias($con){
	$sql = "SELECT * FROM categorias ORDER BY id ASC;";
	$categorias = mysqli_query($con, $sql);
	
	$resultado=array();


	if ($categorias && mysqli_num_rows($categorias)>=1) {
	   
	   $resultado=$categorias;
	}

	return $resultado;
}
///Funcion para mostrar las categorias


///Funcion para mostrar una  sola categoria 

function Categoria($con,$id){
	$sql = "SELECT * FROM categorias WHERE id=$id;";
	$categorias = mysqli_query($con, $sql);
	
	$resultado=array();


	if ($categorias && mysqli_num_rows($categorias)>=1) {
	   
	   $resultado=mysqli_fetch_array($categorias);
	}

	return $resultado;
}

///Funcion para mostrar una  sola categoria 




///Funcion para mostrar una  sola noticia

function verNoticias($datos,$id){

	$sql="SELECT noticias.*, categorias.categoria, usuarios.nombre  FROM noticias 

	INNER JOIN categorias ON noticias.categoria_id=categorias.id
    INNER JOIN usuarios ON noticias.usuario_id=usuarios.id

	WHERE noticias.id=$id";

	$mostrar=mysqli_query($datos,$sql);

	$resultado=array();

	if ($mostrar && mysqli_num_rows($mostrar)>=1) {
		
		$resultado=mysqli_fetch_array($mostrar);
	}


	return $resultado;



}

///Funcion para mostrar una  sola noticia







///Funcion para mostrar todas las noticias

function Noticias($datos){
	 $sql="SELECT noticias.*, categorias.categoria  FROM noticias
    
    INNER JOIN categorias ON noticias.categoria_id = categorias.id 
    INNER JOIN usuarios ON noticias.usuario_id = usuarios.id LIMIT 4 ";

    $mostrar=$datos->query($sql);
	
	$resultado=array();


	if ($mostrar && mysqli_num_rows($mostrar)>=1) {
	   
	   $resultado=$mostrar;
	}

	return $resultado;
}
///Funcion para mostrar todas las noticias



function Noticia($datos,$categorias){
	$sql="SELECT noticias.titulo,noticias.contenido,noticias.fecha, categorias.categoria  FROM noticias  
INNER JOIN categorias ON noticias.categoria_id = categorias.id
WHERE noticias.categoria_id = $categorias";




     $mostrar=$datos->query($sql);
	
	$resultado=array();


	if ($mostrar && mysqli_num_rows($mostrar)>=1) {
	   
	   $resultado=$mostrar;
	}

	return $resultado;
	
	
	
	
}














 ?>