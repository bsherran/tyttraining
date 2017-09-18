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
                    <div class="col col-md-6 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Buscar Leccion</div>
                            <div class="panel-body">
                                <form action="?c=Leccion&a=listar&nivId=<?php echo $_REQUEST["nivId"] ?>" method="post">
                                    <div class="form-inline">
                                        <input type="text" name="termino" class="form-control" value="<?php echo @$_REQUEST["termino"] ?>" style="width: 92%;"/> 
                                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 tablaPersonas">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="form-group">
                                    <form action="?c=Leccion&a=registrar" method="POST" class="formListas">
                                        Lista de lecciones del <b><?php echo @$nivel->getNivNombre() ?></b></b>
                                        <?php
                                        if (isset($nivId)) {
                                            ?>
                                            <input type="hidden" name="nivId" id="nivId" value="<?php echo $nivId ?>" />
                                            <button type="submit" class="botonLeccion" class="form-control"><i class='fa fa-plus'></i> Agregar Leccion</button>
                                            <?php
                                        }
                                        ?>                                        
                                    </form>
                                </div>
                            </div>
                            <div class="panel-body">

                                <table class="table table-bordered table-hover table-striped" id="tblFicha">
                                    <thead>
                                        <tr>
                                            <th class='text-center'>Nombre</th>                                            
                                            <th class='text-center'>Imagen</th>
                                            <th colspan="3" class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                                                          
                                        <?php
                                        foreach ($data as $a) {
                                            $a instanceof Area;
                                            ?>                                        
                                            <tr>
                                                <?php
                                                echo "<td class='text-center'>" . $a->getLecNombre() . "</td>";
                                                echo "<td class='text-center'><img src='{$config->get("assets")}/leccion/{$a->getLecImagen()}' width='80' /></td>";
                                                ?>
                                                <td class='text-center' title='Editar Leccion'><a href='?c=Leccion&a=Editar&lecId=<?php echo $a->getLecId() ?>'><i class='fa fa-pencil' style="color: #4d95d2; size: 10px"></i></a></td>
                                                <td class='text-center' title='Eliminar Leccion'><a href='?c=Leccion&a=delete&lecId=<?php echo $a->getLecId() ?>&nivId=<?php echo @$nivel->getNivNombre() ?>'><i class='fa fa-trash' style="color: #4d95d2"></i></a></td>
                                                <td class='text-center' title='Agregar Pregunta'><a href='?c=Pregunta&a=listar&lecId=<?php echo $a->getLecId() ?>'><i class='fa fa-plus' style="color: #4d95d2">Agregar Pregunta</i></a></td>
                                            </tr>       
                                            <?php
                                        }
                                        ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <?php
                    echo $paginador->getNavHTML();
                    ?> 
                </center>
                <div class="text-center">
                    <a href="?c=Leccion&a=exportarXLS"><img src="<?php echo $config->get("assets") ?>/icons/iconoexcel.png" style="width: 40px">Exportar XLS</a>
                </div>
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>