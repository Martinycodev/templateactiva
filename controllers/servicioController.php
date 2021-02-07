<?php
require_once 'models/servicio.php';

class servicioController{
    
    public function buscador(){

        require_once 'views/servicio/buscador.php';

    }
    
    public function servicios(){
        if (isset($_GET["buscar"])) {
            if($_GET["buscar"] != ""){
                $buscar = $_GET["buscar"];
                $servicio = new Servicio();
                $servicios = $servicio->getSearch($buscar);
                echo"<div class='container' style='text-align:center'>";
                if(isset($buscar)){
                echo "<h2 style='margin-top:10px'>Resultados con:</h2><h3>$buscar</h3>";
                }
                require_once 'views/servicio/servicios.php';
                echo "</div>";
        
            }else{
        
                $servicio = new Servicio();
                $servicios = $servicio->getAll();
        
                echo"<div class='container' style='text-align:center'>
                <h2 style='margin-top:10px'>Todos los servicios</h2>
                ";
                
                require_once 'views/servicio/servicios.php';
                echo "</div>";
            }
        }else{
            $servicio = new Servicio();
            $servicios = $servicio->getAll();
    
            echo"<div class='container' style='text-align:center'>
            <h2 style='margin-top:10px'>Todos los servicios</h2>
            ";
            
            require_once 'views/servicio/servicios.php';
            echo "</div>";
        }
        
             
    }

    public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$servicio = new Servicio();
			$servicio->setId($id);
			
			$ser = $servicio->getOne();
			
		}
		require_once 'views/servicio/ver.php';
	}


        //---------Cosas de Admin----------------------------------------------
        public function gestion(){
            Utils::isAdmin();
            $servicio= new Servicio();
            $servicios = $servicio->getAll();
            $cantidad= $servicio->getCount();
            
            require_once 'views/servicio/gestion.php';
        }   
        public function crear(){
            Utils::isAdmin();
            require_once 'views/servicio/crear.php';
            
        }
        public function editar(){
            Utils::isAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $edit = true;
                
                $servicio = new Servicio();
                $servicio->setId($id);
                
                $ser = $servicio->getOne();
                
                
                require_once 'views/servicio/crear.php';
                
            }else{
                header('Location:'.base_url.'servicio/gestion');
                ob_end_flush();
            }
        }
        public function eliminar(){
            Utils::isAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $servicio = new Servicio();
                $servicio->setId($id);
                
                $delete = $servicio->delete();
                if($delete){
                    $_SESSION['delete'] = 'complete';
                }else{
                    $_SESSION['delete'] = 'failed';
                }
            }else{
                $_SESSION['delete'] = 'failed';
            }
            
            header('Location:'.base_url.'servicio/gestion');
            ob_end_flush();
        }
        public function save(){
            Utils::isAdmin();
    
            if(isset($_POST)){
    
                $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : false;    
                $telefono= isset($_POST['telefono']) ? $_POST['telefono'] : false;            
                $informacion= isset($_POST['informacion']) ? $_POST['informacion'] : false;    
                $maps= isset($_POST['maps']) ? $_POST['maps'] : false;   
                $direccion= isset($_POST['direccion']) ? $_POST['direccion'] : false;          
                $horario= isset($_POST['horario']) ? $_POST['horario'] : false;
                $prioridad= isset($_POST['prioridad']) ? $_POST['prioridad'] : false;     
                if (empty($_POST['telefono'])) {
                    $telefono = 0; 
                  }else{
                    $telefono = $_POST['telefono'];
                }
                if (empty($_POST['horario'])) {
                    $horario = "No disponible"; 
                  }else{
                    $horario = $_POST['horario'];
                }
                

                if($nombre ){
                    $servicio = new Servicio();
                    
                    $servicio->setNombre($nombre);
                   
                    $servicio->setTelefono($telefono);
                    $servicio->setMaps($maps);
                    $servicio->setHorario($horario);
                    $servicio->setInformacion($informacion); 
                    $servicio->setDireccion($direccion); 
                    $servicio->setPrioridad($prioridad); 
                    
                    if(isset($_FILES['imagen'])){
                        $file = $_FILES['imagen'];
                        //$filename = $file['name'];
                        $filename = preg_replace('([^A-Za-z0-9 ])', '', str_replace(" ", "",$nombre));
                        $mimetype = $file['type'];
                        if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                            if(!is_dir('assets/images/servicios')){
                                mkdir('assets/images/servicios', 0777, true);
                            }
                            $mimetypedot =  str_replace("image/", "",$file['type']);
                            $nombre_def=$filename.".".$mimetypedot;
                            $servicio->setImagen($nombre_def);
                            move_uploaded_file($file['tmp_name'], 'assets/images/servicios/'.$nombre_def);
                        }
                    }
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $servicio->setId($id);
                        
                        $edit = $servicio->edit();
                    }else{
                        $save = $servicio->save();
                    }
                    
                    if(isset($save)){
                            if($save){
                                $_SESSION['save'] = "complete";
                                header("Location:".base_url."servicio/gestion");
                                ob_end_flush();
                            }else{
                                $_SESSION['save'] = "failed";
                                header("Location:".base_url."servicio/gestion");
                                ob_end_flush();
                            }
                    }
                    if(isset($edit)){
                        if($edit){
                            $_SESSION['edit'] = "complete";
                            header("Location:".base_url."servicio/gestion");
                            ob_end_flush();
                        }else{
                            $_SESSION['edit'] = "failed";
                            header("Location:".base_url."servicio/gestion");
                            ob_end_flush();
                        }
                    }
    
                }
    
            }  
            header("Location:".base_url."servicio/gestion");
            ob_end_flush();
        }
    }


?>