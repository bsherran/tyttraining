<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
        <link rel="stylesheet" href="<?php echo $config->get("css") ?>nivel.css">
<!--        <script src="<?php echo $config->get("js") ?>admin/gestionarFicha.js"></script>-->

    </head>
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "aprendiz/menu.php" ?>
            <section class="container">
                <div class="row">

                    <div class="col col-md-6 tablaPersonas">
                        <div class="panel panel-primary">
                            <div class="panel-heading tituloarea">
                                <!--                                <div class="area">
                                                                    <img src="<?php // echo "{$config->get('assets')}/leccion/{$leccion->getLecImagen()}"    ?>" />
                                                                </div> -->
                                <label>
                                    <a href="??c=Pregunta&a=listarPreguntabyIdLeccion&idLec=<?php echo $leccion->getLecId() ?>" >
                                        <?php echo $leccion->getLecNombre() ?> / <?php echo $nivel->getNivNombre() ?> / <?php echo $area->getAreNombre() ?>
                                    </a>
                                </label>
                                <!--                                <div class="form-group">
                                                                    <a action="?c=Nivel&a=listar" method="POST" class="formListas">
                                                                    </a>
                                                                </div>-->
                            </div>
                            <div class="panel-body">

                                <?php
                                $contadorPreguntas = 1;
                                foreach ($preguntas as $a) {
                                    $a instanceof Pregunta;
                                    ?>     
                                    <?php
//                                            echo "<td class='text-center'>" . $a->getAreId() . "</td>";
                                    echo "<h2>{$a->getPreNombre()}</h2>";
                                    echo "<div>Tipo pregunta {$a->getPreTipoPregunta()}</div>";
                                    echo "<br>";
                                    ?>
                                <form id="pregunta<?php echo $a->getPreId() ?>" method="post" action="?c=Respuesta&a=insert&resId=<?php echo $a->getPreId() ?>&lecId=<?php echo $_REQUEST["idLec"]?>&preId=<?php echo $a->getPreId()?>">
                                        <table class="table table-bordered table-hover table-striped">
                                            <?php
                                            foreach ($a->getOpciones() as $opcion) {
                                                echo "<td width='400'>{$opcion->getOpcTexto()}</td>";
                                                if($a->getPreTipoPregunta()==="Unica" || $a->getPreTipoPregunta()==="Logica"){
                                                    echo "<td ><input required type='radio' name='opcion' value='{$opcion->getOpcId()}' /></td>";
                                                }else{
                                                    echo "<td ><input type='checkbox' name='opcion[{$opcion->getOpcId()}]' value='{$opcion->getOpcId()}' /></td>";
                                                }
                                                echo "</tr>";
                                            }
                                            ?>
                                        </table>
                                    
                          
                                    
                                    
                                    
                                        <button  class="btn btn-success center-block" >Guardar preguta </button>
                                    </form>

                                    <?php
                                    $contadorPreguntas++;
                                }
                                ?>  
                  
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <?php
                    echo $paginador->getNavHTML();
                    ?> 
                </center>
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>
