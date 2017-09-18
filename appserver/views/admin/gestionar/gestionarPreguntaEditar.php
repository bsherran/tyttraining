<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
        <script src="<?php echo $config->get("js") ?>admin/gestionarPreguntaRegistrar.js"></script>
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
                                Editar Pregunta
                            </div>
                            <div class="panel-body">
                                <form action="?c=Pregunta&a=editar" method="POST" enctype="multipart/form-data" id="frmGuardar" class="col-md-8">    
                                    <br/>
                                    <input type="hidden" name="lecId" class="form-control" value="<?php echo $leccion->getLecId() ?>">                                                                        
                                    <div class="form-group registrar">
                                        <label>Nombre de la pregunta:</label>
                                        <input id="label-pre" required="required" type="text" name="preNombre" class="form-control" value="<?php echo $entity->getPreNombre() ?>"/>
                                    </div>
                                    <div class="data registrar">
                                        <label>Tipo de preguntas</label>
                                        <select class="form-control" required="required" id="select-pre" name="preTipoPregunta">
                                            <option value="">Seleccionar</option>
                                            <option value="Multiple">Seleccion multiple</option>                                            
                                            <option value="Unica">Seleccion unica</option>
                                            <option value="Logica">Verdadero o Falso</option>
                                        </select>
                                    </div>
                                                                       
                                    <br>
                                    <div class="registrar" id="contenedor-opciones">

                                    </div>
                                    <br/>
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