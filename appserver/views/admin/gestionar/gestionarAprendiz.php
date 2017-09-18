<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
        <script src="<?php echo $config->get("js") ?>admin/gestionarAprendiz.js"></script>
    </head>
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "admin/menu.php" ?>
            <section class="container">
                <div class="row">
                    <div class="col col-md-6 ">
                        <div class="panel panel-primary tablaAprendiz">
                            <div class="panel-heading">Buscar aprendiz</div>
                            <div class="panel-body">
                                <input type="text" class="form-control" id="txtBuscarAprendiz">                                    
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col col-md-6 ">
                        <div class="panel panel-primary tablaAprendiz">
                            <div class="panel-heading">Lista de aprendices</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover table-striped" id="tblAprendiz">
                                    <thead>
                                        <tr>
                                            <th>Identificación</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>