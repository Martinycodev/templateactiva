<?php

class Servicio{
	private $id;
    private $nombre;
    private $informacion;
    private $horario;
	private $telefono;
	private $maps;
	private $imagen;
	private $direccion;

    private $db;

    public function __construct() {
		$this->db = Database::connect();
    }
    
    function getId() {
		return $this->id;
	}
	function setId($id) {
		$this->id = $id;
	}
	function getNombre() {
		return $this->nombre;
	}
	function setNombre($nombre) {
		$this->nombre = $nombre;
	}
	function getInformacion() {
		return $this->informacion;
	}
	function setInformacion($informacion) {
		$this->informacion = $informacion;
    }
    function getHorario() {
		return $this->horario;
	}
	function setHorario($horario) {
		$this->horario = $horario;
	}
	function getTelefono() {
		return $this->telefono;
	}
	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}
	function getMaps() {
		return $this->maps;
	}
	function setMaps($maps) {
		$this->maps = $maps;
    }
    function getImagen() {
		return $this->imagen;
	}
	function setImagen($imagen) {
		$this->imagen = $imagen;
	}
	function getDireccion() {
		return $this->direccion;
	}
	function setDireccion($direccion) {
		$this->direccion = $direccion;
	}
	function getPrioridad() {
		return $this->prioridad;
	}
	function setPrioridad($prioridad) {
		$this->prioridad = $prioridad;
	}

	public function save(){
		$result=false;

		$sql = "INSERT INTO servicios_publicos VALUES
		(NULL,
		'{$this->getNombre()}',
		'{$this->getInformacion()}',
		'{$this->getHorario()}', 
		{$this->getTelefono()}, 
		'{$this->getMaps()}', 
		'{$this->getImagen()}',
		'{$this->getDireccion()}',
		{$this->getPrioridad()}
		)";
	
	
		$save = $this->db->query($sql);
		
		if($save){
			$result=true;
		}
		return $result;
	}

	public function edit(){
		$result=false;

		$sql = "UPDATE `servicios_publicos` SET `nombre` =
		'{$this->getNombre()}', 
		`telefono` =
		{$this->getTelefono()},
		`informacion` = 
		'{$this->getInformacion()}',
		`maps` = 
		'{$this->getMaps()}', 
		`horario` =
		'{$this->getHorario()}',
		`direccion` =
		'{$this->getDireccion()}',
		`prioridad` =
		{$this->getPrioridad()}
		";
		if($this->getImagen() != null){
			$sql .= ", `imagen`='{$this->getImagen()}'";
		}
		$sql.=" WHERE `id` = {$this->id};";
	
		$edit = $this->db->query($sql);
		
		if($edit){
			$result=true;
		}
		return $result;
	}
	
	public function delete(){
		$result = false;
		$sql = "DELETE FROM servicios_publicos WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		
		if($delete){
			$result = true;
		}
		return $result;
	}

    public function getAll(){
        $sql="SELECT * FROM servicios_publicos ORDER BY prioridad,nombre ASC";
    

		$servicios = $this->db->query($sql);
		return $servicios;
    }
    
    public function getOne(){
		$servicio = $this->db->query("SELECT * FROM servicios_publicos WHERE id = {$this->getId()};");
		return $servicio->fetch_object();
	}

	public function getSearch($string){
		$sql= "SELECT * FROM servicios_publicos WHERE  nombre  like '%$string%'  ORDER BY prioridad,nombre";

		$servicios = $this->db->query($sql);
		return $servicios;
	}
	
	public function getCount(){
		
        $sql="SELECT count(id) as cantidad FROM servicios_publicos";
		
		
		$cantidad = $this->db->query($sql);

		$cantidades=$cantidad->fetch_object();
        $cantidad=$cantidades->cantidad;
		
		
		return $cantidad;
    }

}

?>