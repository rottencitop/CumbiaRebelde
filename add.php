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
	$vd = new VideoDAL();
	$v = new Video();
	$v->titulo = $_POST['titulo'];
	$v->link = $_POST['link'];
	if($vd->agregarVideo($v)){
		echo '<script type="text/javascript">alert("Video Agregado");
		window.location="admin.php";</script>';
	}
	else{
		echo '<script type="text/javascript">alert("Error al agregar Video");</script>';
	}
}
else if($opcion == 2){
	$fecha = date("Y-m-d");
	$imagen = "images/".$fecha.$_FILES['imagen']['name'];
	if(move_uploaded_file($_FILES['imagen']['tmp_name'],$imagen)){
		$n = new Noticia();
		$nd = new NoticiaDAL();
		$n->titulo = $_POST['titulo'];
		$n->contenido = $_POST['contenido'];
		$n->imagen = $imagen;
		$n->fecha = $fecha;
		if($nd->agregarNoticia($n)){
			echo '<script type="text/javascript">alert("Noticia Agregada");
			window.location="admin.php";</script>';
		}else{
			echo '<script type="text/javascript">alert("Error al agregar noticia");</script>';
		}
	}else{
		echo '<script type="text/javascript">alert("No se pudo agregar la imagen");</script>';
	}
}else if($opcion==3){
	$nombrebanda = $_POST['nombre'];
	$info = pathinfo($_FILES['imagenbanda']['name']);
	$ext = $info['extension'];
	$imagenbanda = "images/img".$nombrebanda.".".$ext;
	if(move_uploaded_file($_FILES['imagenbanda']['tmp_name'],$imagenbanda)){
		$b = new Banda();
		$bd = new BandaDAL();
		$b->nombre = $nombrebanda;
		$b->imagen = $imagenbanda;
		$b->biografia = $_POST['biografia'];
		if($bd->agregarBanda($b)){
			$igs = $_FILES['imagenes']['tmp_name'];
			$x = 1;
			foreach($igs as $i){
				if(move_uploaded_file($i,'images/'.$nombrebanda.$x.'.jpg')){
					$ib = new Imagen();
					$ib->imagen = 'images/'.$nombrebanda.$x.'.jpg';
					$ib->banda = $nombrebanda;
					$bd->agregarImagenBanda($ib);
				}
				$x++;
			}
			
			echo '<script type="text/javascript">alert("Banda agregada");
			window.location="admin.php";</script>';
		}else{
			echo '<script type="text/javascript">alert("Error al agregar banda");</script>';
		}
	}else{
		echo '<script type="text/javascript">alert("No se pudo agregar la imagen de la banda");</script>';
	}
	
}
else if($opcion == 4){
	$nombredisco = $_POST['nombre'];
	$info = pathinfo($_FILES['imagen']['name']);
	$ext = $info['extension'];
	$nombrebanda = $_POST['banda'];
	$imagen = "images/".$nombrebanda."-".$nombredisco.".".$ext;
	if(move_uploaded_file($_FILES['imagen']['tmp_name'],$imagen)){
		$d = new Disco();
		$bd = new BandaDAL();
		$d->nombre = $nombredisco;
		$d->imagen = $imagen;
		$d->banda = $nombrebanda;
		if($bd->agregarDiscoBanda($d)){
			echo '<script type="text/javascript">alert("Disco agregado");
			window.location="admin.php";</script>';
		}else{
			echo '<script type="text/javascript">alert("Error al agregar disco.");</script>';
		}
	}
	else{
		echo '<script type="text/javascript">alert("No se pudo agregar la imagen al disco.");</script>';
	}
}
?>