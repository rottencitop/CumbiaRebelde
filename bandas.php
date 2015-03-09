<?php
define(__ROOT__,dirname(__FILE__));
require_once(__ROOT__."/DAL/BandaDAL.php");
require_once(__ROOT__."/clases/Banda.class.php");
$bd = new BandaDAL();
$bandas = $bd->verBandas();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bandas ★ Cumbia Rebelde - La nueva cumbia chilena</title>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.vegas.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
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
        	
            <div id="wrapperbandas">
            	<h1>Bandas</h1>
                <section id="bandas">
                <?php
				if(count($bandas)>0){
					foreach($bandas as $b){
						echo '<a href="banda.php?banda='.$b->nombre.'"><article class="banda" title="<div class=\'irbio\'>Ver biografia de '.$b->nombre.'</div>">
                    	<img src="'.$b->imagen.'" alt="">
                    </article></a>';
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