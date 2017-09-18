<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
        <script src="<?php echo $config->get("js") ?>admin/gestionarPrograma.js"></script>
    </head>
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "admin/menu.php" ?>            
            <div>
                <img src="<?php echo $config->get("assets") ?>perfil.jpg" id="foto" class="avatar img-perfil">
                <div title='Agregar Foto'>                   
                    <img src="<?php echo $config->get("assets") ?>icono-camara.jpg"  class="avatar icono-camera">   
                    <div class="imagen-foto-per">
                    <input type="file" style="margin-left: 463px">
                    </div>
                </div><br/>
                <div class="nombre">
                    <?php echo ProxyAdmin::getAuth()->perNombre . " " . ProxyAdmin::getAuth()->perApellido ?>
                </div><br/><br/>
                <section class="container">
                    <div class="row">
                        <div class="col col-md-6 formularioRegistro">
                            <div class="panel panel-primary caja-texto">
                                <div class="panel-body">
                                    <form action="#" method="POST" enctype="multipart/form-data" id="frmGuardar" class="col-md-8">
                                        <br/><br/> 
                                        <div class="form-inline tamaño-cajas">
                                            <div class="form-group">
                                                <label>Identificacion:</label>
                                                <input type="text" required="required" id="perIdentificacion" class="form-control" value="<?php echo ProxyAdmin::getAuth()->perIdentificacion ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Telefono:</label>
                                                <input type="text" required="required" id="perTelefono" class="form-control " value="<?php echo ProxyAdmin::getAuth()->perTelefono ?>" disabled>
                                            </div>
                                        </div><br/><br/>
                                        <div class="form-inline tamaño-cajas">
                                            <div class="form-group">
                                                <label>Correo:</label>
                                                <input type="text" required="required" id="perCorreo" class="form-control " value="<?php echo ProxyAdmin::getAuth()->perCorreo ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Contraseña:</label>
                                                <input type="text" required="required" id="usuPassword" class="form-control ">
                                            </div>
                                        </div><br/><br/>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-ac">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
                <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>