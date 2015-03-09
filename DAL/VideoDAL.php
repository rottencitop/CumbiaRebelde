<?php
define(__ROOT__,dirname(dirname(__FILE__)));
require_once(__ROOT__."/clases/Video.class.php");
require_once(__ROOT__."/DAL/Conectar.php");
class VideoDAL{
	private $conexion;
	
	public function __construct(){
		$this->conexion = new Conectar();
	}
	
	//Agregar video
	public function agregarVideo($v){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "INSERT INTO video(titulo,link) VALUES(?,?)";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("ss",$v->titulo,$v->link);
		if($ps->execute()){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
	
	//Ver los ultimos 4 videos
	public function verUltimosVideos(){
		$videos = null;
		$mysqli = $this->conexion->conectar();
		$SQL = "SELECT * FROM video ORDER BY id DESC LIMIT 4";
		$ps = $mysqli->prepare($SQL);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$videos = array();
			$ps->bind_result($vId, $vTitulo,$vLink);
			while($ps->fetch()){
				$v = new Video();
				$v->id = $vId;
				$v->titulo = $vTitulo;
				$v->link = $vLink;
				$videos[] = $v;
			}
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $videos;
	}
	
	//Ver todoslos videos
	public function verTodoslosVideos(){
		$videos = null;
		$mysqli = $this->conexion->conectar();
		$SQL = "SELECT * FROM video ORDER BY id DESC";
		$ps = $mysqli->prepare($SQL);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$videos = array();
			$ps->bind_result($vId, $vTitulo,$vLink);
			while($ps->fetch()){
				$v = new Video();
				$v->id = $vId;
				$v->titulo = $vTitulo;
				$v->link = $vLink;
				$videos[] = $v;
			}
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $videos;
	}
	
	//Editar Video
	public function editarVideo($v){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "UPDATE video SET titulo = ?, link = ? WHERE id = ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("ssi",$v->titulo,$v->link,$v->id);
		$ps->execute();
		$ps->store_result();
		if($ps->affected_rows > 0){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
	
	//Eliminar Video
	public function eliminarVideo($id){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "DELETE FROM video WHERE id = ?";
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
}
?>