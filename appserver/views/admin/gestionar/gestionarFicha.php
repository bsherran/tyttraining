<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
        <script src="<?php echo $config->get("js") ?>admin/gestionarFicha.js"></script>
    </head>
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "admin/menu.php" ?>
            <section class="container">
                <div class="row">                    
                    <div class="col col-md-6 tablaPersonas">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Buscar Ficha</div>
                            <div class="panel-body">
                                <input type="text" class="form-control" name="keyword" id="txtBuscarFicha"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 tablaPersonas">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Lista de aprendices</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover table-striped" id="tblFicha">
                                    <thead>
                                        <tr>
                                           <!--<th>id</th>-->
                                            <th>Codigo</th>
                                            <th>Programa</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <!--<th colspan="2">Opciones</th>-->
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



