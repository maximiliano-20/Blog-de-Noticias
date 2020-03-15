 <!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->


 

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
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <?php session_start(); ?>
 <?php require_once 'config/conexion.php'; ?>
<?php  require_once 'funciones/funcion.php'; ?>
 <?php  require_once 'includes/menu.php'; ?>
 
     
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php 

$categoria_actual=Categoria($conexion,$_GET['id']);?>
 <?php if (!isset($categoria_actual['id'])): ?>
 <div class="alert alert-danger">No Existe La Categoria que Buscas</div>
 <?php endif ?>
 
   <div class="breadcrumbs">
            <div class="col-md-10">
              <?php
      $mostrar=Noticia($conexion,$_GET['id']);

      if (!empty($mostrar)) :
       while ( $fila = mysqli_fetch_array($mostrar)) :
        ?>

                <div class="page-header float-left">
                    <div class="page-title">
                        <h3 class="mb-3">Categoria de <?=$categoria_actual['categoria']?> </h3>
                    </div>
                         <h2 class="mb-1"><?=$fila['titulo']?></h2>
    
                       <p> <?=$fila['contenido']?></p>
                         <p>Posteado el <?=$fila['fecha']?> <span class="badge badge-info"> <?=$fila['categoria']?></span></p>
                         
                            </div>
                            </div>

                            <?php

                            endwhile; 


                             else:



                             ?>

                                   </div>
                  <div class="alert alert-danger">

                    No Existe la Noticia
                    
                  </div> 
                  
                  <?php 

                             endif;

                           ?>       
       


            
    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
 
 

</body>
</html>

