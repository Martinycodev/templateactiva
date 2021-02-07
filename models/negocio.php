<?php

class Negocio{
	private $id;
	private $responsable;
	private $telefono;
	private $telefono_extra;
	private $email;
	private $nombre;
	private $direccion;
	private $id_categoria;
	private $horario;
	private $imagen_negocio;
	private $imagen_libre;
	private $facebook;
	private $instragram;
	private $web;
	private $descripcion;
	private $servicio_domicilio;
	private $etiquetas;
	private $maps;

	
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
	function getResponsable() {
		return $this->responsable;
	}
	function setResponsable($responsable) {
		$this->responsable = $responsable;
	}
	function getTelefono_negocio() {
		return $this->telefono_negocio;
	}
	function setTelefono_negocio($telefono_negocio) {
		$this->telefono_negocio = $telefono_negocio;
	}
	function getTelefono_privado() {
		return $this->telefono_privado;
	}
	function setTelefono_privado($telefono_privado) {
		$this->telefono_privado = $telefono_privado;
	}
	function getEmail() {
		return $this->email;
	}
	function setEmail($email) {
		$this->email = $email;
	}
	function getNombre_negocio() {
		return $this->nombre_negocio;
	}
	function setNombre_negocio($nombre_negocio) {
		$this->nombre_negocio = $nombre_negocio;
	}
	function getDireccion() {
		return $this->direccion;
	}
	function setDireccion($direccion) {
		$this->direccion = $direccion;
	}
	function getId_categoria() {
		return $this->id_categoria;
	}
	function setId_categoria($id_categoria) {
		$this->id_categoria = $id_categoria;
	}
	function getHorario() {
		return $this->horario;
	}
	function setHorario($horario) {
		$this->horario = $horario;
	}
	function getImagen_negocio() {
		return $this->imagen_negocio;
	}
	function setImagen_negocio($imagen_negocio) {
		$this->imagen_negocio = $imagen_negocio;
	}
	function getImagen_libre() {
		return $this->imagen_libre;
	}
	function setImagen_libre($imagen_libre) {
		$this->imagen_libre = $imagen_libre;
	}
	function getFacebook() {
		return $this->facebook;
	}
	function setFacebook($facebook) {
		$this->facebook = $facebook;
	}
	function getInstagram() {
		return $this->instagram;
	}
	function setInstagram($instagram) {
		$this->instagram = $instagram;
	}
	function getWeb() {
		return $this->web;
	}
	function setWeb($web) {
		$this->web = $web;
	}
	function getDescripcion() {
		return $this->descripcion;
	}
	function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	function getServicio_domicilio() {
		return $this->servicio_domicilio;
	}
	function setServicio_domicilio($servicio_domicilio) {
		$this->servicio_domicilio = $servicio_domicilio;
	}
	function getMaps() {
		return $this->maps;
	}
	function setMaps($maps) {
		$this->maps = $maps;
	}
	function getEtiquetas() {
		return $this->etiquetas;
	}
	function setEtiquetas($etiquetas) {
		$this->etiquetas = $etiquetas;
	}
	function getId_usuario() {
		return $this->id_usuario;
	}
	function setId_usuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	public function save(){
		$result=false;

		$sql = "INSERT INTO negocios VALUES
		(NULL,
		'{$this->getResponsable()}',
		{$this->getTelefono_negocio()},
		{$this->getTelefono_privado()}, 
		'{$this->getEmail()}', 
		'{$this->getNombre_negocio()}',
		'{$this->getDireccion()}',
		{$this->getId_categoria()},
		'{$this->getHorario()}',
		'{$this->getImagen_negocio()}',
		'{$this->getImagen_libre()}',
		'{$this->getFacebook()}',
		'{$this->getInstagram()}',
		'{$this->getWeb()}',
		'{$this->getDescripcion()}',
		'{$this->getServicio_domicilio()}',
		'{$this->getMaps()}',
		null,
		{$this->getId_usuario()})";
	
	
		$save = $this->db->query($sql);
		
		if($save){
			$result=true;
		}
		return $result;
	}

	public function edit(){
		$result=false;

		$sql = "UPDATE `negocios` SET `responsable` =
		'{$this->getResponsable()}', 
		`telefono_negocio` =
		{$this->getTelefono_negocio()},
		`telefono_privado` =
		{$this->getTelefono_privado()},
		`email` = 
		'{$this->getEmail()}', 
		`nombre_negocio` =
		'{$this->getNombre_negocio()}',
		`direccion` =
		'{$this->getDireccion()}',
		`id_categoria` =
		{$this->getId_categoria()},
		`horario` =
		'{$this->getHorario()}',
		`facebook` =
		'{$this->getFacebook()}',
		`instagram` =
		'{$this->getInstagram()}',
		`web` =
		'{$this->getWeb()}',
		`descripcion` =
		'{$this->getDescripcion()}',
		`servicio_domicilio` =
		'{$this->getServicio_domicilio()}',
		`maps` =
		'{$this->getMaps()}',
		`id_usuario` =
		{$this->getId_usuario()}";
		if($this->getImagen_negocio() != null){
			$sql .= ", `imagen_negocio`='{$this->getImagen_negocio()}'";
		}
		if($this->getImagen_libre() != null){
			$sql .= ", `imagen_libre`='{$this->getImagen_libre()}'";
		}
		$sql.=" WHERE `negocios`.`id` = {$this->id};";

		$edit = $this->db->query($sql);
		
		if($edit){
			$result=true;
		}
		return $result;
	}
	
	public function delete(){
		$sql = "DELETE FROM negocios WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}

	public function deleteimg($n){
		if ($n==1) {
			$sql = "UPDATE `negocios` SET imagen_negocio = null WHERE id={$this->id}";
		}else{
			$sql = "UPDATE `negocios` SET imagen_libre = null WHERE id={$this->id}";
		}
		
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}

	public function getAll($random){
		if ($random) {
			$negocios = $this->db->query("SELECT * FROM negocios ORDER BY RAND()");
		}else{
			$negocios = $this->db->query("SELECT * FROM negocios ORDER BY nombre_negocio ASC");
		}
		
		return $negocios;
	}

	public function getOne(){
		$negocio = $this->db->query("SELECT * FROM negocios WHERE id = {$this->getId()};");
		return $negocio->fetch_object();
	}

	public function getRandom($limit){
		$negocios = $this->db->query("SELECT * FROM negocios ORDER BY RAND() LIMIT $limit");
		return $negocios;
	}

	public function getSearch($string){
		$sql= "SELECT * FROM negocios WHERE  nombre_negocio  like '%$string%' OR descripcion like '%$string%'  ORDER BY nombre_negocio";

		$negocios = $this->db->query($sql);
		return $negocios;
	}

	public function getSearch_id($id_usuario){
		$sql= "SELECT * FROM negocios WHERE  id_usuario = $id_usuario  ORDER BY id";

		$negocios = $this->db->query($sql);
		return $negocios;
	}
	

	public function getAllCategory(){
		$sql = "SELECT n.*, c.nombre AS 'catnombre' FROM negocios n "
				. "INNER JOIN categorias c ON c.id = n.id_categoria "
				. "WHERE n.id_categoria = {$this->getId_categoria()} "
				. "ORDER BY id DESC";
		$productos = $this->db->query($sql);
		return $productos;
	}

	public function getCount(){
		
        $sql="SELECT count(id) as cantidad FROM negocios";
		
		
		$cantidad = $this->db->query($sql);

		$cantidades=$cantidad->fetch_object();
        $cantidad=$cantidades->cantidad;
		
		
		return $cantidad;
    }




}
?>