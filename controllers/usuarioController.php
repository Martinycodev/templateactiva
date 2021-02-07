<?php
require_once 'models/usuario.php';
require_once 'models/negocio.php';

class usuarioController{
	
	
	public function entrar(){
		require_once 'views/usuario/entrar.php';
	}
	public function login(){
		
		$direccion= "";
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setUser($_POST['user']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();
			
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
				$_SESSION['nombre'] = $identity->nombre;
				$direccion= "usuario/cpanel";

				
				header("Location:".base_url."usuario/cpanel");
				ob_end_flush();
				
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
					$direccion= "usuario/crud";
					
					header("Location:".base_url."home/inicio");
					ob_end_flush();
				}
				
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
				
				header("Location:".base_url."usuario/entrar");
				ob_end_flush();
			}
			
		}
		
	}	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".base_url);
		ob_end_flush();
	}

	//---- Cosas del Admin
	public function cpanel(){
		Utils::isIdentity();
		if(isset($_SESSION['admin'])){
			header("Location:".base_url."usuario/crud");
			ob_end_flush();
			
		}else{
			$id_usuario=$_SESSION['identity']->id;
			$negocio= new Negocio();
			$negocios = $negocio->getSearch_id($id_usuario);

			require_once 'views/usuario/cpanel.php';
		}
	}
	public function save(){
		Utils::isAdmin();
		
		if(isset($_POST)){
			
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$user = isset($_POST['user']) ? $_POST['user'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;	
		
				if($nombre && $user && $email && $password){
					$usuario = new Usuario();
					$usuario->setNombre($nombre);
					$usuario->setUser($user);
					$usuario->setEmail($email);
					$usuario->setPassword($password);

				}

					$save = $usuario->save();
				
				
				if(isset($save)){
					if($save=="complete"){
						$_SESSION['register'] = "complete";
					}elseif($save=="nombre"){
						$_SESSION['register'] = "nombre";
					}else{
						$_SESSION['register'] = "failed";
					}

					header("Location:".base_url."usuario/gestion?save");
					ob_end_flush();                
				
				}else{
					$_SESSION['register'] = "failed";
					header("Location:".base_url."usuario/gestion?otro");
						ob_end_flush();
				}
		}else{
			$_SESSION['register'] = "failed";
			header("Location:".base_url."usuario/gestion?otro");
					ob_end_flush();
        }
	}	
	public function edit(){
		Utils::isAdmin();

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$usuario = new Usuario();
			$usuario->setId($id);
		
		
			if(isset($_POST)){
				
				$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;	
				$email = isset($_POST['email']) ? $_POST['email'] : false;
				
			
					if($nombre  && $email){
						
						$usuario->setNombre($nombre);
						
						$usuario->setEmail($email);

					
					}

					

						$edit = $usuario->edit();
					
					
					if(isset($edit)){
						if($edit=="complete"){
							$_SESSION['register'] = "complete";

						}else{
							$_SESSION['register'] = "failed";
						}

						header("Location:".base_url."usuario/gestion");
						ob_end_flush();                
					
					}else{
						$_SESSION['register'] = "failed";
						header("Location:".base_url."usuario/gestion");
							ob_end_flush();
					}
			}else{
				$_SESSION['register'] = "failed";
				header("Location:".base_url."usuario/gestion");
						ob_end_flush();
			}
		

		}else{
			$_SESSION['register'] = "failed";
			header("Location:".base_url."usuario/gestion?otro");
					ob_end_flush();

		}
	}
	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$usuario = new Usuario();
			$usuario->setId($id);
			
			$usu = $usuario->getOne();
			
			
			require_once 'views/usuario/registro.php';
			
		}else{
			header('Location:'.base_url.'usuario/gestion');
			ob_end_flush();
		}
	}
	public function eliminar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$usuario = new Usuario();
			$usuario->setId($id);
			
			$delete = $usuario->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'usuario/gestion');
		ob_end_flush();
	}
	public function crud(){
		Utils::isAdmin();
		require_once 'views/usuario/crud.php';
	}
	public function gestion(){
		Utils::isAdmin();
		$usuario= new Usuario();
		$usuarios = $usuario->getAll();
	
		require_once 'views/usuario/gestion.php';
	} 
	public function registro(){
		Utils::isAdmin();
		require_once 'views/usuario/registro.php';
	}
	
}            

?>