<?php

class Noticia{
	private $id;
    private $titulo;
    private $cuerpo;
	private $fecha_inicio;
	private $fecha_fin;
    private $imagen;

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
	function getTitulo() {
		return $this->titulo;
	}
	function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	function getCuerpo() {
		return $this->cuerpo;
	}
	function setCuerpo($cuerpo) {
		$this->cuerpo = $cuerpo;
    }
    function getFecha_inicio() {
		return $this->fecha_inicio;
	}
	function setFecha_inicio($fecha_inicio) {
		$this->fecha_inicio = $fecha_inicio;
	}
	function getFecha_fin() {
		return $this->fecha_fin;
	}
	function setFecha_fin($fecha_fin) {
		$this->fecha_fin = $fecha_fin;
	}
    function getImagen() {
		return $this->imagen;
	}
	function setImagen($imagen) {
		$this->imagen = $imagen;
    }

    
	public function save(){
		$result=false;

		$sql = "INSERT INTO noticias VALUES
		(NULL,
		'{$this->getTitulo()}',
		'{$this->getCuerpo()}',
		'{$this->getFecha_inicio()}', 
		'{$this->getFecha_fin()}', 
		'{$this->getImagen()}'
		)";
			
		$save = $this->db->query($sql);
		
		if($save){
			$result=true;
		}
		return $result;
	}

	public function edit(){
		$result=false;

		$sql = "UPDATE `noticias` SET `titulo` =
		'{$this->getTitulo()}', 
		`cuerpo` =
		'{$this->getCuerpo()}',
		`fecha_inicio` = 
		'{$this->getFecha_inicio()}',
		`fecha_fin` = 
		'{$this->getFecha_fin()}'
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
		$sql = "DELETE FROM noticias WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}

	public function getPages(){
		
        $sql="SELECT count(id) as cantidad FROM noticias";
		
	
		$noticias = $this->db->query($sql);

		
		return $noticias;
    }
    public function getAll(){
		
        $sql="SELECT *, DATE_FORMAT(fecha_fin,'%d/%m/%Y') AS fechafin, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fechainicio  FROM noticias ORDER BY fecha_inicio DESC";
		$noticias = $this->db->query($sql);
		return $noticias;
	}
	public function getPag($limite){
		$inicio=($limite*6);
		$fin=6;
        $sql="SELECT *, DATE_FORMAT(fecha_fin,'%d/%m/%Y') AS fechafin, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fechainicio  FROM noticias ORDER BY fecha_inicio DESC LIMIT $inicio , $fin";
		
	
		$noticias = $this->db->query($sql);
		return $noticias;
    }
    
    public function getOne(){
		$noticia = $this->db->query("SELECT *, DATE_FORMAT(fecha_fin,'%d/%m/%Y') AS fechafin, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fechainicio  FROM noticias WHERE id = {$this->getId()};");
		return $noticia->fetch_object();
	}

	public function getSearch($string){
		$sql= "SELECT *, DATE_FORMAT(fecha_fin,'%d/%m/%Y') AS fechafin, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fechainicio  FROM noticias WHERE  titulo  like '%$string%'  ORDER BY fecha_inicio";

		$noticias = $this->db->query($sql);
		return $noticias;
	}

	public function getLast(){
		$sql="SELECT *, DATE_FORMAT(fecha_fin,'%d/%m/%Y') AS fechafin, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fechainicio  FROM noticias ORDER BY fecha_inicio DESC LIMIT 3";
		$noticias = $this->db->query($sql);
		
		return $noticias;
		
	}

}
?>