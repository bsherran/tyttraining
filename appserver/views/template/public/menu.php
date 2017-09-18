<meta charset="utf-8"/>
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

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $class = @$_REQUEST["a"] === "index" ? 'class="active"' : '';
                ?>
                <li <?php echo $class ?> ><a href="?a=index"class="fa fa-home"> Inicio </a></li>
                <?php
                $class = @$_REQUEST["a"] === "viewQuienesSomos" ? 'class="active"' : '';
                ?>
                <li <?php echo $class ?> ><a href="?a=viewQuienesSomos" class="fa fa-users"> Quienes somos</a></li>
                <?php
                $class = @$_REQUEST["a"] === "viewConsultarIdentificacion" ? 'class="active"' : '';
                ?>
                <li <?php echo $class ?> ><a href="?a=viewConsultarIdentificacion" class="fa fa-address-card-o"> Consultar identificación</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#modalLogin">Iniciar sesión</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>