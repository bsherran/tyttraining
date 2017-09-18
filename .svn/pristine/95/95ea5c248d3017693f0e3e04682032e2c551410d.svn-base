<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?a=index"> <img alt="Brand" width="32" src="<?php echo $config->get("assets") ?>logoSena.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--id="bs-example-navbar-collapse-1"-->
        <div class="collapse navbar-collapse" >
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultar <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?a=viewGestAprendiz">Consultar Aprendices</a></li>
                        <li><a href="?a=viewGestPrograma">Consultar Programas</a></li>
                        <li><a href="?a=viewGestFichas">Consultar Fichas</a></li>
                    </ul>
                </li>                
                <li class="dropdown">
                    <a href="?c=Area&a=listar">Gestionar Pruebas</a>
                </li>    
                <li class="dropdown">
                     <li><a href="?c=Informes&a=listar">Reportes</a></li>
                    <ul class="dropdown-menu">
                       
<!--                        <li><a href="?a=RegistrarAdmin">Estadisticas</a></li>                        -->
                    </ul>
                </li>
                <li class="dropdown">
                        <li><a href="?a=RegistrarSupAdmin">Registrar</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
                        <?php echo ProxyAdmin::getAuth()->perNombre . " " . ProxyAdmin::getAuth()->perApellido ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?a=editarPerfil"><i class="fa fa-user" aria-hidden="true"></i> Ver perfil</a></li>
                        <li><a href="?a=sesionClose"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>