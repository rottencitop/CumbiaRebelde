<?php
define(__ROOT__,dirname(__FILE__));
require_once(__ROOT__."/DAL/VideoDAL.php");
require_once(__ROOT__."/clases/Video.class.php");
require_once(__ROOT__."/DAL/NoticiaDAL.php");
require_once(__ROOT__."/clases/Noticia.class.php");
require_once(__ROOT__."/DAL/BandaDAL.php");
require_once(__ROOT__."/clases/Banda.class.php");
require_once(__ROOT__."/clases/Imagen.class.php");
require_once(__ROOT__."/clases/Disco.class.php");

$opcion = $_POST['opcion'];

if($opcion == 1){
	$video = $_POST['video'];
	$vd = new VideoDAL();
	if($vd->eliminarVideo($video)){
		echo '<script type="text/javascript">alert("Video eliminado");
		window.location="admin.php";</script>';
	}else{
		echo '<script type="text/javascript">alert("Error al eliminar video");</script>';
	}	
}else if($opcion == 2){
	$noticia = $_POST['noticia'];
	$nd = new NoticiaDAL();
	if($nd->eliminarNoticia($noticia)){
		echo '<script type="text/javascript">alert("Noticia eliminada");
		window.location="admin.php";</script>';
	}else{
		echo '<script type="text/javascript">alert("Error al eliminar noticia");</script>';
	}	
}
else if($opcion == 3){
	$banda = $_POST['banda'];
	$bd = new BandaDAL();
	if($bd->eliminarBanda($banda)){
		echo '<script type="text/javascript">alert("Banda eliminada");
		window.location="admin.php";</script>';
	}else{
		echo '<script type="text/javascript">alert("Error al eliminar banda");</script>';
	}
}

?>