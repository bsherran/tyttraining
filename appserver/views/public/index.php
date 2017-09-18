<?php
$config = Config::singleton();
?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <?php require_once $config->get("template") . "public/meta_header.php" ?>
    
    <body>
        <main>
            <?php require_once $config->get("template") . "public/header.php" ?>
            <?php require_once $config->get("template") . "public/menu.php" ?>
            <?php require_once $config->get("template") . "msg.php" ?>
            
            <div class="panel_principal">
                <section class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="<?php echo $config->get("assets") ?>Slide1.jpg" alt="">
                                        <div class="carousel-caption">
                                            ...
                                        </div>
                                    </div>
                                    <div class="item ">
                                        <img src="<?php echo $config->get("assets") ?>Slide2.jpg" alt="">
                                        <div class="carousel-caption">
                                            ...
                                        </div>
                                    </div>
                                    <div class="item ">
                                        <img src="<?php echo $config->get("assets") ?>Slide3.jpg" alt="">
                                        <div class="carousel-caption">
                                            ...
                                        </div>
                                    </div>

                                    <div class="item ">
                                        <img src="<?php echo $config->get("assets") ?>Slide4.jpg" alt="">
                                        <div class="carousel-caption">
                                            ...
                                        </div>
                                    </div>
                                    <div class="item ">
                                        <img src="<?php echo $config->get("assets") ?>Slide5.jpg" alt="">
                                        <div class="carousel-caption">
                                            ...
                                        </div>
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <i class="fa fa-arrow-circle-left iconoFlechaCarrousel" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <i class="fa fa-arrow-circle-right iconoFlechaCarrousel" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>



                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $config->get("icons") ?>matematicas.png" alt="Matematicas">
                            <div class="caption">
                                <h3 class="text-center">Matematicas</h3>
                                <p class="text-justify">Sin matemáticas, no hay nada que puedas hacer. Todo a tu alrededor es matemáticas. Todo a tu alrededor son números.-Shakuntala Devi.</p>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $config->get("icons") ?>ingles.png" alt="Matematicas">
                            <div class="caption">
                                <h3 class="text-center">Ingles</h3>
                                <p class="text-justify">«Se vive otra vida por cada idioma que se habla. Si solo sabes un idioma, solo vives una vez», refrán checo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $config->get("icons") ?>espanol.png" alt="Matematicas">
                            <div class="caption">
                                <h3 class="text-center">Español</h3>
                                <p class="text-justify">"Un idioma te pone en un pasillo durante toda la vida. Dos idiomas te abren todas las puertas a lo largo del camino», Frank Smith</p>                                
                            </div>
                        </div>
                    </div>


                </section>
                <?php require_once $config->get("template") . "public/modalLogin.php" ?>
            </div>
            <?php require_once $config->get("template") . "public/footer.php" ?>
        </main>
    </body>
</html>