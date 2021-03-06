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
                 <!--<input type="text" class="form-control" id="txtBuscarAprendiz">-->
                <div class="row">
                    <div class="col col-md-6 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Buscar Area</div>
                            <div class="panel-body">
                                <form action="?c=Area&a=listar" method="post">
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
                        <div class="panel panel-primary aprendiz">
                            <div class="panel-heading">
                                <div class="form-group">
                                    <form action="?c=Area&a=registrar" method="POST" class="formListas">
                                        Lista de areas                                  
                                        <button type="submit" class="botonListas" class="form-control"><i class='fa fa-plus'></i> Agregar Area</button>
                                    </form>
                                </div>
                            </div>                                    
                            <div class="panel-body">                                 
                                <table class="table table-bordered table-hover table-striped" id="tblArea">
                                    <thead>
                                        <tr>
                                            <!--<th class='text-center'>id</th>-->
                                            <th class='text-center'>Nombre</th>
                                            <th class='text-center'>Imagen</th>                                            
                                            <th class='text-center'>Estado</th>                                            
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
                                                echo "<td class='text-center'>" . $a->getAreNombre() . "</td>";
                                                echo "<td class='text-center'><img src='{$config->get("assets")}/areas/{$a->getAreImagen()}' width='80' /></td>";
                                                echo "<td class='text-center'>" . $a->getAreEstado() . "</td>";
                                                ?>
                                                <td class='text-center' title='Editar Area'><a href='?c=Area&a=frmEditar&areaId=<?php echo $a->getAreId() ?>'><i class='fa fa-pencil' style="color: #4d95d2"></i></a></td>
                                                <td class='text-center' title='Eliminar Area'><a href='?c=Area&a=delete&areId=<?php echo $a->getAreId() ?>'><i class='fa fa-trash' style="color: #4d95d2"></i></a></td>
                                                <td class='text-center' title='Agregar Nivel'><a href='?c=Nivel&a=listar&areId=<?php echo $a->getAreId() ?>'><i class='fa fa-plus' style="color: #4d95d2">Agregar Nivel</i></a></td>
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
                    <a href="?c=Area&a=exportarXLS"><img src="<?php echo $config->get("assets") ?>/icons/iconoexcel.png" style="width: 40px">Exportar XLS</a>
                </div>
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>