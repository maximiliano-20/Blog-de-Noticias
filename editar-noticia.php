<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
 <?php session_start(); ?>
 <?php require_once 'config/conexion.php'; ?>
  <?php  require_once 'funciones/funcion.php'; ?>
    <?php  require_once 'includes/redireccion.php'; ?>
  <?php  require_once 'includes/menu.php'; ?>


   <?php 
$noticia_actual=verNoticias($conexion,$_GET['id']);?>
 <?php if (!isset($noticia_actual['id'])): 




    ?>


    <?php header('location:index.php'); ?>




 <?php endif ?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                  <h2 class="text-white">Editar Noticia</h2>
                </div>
                <div class="login-form">
            

    
                               
                    <form action="actualizar-noticias.php?editar=<?=$noticia_actual['id']?>" method="POST">

                       
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" class="form-control"  name="titulo" value="<?=$noticia_actual['titulo']?>">
                        </div>
                         <!-- Mostramos los errores de validacion -->  
                     <?php echo isset($_SESSION['error-entrada']) ? mostrarErrores($_SESSION['error-entrada'],'titulo'):'';  ?>
             <!-- Mostramos los errores de validacion -->  
                            <div class="form-group">
                                <label>Contenido</label>
                               <textarea class="form-control" name="contenido"><?=$noticia_actual['contenido']?></textarea>
                            </div>
                         <!-- Mostramos los errores de validacion -->  
            <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'contenido'):'';  ?>
             <!-- Mostramos los errores de validacion -->  
                                <div class="form-group">
                                 <label>Categoria</label>
                     <select name="categoria" class="form-control">
                       <?php 
                $categorias = Categorias($conexion); 
               
                while($categoria = mysqli_fetch_assoc($categorias)): 
            ?>
            <option value="<?=$categoria['id']?>" <?=($categoria['id'])==$noticia_actual['categoria_id'] ? 'selected="selected"':'' ?>>
                   
                    <?=$categoria['categoria']?>

                </option>
            <?php
                endwhile;
              
            ?>
             </select>   
                                 
            </div>
               <!-- Mostramos los errores de validacion -->  
            <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'categoria'):'';  ?>
             <!-- Mostramos los errores de validacion -->            
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Editar</button>         
                    </form>
                      <!-- Borramos los errores de validacion --> 
             <?php echo borrar();  ?>
              <!-- Borramos los errores de validacion --> 
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
