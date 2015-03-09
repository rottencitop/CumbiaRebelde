<?php
class Conectar{
	private $servidor;
	private $usuario;
	private $password;
	private $database;
	
	public function __construct(){
		$this->servidor = "localhost";
		$this->usuario = "root";
		$this->password = "";
		$this->database = "cumbiarebelde";
	}
	
	public function conectar(){
		$conectar = new MySQLi($this->servidor,$this->usuario,$this->password, $this->database);
		$conectar->query("SET NAMES utf8");
		return $conectar;
	}
}
?>