<!--Modal para abrir el ingresar-->
<meta charset="utf-8"/>
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" class="bglogin">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Iniciar sesión</h4>
            </div>
            <div class="modal-body">
                <br><br>
                <img id="logologin" width="100px" src="<?php echo $config->get("assets") ?>logologin.png"><br/><br>
                <form action="?a=login" method="POST">
                    <div class="input-group">
                        <!--<label>Identificación</label><br>-->
                        <span class="input-group-addon"><i class="fa fa-user" style="color: #ff8c00"></i></span><input placeholder="Ingrese su No. de Identificacion" type="number" name="usuLogin" class="form-control" />
                    </div><br><br>
                    <div class="input-group">
                        <!--<label>Contraseña</label><br>-->
                        <span class="input-group-addon"><i class="fa fa-lock" style="color: #ff8c00"></i></span><input placeholder="Contraseña" type="password" name="usuPassword" class="form-control" />
                    </div><br>
                    <button type="submit" class="boton">Ingresar</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->