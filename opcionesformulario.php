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
	//Agregar Video
	?>
    <form id="formAgregarVideo">
    	<fieldset>
        	<legend>Agregar Video</legend>
           	<label>Título:</label>
            <input type="text" name="titulo" required>
            <label>Link Youtube:</label>
            <input type="text" name="link" required placeholder="EJ: DGl0l9Dy9ng"> 
        </fieldset>
        <input type="submit" value="Agregar">
    </form>
<?php
}
else if($opcion==2){
	//Ver videos
	$vd = new VideoDAL();
	$videos = $vd->verTodoslosVideos();
	if(count($videos)>0){
		echo '<div id="todosvideos">';
	foreach($videos as $v){
		echo '<div><div class="idvideo">'.$v->id.'</div>
        <div class="titulovideo">'.$v->titulo.'</div>
        <div class="opcionesvideo">
        <button disabled>Editar</button>
        <button class="eliminarvideo" data-video="'.$v->id.'">Eliminar</button>
        </div></div>';
	}
	echo '</div>';
	}else{
		echo 'No hay videos.';
	}
}
else if($opcion==3){
	//Agregar noticia
	?>
    <form id="formAgregarNoticia">
    	<fieldset>
        	<legend>Agregar Noticia</legend>
            <label>Titulo:</label>
            <input type="text" name="titulo" required>
            <label>Contenido:</label>
            <textarea name="contenido" required></textarea>
            <label>Imagen:</label>
            <input type="file" name="imagen" required>
        </fieldset>
        <input type="submit" value="Agregar Noticia">
    </form>
<?php
}else if($opcion==4){
	//Ver Noticias
	$nd = new NoticiaDAL();
	$noticias = $nd->verTodaslasNoticias();
	if(count($noticias)>0){
		echo '<div id="todosnoticias">';
	foreach($noticias as $n){
		echo '<div><div class="idnoticia">'.$n->id.'</div>
        <div class="titulonoticia">'.$n->titulo.'</div>
        <div class="opcionesnoticia">
        <button disabled>Editar</button>
        <button class="eliminarnoticia" data-noticia="'.$n->id.'">Eliminar</button>
        </div></div>';
	}
	echo '</div>';
	}else{
		echo 'No hay noticias';
	}
	
}
else if($opcion == 5){
	//Agregar Banda
	?>
    
    <form id="formAgregarBanda">
    	<fieldset>
        	<legend>Agregar Banda</legend>
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>Imagen de la banda:</label>
            <input type="file" name="imagenbanda" required>
            <label>Biografía:</label>
            <textarea name="biografia" required></textarea>
        </fieldset>
        <fieldset>
        	<legend>Galería de Imagenes:</legend>
            <label>Imagenes: (Puede elegir varias)</label>
            <input type="file" name="imagenes[]" multiple required>
        </fieldset>
        <input type="submit" value="Agregar Banda">
    </form>
    
    <?php
}
else if($opcion == 6){
	//Ver Bandas
	$bd = new BandaDAL();
	$bandas = $bd->verBandas();
	if(count($bandas)>0){
		echo '<div id="todasbandas">';
	foreach($bandas as $b){
		echo '<div><div class="nombrebanda">'.$b->nombre.'</div>
        <div class="opcionesbanda">
        <button disabled>Editar</button>
        <button class="eliminarbanda" data-banda="'.$b->nombre.'">Eliminar</button>
        </div></div>';
	}
	echo '</div>';
	}else{
		echo 'No hay bandas';
	}
}
else if($opcion == 7){
	//Agregar disco a banda
	$bd = new BandaDAL();
	$bandas = $bd->verBandas();
	?>
    <form id="formAgregarDisco">
    	<fieldset>
        	<legend>Agregar Disco</legend>
            <label>Nombre del disco:</label>
            <input type="text" name="nombre" required>
            <label>Imagen del disco:</label>
            <input type="file" name="imagen" required>
            <label>Banda:</label>
            <select name="banda">
            <?php
				foreach($bandas as $banda){
					echo '<option value="'.$banda->nombre.'">'.$banda->nombre.'</option>';
				}
			?>
            </select>
        </fieldset>
        <input type="submit" value="Agregar Disco">
    </form>
    <?php
}else if($opcion == 8){
	//Ver Participantes
}
else{
	echo "La opción no existe.";
}
?>