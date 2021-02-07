<?php
require_once 'models/negocio.php';
require_once 'models/categoria.php';

class negocioController{
    
    public function buscador(){
        
        //Renderizar vista
        echo "<div class='container' style='text-align:center'>";
        require_once 'views/negocio/buscador.php';
        $negocio = new Negocio();
        $negocios = $negocio->getRandom(3);
		require_once 'views/negocio/random.php';
        echo"</div>";

    }
    public function negocios(){
        
        if (isset($_GET["buscar"])) {
            if($_GET["buscar"] != ""){
                $buscar = $_GET["buscar"];
                $negocio = new Negocio();
                $negocios = $negocio->getSearch($buscar);
                echo"<div class='container' style='text-align:center'>";
                if(isset($buscar)){
                echo "<h2 style='margin-top:10px'>Resultados con:</h2><h3>$buscar</h3>";
                }
                require_once 'views/negocio/negocios.php';
                echo "</div>";
        
            }else{
        
                $negocio = new Negocio();
                $negocios = $negocio->getAll(true);
        
                echo"<div class='container' style='text-align:center'>
                <h2 style='margin-top:10px'>Todos los Negocios</h2>
                ";
                
                require_once 'views/negocio/negocios.php';
                echo "</div>";
            }
        }else{
            $negocio = new Negocio();
            $negocios = $negocio->getAll(true);
    
            echo"<div class='container' style='text-align:center'>
            <h2 style='margin-top:10px'>Todos los Negocios</h2>
            ";
            
            require_once 'views/negocio/negocios.php';
            echo "</div>";
        }
        
             
    }
    public function categorias(){
        
        require_once 'views/negocio/listaCategorias.php';
    }
    public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$negocio = new Negocio();
			$negocio->setId($id);
			
			$neg = $negocio->getOne();
			
		}
		require_once 'views/negocio/ver.php';
    }
  

    //---------Cosas de Admin----------------------------------------------
    public function gestion(){
        Utils::isAdmin();
        $negocio= new Negocio();
        $negocios = $negocio->getAll(false);
        $cantidad= $negocio->getCount();

		require_once 'views/negocio/gestion.php';
    }    
    public function cpanel(){
        Utils::isIdentity();
        $id_usuario=$_SESSION['identity']->id;
        
        $negocio= new Negocio();
        $negocios = $negocio->getSearch_id($id_usuario);

		require_once 'views/negocio/cpanel.php';
    }  
    public function crear(){
        Utils::isAdmin();
        require_once 'views/negocio/crear.php';
		
    }
    public function editar(){
        Utils::isIdentity();

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$negocio = new Negocio();
			$negocio->setId($id);
            
            $rol=$_SESSION['identity']->rol;
            $neg = $negocio->getOne();
            if($_SESSION['identity']->id == $neg->id_usuario || isset($_SESSION['admin'])){
                require_once 'views/negocio/crear.php';
            }else{
                header('Location:'.base_url.'error');
                ob_end_flush();
            }
			
			
			
		}else{
            header('Location:'.base_url.'negocio/gestion');
            ob_end_flush();
        }
    }
    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
			$id = $_GET['id'];
			$negocio = new Negocio();
			$negocio->setId($id);
			
			$delete = $negocio->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
        header('Location:'.base_url.'negocio/gestion');
        ob_end_flush();
	}
    public function save(){
        Utils::isIdentity();

        if(isset($_POST)){

            $responsable= isset($_POST['responsable']) ? $_POST['responsable'] : false;    
            $telefono_privado= isset($_POST['telefono_privado']) ? $_POST['telefono_privado'] : false;            
            $nombre_negocio= isset($_POST['nombre_negocio']) ? $_POST['nombre_negocio'] : false;           
            $id_categoria= isset($_POST['id_categoria']) ? $_POST['id_categoria'] : false;    
            if (empty($_POST['telefono_negocio'])) {
                $telefono_negocio = 0; 
              }else{
                $telefono_negocio = $_POST['telefono_negocio'];
              }
            $id_usuario=$_POST['id_usuario'];
            $email=$_POST['email'];
            $direccion=$_POST['direccion'];
            $horario=$_POST['horario'];
            $facebook=$_POST['facebook'];
            $instagram=$_POST['instagram'];
            $web=$_POST['web'];
            $descripcion=$_POST['descripcion'];
            $maps=$_POST['maps'];
            $servicio_domicilio=$_POST['servicio_domicilio'];
            $id_usuario=$_POST['id_usuario'];
			
			if($responsable && $telefono_privado && $nombre_negocio && $id_categoria){
				$negocio = new Negocio();
				
                $negocio->setResponsable($responsable);
                $negocio->setTelefono_negocio($telefono_negocio);
                $negocio->setTelefono_privado($telefono_privado);
                $negocio->setEmail($email);
                $negocio->setNombre_negocio($nombre_negocio);
                $negocio->setDireccion($direccion); 
                $negocio->setId_categoria($id_categoria);
                $negocio->setHorario($horario);
                $negocio->setFacebook($facebook);  
                $negocio->setInstagram($instagram);
                $negocio->setWeb($web);
                $negocio->setDescripcion($descripcion);
                $negocio->setServicio_domicilio($servicio_domicilio);
                $negocio->setMaps($maps);   
                $negocio->setId_usuario($id_usuario);

                
                if(isset($_FILES['imagen_negocio'])){
                    $file = $_FILES['imagen_negocio'];
                    //$filename = $file['name'];
                    $filename = preg_replace('([^A-Za-z0-9 ])', '', str_replace(" ", "",$nombre_negocio));

                    $mimetype = $file['type'];
                    if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                        if(!is_dir('assets/images/negocios')){
                            mkdir('assets/images/negocios', 0777, true);
                        }
                        $mimetypedot =  str_replace("image/", "",$file['type']);
                        $nombre_def=$filename.".".$mimetypedot;
                        $negocio->setImagen_negocio($nombre_def);
                        move_uploaded_file($file['tmp_name'], 'assets/images/negocios/'.$nombre_def);
                    }
                }
                if(isset($_FILES['imagen_libre'])){
                    $file2 = $_FILES['imagen_libre'];
                    $filename = preg_replace('([^A-Za-z0-9 ])', '', str_replace(" ", "",$nombre_negocio));
                    $mimetype = $file2['type'];
                    if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                        if(!is_dir('assets/images/libres')){
                            mkdir('assets/images/libres', 0777, true);
                        }
                        $mimetypedot =  str_replace("image/", "",$file2['type']);
                        $nombre_def=$filename.".".$mimetypedot;
                        $negocio->setImagen_libre($nombre_def);
                        move_uploaded_file($file2['tmp_name'], 'assets/images/libres/'.$nombre_def);
                    }
                }

                if(isset($_GET['id'])){
					$id = $_GET['id'];
					$negocio->setId($id);
					
					$edit = $negocio->edit();
				}else{
					$save = $negocio->save();
                }
                
                if(isset($save)){
                        if($save){
                            $_SESSION['save'] = "complete";
                            header("Location:".base_url."negocio/gestion");
                            ob_end_flush();
                        }else{
                            $_SESSION['save'] = "failed";
                            header("Location:".base_url."negocio/gestion");
                            ob_end_flush();
                        }
                }
                if(isset($edit)){
                    if($edit){
                        $_SESSION['edit'] = "complete";
                        header("Location:".base_url."negocio/gestion");
                        ob_end_flush();
                    }else{
                        $_SESSION['edit'] = "failed";
                        header("Location:".base_url."negocio/gestion");
                        ob_end_flush();
                    }
                }

            }

        }  
        header("Location:".base_url."negocio/gestion");
        ob_end_flush();
    }

    public function borrar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $n = $_GET['n'];
			$negocio = new Negocio();
			$negocio->setId($id);
			
            $delete = $negocio->deleteimg($n);
           
                       
            
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		$location='Location:'.base_url.'negocio/editar&id='.$id;
        header($location);
        ob_end_flush();
	}


 
    
    
    
}

?>