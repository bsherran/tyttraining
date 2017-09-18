<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tyttraining</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
<!--        <script src="<?php echo $config->get("js") ?>admin/gestionarFicha.js"></script>-->
    </head>
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "admin/menu.php" ?>
            <section class="container">                
                <div class="row">
                    <div class="col col-md-6 tablaPersonas">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="form-group">
                                    <form action="?c=Pregunta&a=registrar" method="POST" class="formListas">
                                        Lista de preguntas de la <b><?php echo $leccion->getLecNombre() ?></b>
                                        <?php
                                        if (isset($lecId)) {
                                            ?>
                                            <input type="hidden" name="lecId" id="areId" value="<?php echo $lecId ?>" />
                                            <button type="submit" class="botonNivel" class="form-control"><i class='fa fa-plus'></i> Agregar Pregunta</button>
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
                                            <th class='text-center'>Tipo Pregunta</th>                                                
                                            <th class='text-center'>Opciones de Respuesta</th>                                                
                                            <th colspan="3" class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                       
                                        <?php
                                        foreach ($data as $a) {
                                            $a instanceof Pregunta;
                                            ?>                                        
                                            <tr>
                                                <?php
//                                            echo "<td class='text-center'>" . $a->getAreId() . "</td>";
                                                echo "<td class='text-center'>" . $a->getPreNombre() . "</td>";
                                                echo "<td class='text-center'>" . $a->getPreTipoPregunta() . "</td>";
                                                ?>
                                                <td class="text-center">
                                                    <table class="table table-bordered table-hover table-striped">
                                                        <?php
                                                        
                                                        foreach ($a->getOpciones() as $opcion) {
                                                            echo "<tr>";                                                                  
                                                            echo "<td>{$opcion->getOpcTexto()}</td>";  
                                                            $icono = "";
                                                            if($opcion->getOpcVerdadero()===1){
                                                                $icono = "<span class='fa fa-check' style='color: green'></span>";
                                                            }else{
                                                                $icono = "<span class='fa fa-ban' style='color: red'></span>";
                                                            }
                                                            echo "<td>{$icono}</td>";                                                                                                                                                                                                                                                            
                                                            echo "</tr>";                                                            
                                                        }
                                                        ?>
                                                    </table>
                                                </td>
                                                <td class='text-center' title='Editar Pregunta'><a href='?c=Pregunta&a=frmEditar&preId=<?php echo $a->getPreId() ?>'><i class='fa fa-pencil' style="color: #4d95d2"></i></a></td>
                                                <td class='text-center' title='Eliminar Pregunta'><a href='?c=Pregunta&a=delete&preId=<?php echo $a->getPreId() ?>&lecId=<?php echo @$leccion->getLecId() ?>'><i class='fa fa-trash' style="color: #4d95d2"></i></a></td>                                                
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
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>