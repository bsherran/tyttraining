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
                            <div class="panel-heading">Buscar Nivel</div>
                            <div class="panel-body">
                                <form action="?c=Nivel&a=listar&areId=<?php echo $_REQUEST["areId"] ?>" method="post">
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
                                    <form action="?c=Nivel&a=registrar" method="POST" class="formListas">
                                        Lista de niveles de <b><?php echo @$area->getAreNombre() ?></b>
                                        <?php
                                        if (isset($areId)) {
                                            ?>
                                            <input type="hidden" name="areId" id="areId" value="<?php echo $areId ?>" />
                                            <button type="submit" class="botonNivel" class="form-control"><i class='fa fa-plus'></i> Agregar Nivel</button>
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
                                            <!--<th class='text-center'>id</th>-->
                                            <th class='text-center'>Nombre</th>
                                            <!--<th class='text-center'>Numero</th>-->
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
//                                            echo "<td class='text-center'>" . $a->getAreId() . "</td>";
                                                echo "<td class='text-center'>" . $a->getNivNombre() . "</td>";
                                                echo "<td class='text-center'><img src='{$config->get("assets")}/nivel/{$a->getNivImagen()}' width='80' /></td>";
                                                ?>
                                                <td class='text-center' title='Editar Nivel'><a href='?c=Nivel&a=frmEditar&nivId=<?php echo $a->getNivId() ?>'><i class='fa fa-pencil' style="color: #4d95d2"></i></a></td>
                                                <td class='text-center' title='Eliminar Nivel'><a href='?c=Nivel&a=delete&nivId=<?php echo $a->getNivId() ?>&areId=<?php echo @$area->getAreId() ?>'><i class='fa fa-trash' style="color: #4d95d2"></i></a></td>
                                                <td class='text-center' title='Agregar Leccion'><a href='?c=Leccion&a=listar&nivId=<?php echo $a->getNivId() ?>'><i class='fa fa-plus' style="color: #4d95d2">Agregar Leccion</i></a></td>
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
                    <a href="?c=Nivel&a=exportarXLS"><img src="<?php echo $config->get("assets") ?>/icons/iconoexcel.png" style="width: 40px">Exportar XLS</a>
                </div>
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>
