<?php
define(__ROOT__,dirname(__FILE__));
require_once(__ROOT__."/DAL/VideoDAL.php");
require_once(__ROOT__."/clases/Video.class.php");
require_once(__ROOT__."/DAL/NoticiaDAL.php");
require_once(__ROOT__."/clases/Noticia.class.php");
$nd = new NoticiaDAL();
$vd = new VideoDAL();
$unoticias = $nd->verUltimasNoticias();
$uvideos = $vd->verUltimosVideos();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>★ Cumbia Rebelde - La nueva cumbia chilena</title>
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
	<div id="wrapperreproductor">
    	<div id="reproductor">
        	<div id="wrapperclose">
            	<div id="close">
                	<img src="images/close.png" alt="" />
                </div>
            </div>
        	<div id="containervideo"></div>
        </div>
    </div>
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
        	
            <div id="wrapperultimasnoticias">
            	<h1>Ultimas Noticias</h1>
                <section id="ultimasnoticias" class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="5000"
    data-cycle-slides="> article" data-cycle-pause-on-hover="true">
    				<?php
						if(count($unoticias) > 0){
							foreach($unoticias as $un){
								echo '<article class="ultimanoticia">
                       <img src="'.$un->imagen.'" alt="">
                       <a href="noticia.php?id='.$un->id.'"><h2>'.$un->titulo.' </h2></a>
                     </article>';
							}
						}
					?>
    				
                  
                </section>
            </div>
            
            <div id="wrapperultimosvideos">
            	<h1>Últimas Videos</h1>
                <div id="ultimosvideos">
                <?php
					if(count($uvideos) > 0){
						foreach($uvideos as $uv){
							echo '<article class="ultimovideo" data-video="'.$uv->link.'" title="<strong>'.$uv->titulo.'</strong>">
                    	<img src="http://img.youtube.com/vi/'.$uv->link.'/maxresdefault.jpg" alt="">
                    </article>';
						}
					}
				?>
                	       
                </div>
            </div>
        </div>
        
        <footer>
        Cumbia Rebelde &copy; 2014 | Sitio desarrollado por Leonel Carrasco
        </footer>
    </div>
</body>
</html>