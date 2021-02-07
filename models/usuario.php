<?php

class Usuario{
	private $id;
	private $nombre;
	private $user;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}
	function getNombre() {
		return $this->nombre;
	}
	function getUser() {
		return $this->user;
	}
	function getEmail() {
		return $this->email;
	}
	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}
	function getRol() {
		return $this->rol;
	}
	function setId($id) {
		$this->id = $id;
	}
	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}
	function setUser($user) {
		$this->user = $this->db->real_escape_string($user);
	}
	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}
	function setPassword($password) {
		$this->password = $password;
	}
	function setRol($rol) {
		$this->rol = $rol;
	}


	public function save(){

		$usuario = new Usuario;
		$usuarios= $usuario->getAll();

		while($usu = $usuarios->fetch_object()){
			if($usu->user == $this->getUser()){
				$result="nombre";
				goto end;
			}
		}

		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getUser()}', '{$this->getPassword()}', '{$this->getNombre()}', '{$this->getEmail()}', 'user');";
		
		$save = $this->db->query($sql);
	
		$result = "false";
		if($save){
			$result = "complete";
		}
		end:
		return $result;
	}

	public function edit(){
		$result="false";

		$sql = "UPDATE `usuarios` SET 
		`nombre` = 
		'{$this->getNombre()}',
		`email` = 
		'{$this->getEmail()}'
		";
	
		$sql.=" WHERE `id` = {$this->id};";


		$edit = $this->db->query($sql);
		
		if($edit){
			$result="complete";
		}
		end:
		return $result;
	}
	
	public function delete(){
		$sql = "DELETE FROM usuarios WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	
	public function login(){
		$result = false;
		$user = $this->user;
		$password = $this->password;
		
		// Comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE user = '$user'";
        
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
	}

	public function getAll(){
        $sql="SELECT * FROM usuarios ORDER BY id ASC";
    

		$usuarios = $this->db->query($sql);
		return $usuarios;
	}
	
	public function getOne(){
		$usuario = $this->db->query("SELECT * FROM usuarios WHERE id = {$this->getId()};");
		return $usuario->fetch_object();
	}
	
	
	
}

?>