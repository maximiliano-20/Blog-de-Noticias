
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">Blog</a>
                <a class="navbar-brand hidden" href=></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  

                  <?php if (isset($_SESSION['usuario'])): ?>
                      

                    <a class="menu-title" href="datos.php"><?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido']?></a><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>Acciones del Usuario</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="crear-noticias.php">Crear Noticias</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="crear-categoria.php">Crear Categorias</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="cerrar.php">Cerrar Sesion</a></li>
                           
                            
                        </ul>
                    </li>
                    <?php endif ?>

                    <?php if (!isset($_SESSION['usuario'])): ?>
                        
              
                        <h3 class="menu-title">Inicio de Sesion</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Desliza</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="formu-login.php">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="formu-registro.php">Registrase</a></li>
                        </ul>

                    <?php endif ?>
                 

                    <h3 class="menu-title">Categorias</h3><!-- /.menu-title -->
                             <?php
                        $categorias=Categorias($conexion);
                        if (!empty($categorias)) :
                while ( $categoria = mysqli_fetch_array($categorias)) :
                          ?> 
                      <li class="text-muted"><a href="ver-categorias.php?id=<?=$categoria['id']?>"><?=$categoria['categoria']?></li></a>
                        
                          <?php endwhile;
                             endif;
                           ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">                            
                     </div>

                   </header>
