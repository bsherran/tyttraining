<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
        
    </head>
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "aprendiz/menu.php" ?>            
            <div>
                <section class="container">

                    <?php
                    foreach ($data as $a) {
                        $a instanceof Area;
                        ?>      
                        <div class="row">
                            <div class="col col-md-6 formularioRegistro">
                                <div class="panel panel-primary caja-texto">
                                    <div class="panel-body">
                                        <table class="table table-bordered table-hover table-striped">
                                            <tr>
                                                <td  width="200" class="text-center">
                                                    <h2><a href="?c=Informes&a=listar&idArea=<?php echo $a->getAreId() ?>" ><?php echo $a->getAreNombre() ?> </a></h2>
                                                    <img src="<?php echo "{$config->get('assets')}/areas/{$a->getAreImagen()}" ?>" width="100px"/><br>                                                    
                                                </td>                                            
                                                <td width="400" class="texto">
                                                    <h4>Cnt Niveles : <b><?php echo $a->getCantidadNiveles() ?></b></h4>
                                                    <h4>Cnt Lecciones :<b><?php echo $a->getCantidadLecciones() ?></b></h4>
                                                    <h4>Cnt Preguntas : <b><?php echo $a->getCantidadPreguntas() ?></b></h4>
                                                    <h4>Cnt Preguntas Realizadas : <b><?php echo $a->getCantidadRespuestas() ?></b></h4>
                                                </td>
                                                <td>
                                                    <img src="?c=Informes&a=getGraphByIdArea&resuelto=<?php echo $a->getCantidadRespuestas() ?>&total=<?php echo $a->getCantidadPreguntas() ?>&area=<?php echo $a->getAreNombre() ?>" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <?php
                    }
                    ?> 

                </section>
            </div>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>

