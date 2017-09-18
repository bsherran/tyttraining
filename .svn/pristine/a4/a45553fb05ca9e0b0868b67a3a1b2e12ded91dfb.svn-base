<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Administrador</title>
        <?php require_once $config->get("template") . "public/meta_header.php" ?>
        <link rel="stylesheet" href="<?php echo $config->get("css") ?>aprendiz.css">
<!--        <script src="<?php echo $config->get("js") ?>admin/gestionarFicha.js"></script>-->
    </head>
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "aprendiz/menu.php" ?>
            <section class="container areas">
                <h1>Areas de Entrenamiento </h1>                
                <center>
                <?php
                foreach ($data as $a) {
                    $a instanceof Area;
                    ?>                                        
                    <div class="area">
                        <img src="<?php echo "{$config->get('assets')}/areas/{$a->getAreImagen()}" ?>" />
                        <label><a href="?c=Nivel&a=listarNivelbyIdArea&idArea=<?php echo $a->getAreId() ?>" ><?php echo $a->getAreNombre() ?> </a></label>
                    </div> 

                    <?php
                }
                ?> 
                    </center>
            </section>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>
