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
                            Editar area
                        </div>
                        <div class="panel-body">
                            <form id="frmCrear" action="?c=Nivel&a=editar" method="POST" enctype="multipart/form-data" id="frmGuardar" class="col-md-8">
                                <!--<form id="frmCrear" action="?c=CategoriaProducto&a=editar" method="post" >-->

                                <input type="hidden" name="areId" class="form-control" value="<?php echo $entity->areId ?>">
                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text" name="nivNombre" class="form-control"  value="<?php echo $entity->getnivNombre() ?>">
                                    <input type="hidden" required="" value="<?php echo $entity->getNivId() ?>" name="nivId" id="nivId"/>
                                </div>

                                <div class="form-group">
                                    <label>Image:</label>
                                    <input type="file" name="nivImagen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success">Guardar</button>
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