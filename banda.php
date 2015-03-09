<?php
define(__ROOT__,dirname(__FILE__));
require_once(__ROOT__."/DAL/BandaDAL.php");
require_once(__ROOT__."/clases/Banda.class.php");
require_once(__ROOT__."/clases/Imagen.class.php");
require_once(__ROOT__."/clases/Disco.class.php");
if(isset($_GET['banda'])){
	$bd = new BandaDAL();
	$b = $bd->verBanda($_GET['banda']);
	if($b == null){
		header("Location: bandas.php");
		exit();
	}
	$imgsb = $bd->verImagenesBanda($_GET['banda']);
	$dsb = $bd->verDiscosBanda($_GET['banda']);
}else{
	header("Location: bandas.php");
	exit();
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $b->nombre; ?> ★ Cumbia Rebelde - La nueva cumbia chilena</title>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.vegas.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle2.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/lightbox.min.js"></script>
<script src="//use.edgefonts.net/strong;dynalight;aguafina-script;qwigley.js"></script>
<link href="css/tipsy.css" rel="stylesheet" type="text/css" />
<link href="css/lightbox.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.vegas.min.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body onUnload="">
	<div id="container">
    	<header>
        	<div id="logo"><img src="images/logo.png" alt=""/></div>
            <nav>
            	<ul>
                	<a href="index.php"><li>Inicio</li></a>
                    <a href="noticias.php"><li>Noticias</li></a>
                    <a href="bandas.php"><li>Bandas</li></a>
                    <a href="participa.php"><li>Participa por Entradas Dobles</li></a>
                </ul>
            </nav>
        </header>
        
        <div id="wrappercontenido">
        	
            <div id="wrapperbanda">
            	<h1>Biografía de la Banda</h1>
            	<section id="banda">
               	<div id="logobanda">
                    	<img src="<?php echo $b->imagen; ?>" alt="">
                    </div>  
                    <div id="biografiabanda"><?php echo $b->biografia; ?>
                    </div>
              </section>
            </div>
            
            <div id="wrappergaleriabanda">
            	<h1>Galería de Imagenes</h1>
                <section id="galeria">
                	<?php
						if(count($imgsb) > 0){
							foreach($imgsb as $imgb){
								echo '<a href="'.$imgb->imagen.'" data-lightbox="galeria" data-title="'.$imgb->banda.'"><div class="imagengaleria">
                    	<img src="'.$imgb->imagen.'" alt="">
                    </div></a>';
							}
						}
					?>
                	               
                   
                </section>
            </div>
            
            <div id="wrapperdiscografiabanda">
            	<h1>Discografia de la banda</h1>
                <div id="prev"></div>
                <div id="next"></div>
                <section id="discografia"  class="cycle-slideshow" data-cycle-fx=carousel data-cycle-timeout=3000  data-cycle-pause-on-hover="true" data-cycle-carousel-visible=2 data-cycle-next="#next"
    data-cycle-prev="#prev">
                	    <?php
						if(count($dsb) > 0){
							foreach($dsb as $db){
								echo '<img src="'.$db->imagen.'" alt="'.$db->nombre.'" title="'.$db->nombre.'" style="margin:0 5px;" width="150" height="150" alt="">';
							}
						}
						?>
                                                                         
                </section>
            </div>
        </div>
        
        <footer>
        Cumbia Rebelde &copy; 2014 | Sitio desarrollado por Leonel Carrasco
        </footer>
    </div>
</body>
</html>