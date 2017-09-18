<?php
session_start();
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("tyttraining", $conexion);
?>
<html>
    <head>

        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
    </head>

    <body>
        <div align="center">
            <form action="" method="post" enctype="multipart/form-data" name="form1">
                <table  
                    <tr>
                        <td>
                            <strong>Agregar Archivo de excel </strong>
                            <input type="file" name="archivo" id="archivo">
                            <strong> Desea Actualizar la BD</strong>
                            <label><input tipy="radio" name="radio" value="s" checked/>SI</label>
                            <label><input tipy="radio" name="radio" value="n" checked/>NO</label>

                            <input type="submit" name="button" class="btn" id="button" value="actualizar base de datos">
                        </td> 
                    <tr>
                        <td> &nbs</td>
                    </tr>

            </form>
        </table>
        <?php
        if (isset($_POST['radio'])) {
            $nameEXCEL = $_FILES['archivo']['name'];
            $tmpEXCEL = $_FILES['archivo']['tmp_name'];
            $extEXCEL = pathinfo($nameEXCEL);
            $urlnueva = "xls/--ruta---------------";
            if (is_uploaded_file($tmpExcel)) {
                copy($tmpEXCEL, $urlnueva);
                echo '<div align="center"><strong>datos actualizados con exito </strong></div>';
            }
        }
        ?>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th><center><strong>A</strong></center> 
            <th><center><strong>B</strong></center> 
            <th><center><strong>C</strong></center> 
            <th><center><strong>D</strong></center> 
            <th><center><strong>E</strong></center> 
            <th><center><strong>F</strong></center> 
            </tr>
            </thead>
            <tr>
                <th>Id</th>
                <th>Identificacion</th>
                <th>Nombre<</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>

            </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['radio'])) {
                    require_once 'PHPExcel/classes/PHPExcel/IOfactory.php';

                    $objPHPExcel = PHPExcel_IOFactory::load('xls/reportes.xls');
                    $objHoja = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, tru);

                    foreach ($objHoja as $iIndice->objCelda) {
                        echo '
                        <tr>
                        <td>' . $objCelda['A'] . '</td>
                        <td>' . $objCelda['B'] . '</td>
                        <td>' . $objCelda['C'] . '</td>
                        <td>' . $objCelda['D'] . '</td>
                        <td>' . $objCelda['E'] . '</td>
                        <td>' . $objCelda['F'] . '</td>
                            </tr>
                                ';

                        $id = $objCelda['A'];
                        $identificacion = $objCelda['D'];
                        $direccion = $objCelda['B'];
                        $apellido = $objCelda['F'];
                        $nombre = $objCelda['C'];
                        $correo = $objCelda['E'];
                        if ($_POST['radio'] == 's') {
                            $sql = "INSERT INTO persona (perId, perNombre, perApellido,perCorreo,perTelefono,perIdentificacion)
            . VALUES
           ('perId', 'perNombre',' perApellido','perCorreo','perTelefono','perIdentificacion')";
                            mysql_query($sql);
                        }
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>

