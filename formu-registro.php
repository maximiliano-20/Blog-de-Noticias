<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
 <?php require_once 'config/conexion.php'; ?>
  <?php  require_once 'funciones/funcion.php'; ?>
  <?php  require_once 'includes/menu.php'; ?>
  <?php  session_start(); ?>

  
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


    <div class="sufee-login d-flex align-content-center flex-wrap mb-3">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                  <h2 class="text-white mt-4">Registrate</h2>
                </div>
                <div class="login-form">
            <!-- Se Muestra un alerta de Exito de Usuario Registrado  -->
                     <?php if (isset($_SESSION['completado'])): ?>
                    <div class="alert alert-success text-center">
                    <?=$_SESSION['completado']?>
                    </div>  
                    <?php endif ?>
        <!-- Se Muestra un alerta de Exito de Usuario Registrado  -->

     <!-- Se Muestra un alerta de fallo si hubo algun error de registro -->  
                 <?php if (isset($_SESSION['errores']['general'])): ?>
                 <div class="alert alert-danger text-center">
                 <?=$_SESSION['errores']['general']?>
                 </div>  
                 <?php endif ?>
                  <!-- Se Muestra un alerta de fallo si hubo algun error de registro -->               
                    <form action="registro.php" method="POST">
                        <div class="form-group">
                            <label>Nombre de Usuario</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        </div>
                         <!-- Mostramos los errores de validacion -->  
                     <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'nombre'):'';  ?>
             <!-- Mostramos los errores de validacion -->  
                        <div class="form-group"> 
                        <label>Apellido del Usuario</label> 
                     <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                        </div>
                     <!-- Mostramos los errores de validacion -->  
                  <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'apellido'):'';  ?>
                     <!-- Mostramos los errores de validacion -->  
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                         <!-- Mostramos los errores de validacion -->  
                  <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'email'):'';  ?>
             <!-- Mostramos los errores de validacion -->  
                         <div class="form-group">
                        <label>Contraseña</label>
                      <input type="password" class="form-control" placeholder="Contraseña" name="password">
                        </div>
               <!-- Mostramos los errores de validacion -->  
            <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'password'):'';  ?>
             <!-- Mostramos los errores de validacion -->            
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Registrar</button>         
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
