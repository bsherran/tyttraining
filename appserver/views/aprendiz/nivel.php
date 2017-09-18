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
<!--                 <div class="row">
                   <div class="col col-md-6 ">
                       <div class="panel panel-primary">
                           <div class="panel-heading">Buscar Nivel</div>
                           <div class="panel-body">
                               <form action="?c=Nivel&a=listarNivelbyIdArea&idArea=<?php echo $_REQUEST["idArea"]?>" method="post">
                                   <div class="form-inline">
                                       <input type="text" name="termino" class="form-control" value="<?php echo @$_REQUEST["termino"] ?>" style="width: 92%;"/> 
                                       <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                   </div>
                               </form> 
                           </div>
                       </div>
                   </div>
               </div>  -->
                <div class="row">
                    <div class="col col-md-6 tablaPersonas">
                        <div class="panel panel-primary">
                            <div class="panel-heading tituloarea">
                                <div class="area">
                                    <img src="<?php echo "{$config->get('assets')}/areas/{$area->getAreImagen()}" ?>" />
                                </div> 
                                <label><a href="?c=Nivel&a=listarNivelbyIdArea&idArea=<?php echo $area->getAreId() ?>" ><?php echo $area->getAreNombre() ?> </a></label>
                                <div class="form-group">
                                    <a action="?c=Nivel&a=listar" method="POST" class="formListas">
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">

                                <table class="table table-bordered table-hover table-striped" id="tblFicha">

                                    <tbody>                                       
                                        <?php
                                        $porcentaje = 100;
                                        foreach ($data as $a) {
                                            $a instanceof Nivel;
                                            $class = $porcentaje < 70 ? "deshabilitado" : "";
                                            ?>                                        
                                            <tr class="<?php echo $class; ?>">
                                                <td width="90">
                                                    <div class="nivel">
                                                        <img src="<?php echo "{$config->get('assets')}/nivel/{$a->getNivImagen()}" ?>" width='80' height="80" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($porcentaje >= 70) {
                                                        ?>
                                                        <a href="?c=Leccion&a=listarLeccionbyIdNivel&idNivel=<?php echo $a->getNivId() ?>" ><h2><?php echo $a->getNivNombre() ?> </h2></a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <h2><?php echo $a->getNivNombre() ?> </h2>
                                                        <?php
                                                    }
                                                    ?>      
                                                </td>
                                                <td width="100">
                                                    <h3>
                                                        <center>
                                                            <?php
                                                            echo "{$a->getCantidadRespuestas()} / {$a->getCantidadPreguntas()}";
                                                            ?>
                                                        </center>
                                                    </h3>
                                                </td>
                                            </tr>       
                                            <?php
                                            if ($a->getCantidadPreguntas() > 0)
                                                $porcentaje = (100 * $a->getCantidadRespuestas()) / $a->getCantidadPreguntas();
                                            else
                                                $porcentaje = 0;
                                        }
                                        ?>     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
<!--
                <center>
                    <?php
                    echo $paginador->getNavHTML();
                    ?> 
                </center>-->
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>
