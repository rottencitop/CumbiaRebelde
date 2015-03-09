<?php
define(__ROOT__,dirname(dirname(__FILE__)));
require_once(__ROOT__."/clases/Noticia.class.php");
require_once(__ROOT__."/DAL/Conectar.php");
class NoticiaDAL{
	private $conexion;
	
	public function __construct(){
		$this->conexion = new Conectar();
	}
	
	//Ver noticia unica
	public function verNoticia($id){
		$mysqli = $this->conexion->conectar();
		$noticia = null;
		$SQL = "SELECT * FROM noticia WHERE id = ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("i",$id);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$noticia = new Noticia();
			$ps->bind_result($nId,$nTitulo,$nContenido,$nImagen,$nFecha);
			$ps->fetch();
			$noticia->id = $nId;
			$noticia->titulo = $nTitulo;
			$noticia->contenido = $nContenido;
			$noticia->imagen = $nImagen;
			$noticia->fecha = $nFecha;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $noticia;
	}
	
	//Ver ultimas 3 noticias
	public function verUltimasNoticias(){
		$mysqli = $this->conexion->conectar();
		$noticias = null;
		$SQL = "SELECT * FROM noticia ORDER BY id DESC LIMIT 3";
		$ps = $mysqli->prepare($SQL);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$noticias = array();
			$ps->bind_result($nId,$nTitulo,$nContenido,$nImagen,$nFecha);
			while($ps->fetch()){
				$n = new Noticia();
				$n->id = $nId;
				$n->titulo = $nTitulo;
				$n->contenido = $nContenido;
				$n->imagen = $nImagen;
				$n->fecha = $nFecha;
				$noticias[] = $n;
			}
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $noticias;
	}
	
	//Ver todas las noticias
	public function verTodaslasNoticias(){
		$mysqli = $this->conexion->conectar();
		$noticias = null;
		$SQL = "SELECT * FROM noticia ORDER BY id DESC";
		$ps = $mysqli->prepare($SQL);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$noticias = array();
			$ps->bind_result($nId,$nTitulo,$nContenido,$nImagen,$nFecha);
			while($ps->fetch()){
				$n = new Noticia();
				$n->id = $nId;
				$n->titulo = $nTitulo;
				$n->contenido = $nContenido;
				$n->imagen = $nImagen;
				$n->fecha = $nFecha;
				$noticias[] = $n;
			}
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $noticias;
	}
	
	//agregar noticia
	public function agregarNoticia($n){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "INSERT INTO noticia(titulo,contenido,imagen,fecha) VALUES(?,?,?,?)";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("ssss",$n->titulo, $n->contenido,$n->imagen,$n->fecha);
		if($ps->execute()){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
	
	//eliminar noticia por id
	public function eliminarNoticia($id){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "DELETE FROM noticia WHERE id = ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("i",$id);
		if($ps->execute()){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
	
	//Editar noticia
	public function editarNoticia($n){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "UPDATE noticia SET titulo = ?, contenido = ? WHERE id = ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("ssi",$n->titulo, $n->contenido, $n->id);
		$ps->store_result();
		if($ps->affected_rows > 0){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
}
?>