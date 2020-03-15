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

</head>
 <?php  session_start(); ?>
 <?php require_once 'config/conexion.php' ?>
  <?php  require_once 'funciones/funcion.php'; ?>
  <?php require_once 'includes/menu.php'; ?>

<body>



        <div class="breadcrumbs">
            <div class="col-md-10">

                <div class="page-header float-left">
                    <div class="page-title">
                        <h2 class="mb-3">Noticias</h2>
                        <!-- Mostramos una Alerta de Sesion  -->    
                     <?php if (isset($_SESSION['entrada-ok'])): ?>
                     <div class=" alert alert-success text-center">
                     <?=$_SESSION['entrada-ok']?>
                     <?php unset($_SESSION['entrada-ok']) ?>
                     </div>
                     <?php endif ?>

                      <?php if (isset($_SESSION['eliminar'])): ?>
                     <div class=" alert alert-success text-center">
                     <?=$_SESSION['eliminar']?>
                     <?php unset($_SESSION['eliminar']) ?>
                     </div>
                     <?php endif ?>

                    </div>
                     <?php $mostrar=Noticias($conexion);
                        if (!empty($mostrar)):
                         while ($fila=mysqli_fetch_array($mostrar)) :
                        ?>
                         <h2 class="mb-1"><?=$fila['titulo']?></h2>
    
                       <p> <?=substr($fila['contenido'], 0,200)?></p>
                        


                        <a  href="ver-noticias.php?id=<?=$fila['id']?>" class="mb-2 btn btn-info">Ver Mas &rarr;</a>

                         <p>Posteado el <?=$fila['fecha']?> <span class="badge badge-info"> <?=$fila['categoria']?></span></p>
                            <?php 
                             endwhile;
                              endif;
                             ?>
                            </div>
                            </div>
                        </div>

       


            
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
