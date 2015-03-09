<?php
define(__ROOT__,dirname(dirname(__FILE__)));
require_once(__ROOT__."/clases/Banda.class.php");
require_once(__ROOT__."/clases/Imagen.class.php");
require_once(__ROOT__."/clases/Disco.class.php");
require_once(__ROOT__."/DAL/Conectar.php");
class BandaDAL{
	private $conexion;
	
	public function __construct(){
		$this->conexion = new Conectar();
	}

    public function asdf(){
        $a = $this->conexion->conectar();
        $a->query("");
    }
	
	
	//agregar banda
	public function agregarBanda($b){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "INSERT INTO banda VALUES(?,?,?)";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("sss",$b->nombre,$b->imagen,$b->biografia);
		if($ps->execute()){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
	
	//Ver todas las bandas
	public function verBandas(){
		$bandas = null;
		$mysqli = $this->conexion->conectar();
		$SQL = "SELECT * FROM banda ORDER by nombre ASC";
		$ps = $mysqli->prepare($SQL);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$bandas = array();
			$ps->bind_result($bNombre,$bImagen,$bBiografia);
			while($ps->fetch()){
				$b = new Banda();
				$b->nombre = $bNombre;
				$b->imagen = $bImagen;
				$b->biografia = $bBiografia;
				$bandas[] = $b;
			}
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $bandas;
	}
	
	//Ver banda por nombre
	public function verBanda($nombre){
		$banda = null;
		$mysqli = $this->conexion->conectar();
		$SQL = "SELECT * FROM banda WHERE nombre LIKE ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("s",$nombre);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$banda = new Banda();
			$ps->bind_result($bNombre,$bImagen,$bBiografia);
			$ps->fetch();
			$banda->nombre = $bNombre;
			$banda->imagen = $bImagen;
			$banda->biografia = $bBiografia;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $banda;
	}
	
	//Editar banda
	public function editarBanda($b){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "UPDATE banda SET nombre = ?, biografia = ? WHERE nombre LIKE ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("sss",$b->nombre,$b->biografia,$b->nombre);
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
	
	//Eliminar Banda
	public function eliminarBanda($nombre){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "DELETE FROM banda WHERE nombre LIKE ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("s",$nombre);
		if($ps->execute()){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
	
	//Ver imagenes de una banda
	public function verImagenesBanda($banda){
		$imagenes = null;
		$mysqli = $this->conexion->conectar();
		$SQL = "SELECT * FROM imagen WHERE banda LIKE ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("s",$banda);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$imagenes = array();
			$ps->bind_result($iId,$iImagen,$iBanda);
			while($ps->fetch()){
				$i = new Imagen();
				$i->id = $iId;
				$i->imagen = $iImagen;
				$i->banda = $iBanda;
				$imagenes[] = $i;
			}
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $imagenes;
	}
	
	//Agregar Imagen a Banda
	public function agregarImagenBanda($i){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "INSERT INTO imagen(imagen,banda) VALUES(?,?)";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("ss",$i->imagen,$i->banda);
		if($ps->execute()){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
	
	//Eliminar Imagen a Banda
	public function eliminarImagenBanda($id){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "DELETE FROM imagen WHERE id = ?";
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
	
	//Ver discos banda
	public function verDiscosBanda($banda){
		$discos = null;
		$mysqli = $this->conexion->conectar();
		$SQL = "SELECT * FROM disco WHERE banda LIKE ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("s",$banda);
		$ps->execute();
		$ps->store_result();
		if($ps->num_rows > 0){
			$discos = array();
			$ps->bind_result($dNombre,$dImagen,$dBanda);
			while($ps->fetch()){
				$d = new Disco();
				$d->nombre = $dNombre;
				$d->imagen = $dImagen;
				$d->banda = $dBanda;
				$discos[] = $d;
			}
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $discos;
	}
	
	//Agregar Disco a banda
	public function agregarDiscoBanda($d){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "INSERT INTO disco(nombre,imagen,banda) VALUES(?,?,?)";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("sss",$d->nombre,$d->imagen,$d->banda);
		if($ps->execute()){
			$res = true;
		}
		$ps->free_result();
		$ps->close();
		$mysqli->close();
		return $res;
	}
	
	//Eliminar Disco a Banda
	public function eliminarDiscoBanda($d){
		$res = false;
		$mysqli = $this->conexion->conectar();
		$SQL = "DELETE FROM disco WHERE nombre LIKE ? AND banda LIKE ?";
		$ps = $mysqli->prepare($SQL);
		$ps->bind_param("ss",$d->nombre,$d->banda);
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