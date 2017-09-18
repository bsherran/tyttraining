<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
     <meta charset="utf-8"/>
    <?php require_once $config->get("template") . "public/meta_header.php" ?>

    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "public/menu.php" ?>
            <div class="panel_principal">
                <section class="container">
                    <div class="col-md-5 col-md-offset-3">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Consultar identificacíon</h3>
                            </div>
                            <div class="panel-body">
                                <div class="alert" id="alertConsulta" role="alert">
                                </div>
                                <form action="?" method="POST">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                                        <input type="number" id="txtIdentificacion" name="aprendiz[perIdentificacion]" min="1" class="form-control" placeholder="Identificacion" aria-describedby="sizing-addon3">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="btnBuscarAprendiz">Buscar</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>    
            <?php require_once $config->get("template") . "public/footer.php" ?>
            <script src="<?php echo $config->get("js") ?>public/consultarIdentificacion.js"></script>
            <?php require_once $config->get("template") . "public/modalLogin.php" ?>
        </main>
    </body>
</html>