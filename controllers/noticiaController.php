<?php
require_once 'models/noticia.php';

class noticiaController{
    
    public function buscador(){

        require_once 'views/noticia/buscador.php';

    }
    public function recientes(){

        require_once 'views/noticia/recientes.php';
    }
    public function noticias(){
                $noticia = new Noticia();
                $noticias = $noticia->getLast();
        
                echo"<div class='container' style='text-align:center'>";
                
                require_once 'views/noticia/noticias.php';
                echo "</div>";
        
             
    }

    public function hemeroteca(){
        if (isset($_GET["buscar"])) {
            if($_GET["buscar"] != ""){
                $buscar = $_GET["buscar"];
                $noticia = new Noticia();
                $noticias = $noticia->getSearch($buscar);
                echo"<div class='container' style='text-align:center'><br><h3>Resultados de : ".$buscar."</h3>";
                require_once 'views/noticia/hemeroteca.php';
                echo "</div>";
        
            }else{
                $page=0;
                if(isset($_GET["page"])){
                    $page=$_GET["page"];
                }

                $noticia = new Noticia();
                $paginas = $noticia->getPages();
                $paginas=$paginas->fetch_object();
                $paginas=$paginas->cantidad;
                

                $noticias = $noticia->getPag($page);
                echo"<div class='container' style='text-align:center'>";
                
                require_once 'views/noticia/hemeroteca.php';
                echo "</div>";
            }
        }else{
            $page=0;
                if(isset($_GET["page"])){
                    $page=$_GET["page"];
                }
            $noticia = new Noticia();
            $paginas = $noticia->getPages();
            $paginas=$paginas->fetch_object();
            $paginas=$paginas->cantidad;
            
            $noticias = $noticia->getPag($page);
            echo"<div class='container' style='text-align:center'>";
            
            require_once 'views/noticia/hemeroteca.php';
            echo "</div>";
        }
        
             
    }

    public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$noticia = new Noticia();
			$noticia->setId($id);
			
            $not = $noticia->getOne();

		}
		require_once 'views/noticia/ver.php';
	}

//---------Cosas de Admin----------------------------------------------
public function gestion(){
    Utils::isAdmin();
    $noticia= new Noticia();
    $noticias = $noticia->getAll();

    require_once 'views/noticia/gestion.php';
}   

public function crear(){
    Utils::isAdmin();
    require_once 'views/noticia/crear.php';
}

public function editar(){
    Utils::isAdmin();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $edit = true;
        
        $noticia = new Noticia();
        $noticia->setId($id);
        
        $not = $noticia->getOne();
        
        
        require_once 'views/noticia/crear.php';
        
    }else{
        header('Location:'.base_url.'noticia/gestion');
        ob_end_flush();
    }
}
public function eliminar(){
    Utils::isAdmin();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $noticia = new Noticia();
        $noticia->setId($id);
        
        $delete = $noticia->delete();
        if($delete){
            $_SESSION['delete'] = 'complete';
        }else{
            $_SESSION['delete'] = 'failed';
        }
    }else{
        $_SESSION['delete'] = 'failed';
    }
    
    header('Location:'.base_url.'noticia/gestion');
    ob_end_flush();
}

//gestionar esto
public function save(){
    Utils::isAdmin();

    if(isset($_POST)){

        $titulo= isset($_POST['titulo']) ? $_POST['titulo'] : false;    
        $cuerpo= isset($_POST['cuerpo']) ? $_POST['cuerpo'] : false;    
        $maps= isset($_POST['maps']) ? $_POST['maps'] : false;            
        $fecha_fin= isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : false;    
        $fecha_inicio= isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : false;    
          
        if($titulo && $fecha_inicio){
            $noticia = new Noticia();
            
            $noticia->setTitulo($titulo);
            $noticia->setFecha_fin($fecha_fin);
            $noticia->setFecha_inicio($fecha_inicio);
            $noticia->setCuerpo($cuerpo); 

            if(isset($_FILES['imagen'])){
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];
                if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                    if(!is_dir('assets/images/noticias')){
                        mkdir('assets/images/noticias', 0777, true);
                    }
                    $noticia->setImagen($filename);
                    move_uploaded_file($file['tmp_name'], 'assets/images/noticias/'.$filename);
                }
            }
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $noticia->setId($id);
                $edit = $noticia->edit();
            }else{
                $save = $noticia->save();
            }
            
            if(isset($save)){
                    if($save){
                        $_SESSION['save'] = "complete";
                        header("Location:".base_url."noticia/gestion");
                        ob_end_flush();
                    }else{
                        $_SESSION['save'] = "failed";
                        header("Location:".base_url."noticia/gestion");
                        ob_end_flush();
                    }
            }
            if(isset($edit)){
                if($edit){
                    $_SESSION['edit'] = "complete";
                    header("Location:".base_url."noticia/gestion");
                    ob_end_flush();
                }else{
                    $_SESSION['edit'] = "failed";
                    header("Location:".base_url."noticia/gestion");
                    ob_end_flush();
                }
            }

        }

    }  
    header("Location:".base_url."noticia/gestion");
    ob_end_flush();
}

  
}


?>