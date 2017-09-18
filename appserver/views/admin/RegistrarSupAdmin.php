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
                        <div class="panel panel-primary tabla">
                            <div class="panel-heading">Agregar Super Administrador</div>
                            <div class="panel-body">
                                <form action="?c=Area&a=insert" method="POST" enctype="multipart/form-data" id="frmGuardar" class="col-md-8">
                                    <br/> 
                                    <div>
                                        <img src="<?php echo $config->get("assets") ?>perfil.jpg" id="foto" class="avatar img-registro">
                                        <div title='Agregar Foto'>                   
                                            <img src="<?php echo $config->get("assets") ?>icono-camara.jpg"  class="avatar icono-camera-reg">   
                                            <div class="imagen-foto-per">
                                                <input type="file" style="margin-left: 463px">
                                            </div>
                                        </div><br/>
                                    </div>
                                    <div class="form-inline cajas">
                                        <div class="form-group ">
                                            <label>Identificacion:</label>
                                            <input type="number" required="required" name="areNombre" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Nombre:</label>
                                            <input type="text" required="required" name="areNombre" class="form-control">
                                        </div>
                                    </div><br/>
                                    <div class="form-inline cajas">
                                        <div class="form-group ">
                                            <label>Apellido:</label>
                                            <input type="text" required="required" name="areNombre" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label>Correo:</label>
                                            <input type="email" required="required" name="areNombre" class="form-control">
                                        </div>
                                    </div><br/>
                                    <div class="form-inline cajas">
                                        <div class="form-group ">
                                            <label>Telefono:</label>
                                            <input type="number" required="required" name="areNombre" class="form-control">
                                        </div>
                                    </div><br/>
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
