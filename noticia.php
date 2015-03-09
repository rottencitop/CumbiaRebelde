<?php
define(__ROOT__,dirname(__FILE__));
require_once(__ROOT__."/DAL/NoticiaDAL.php");
require_once(__ROOT__."/clases/Noticia.class.php");
if(isset($_GET['id'])){
	$nd = new NoticiaDAL();
	$un = $nd->verNoticia($_GET['id']);
	if($un == null){
		header("noticias.php");
		exit();
	}
}else{
	header("noticias.php");
	exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $un->titulo; ?></title>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.vegas.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script src="//use.edgefonts.net/strong;dynalight;aguafina-script;qwigley.js"></script>
<link href="css/tipsy.css" rel="stylesheet" type="text/css" />
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
        	
            <div id="wrappernoticia">
            	<h1><?php echo $un->titulo; ?> </h1>
                <section id="noticia">
                	<img src="<?php echo $un->imagen; ?>" alt="">
                    <?php echo $un->contenido; ?>

                </section>
            </div>
            
                    </div>
        
        <footer>
        Cumbia Rebelde &copy; 2014 | Sitio desarrollado por Leonel Carrasco
        </footer>
    </div>
</body>
</html>