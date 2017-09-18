<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
<!--        <script src="<?php echo $config->get("js") ?>admin/gestionarFicha.js"></script>-->
    </head>
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "admin/menu.php" ?>
            <section class="container">
                <div class="row">
                    <div class="col col-md-6 formularioRegistro">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Insertar nueva leccion en el nivel <b><?php echo $nivel->getNivNombre() ?></b>
                            </div>
                            <div class="panel-body">
                                <form action="?c=Leccion&a=insert" method="POST" enctype="multipart/form-data" id="frmGuardar" class="col-md-8">
                                    <br/><br/>
                                    <input type="hidden" name="nivId" class="form-control" value="<?php echo $nivel->getNivId() ?>">
                                    <div class="form-group registrar">
                                        <label>Nombre:</label>
                                        <input type="text" required="required" name="lecNombre" class="form-control input-lab">
                                    </div>
                                     <div class="form-group registrar">
                                        <label>Image:</label>
                                        <input type="file" required="required" name="lecImagen" class="form-control input-ima">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success reg">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>