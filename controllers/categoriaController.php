<?php

require_once 'models/categoria.php';
require_once 'models/negocio.php';

class categoriaController{
	
	public function listar(){
		
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		echo"<div class='container' style='text-align:center'>";
		require_once 'views/categoria/lista.php';
		echo"</div>";
	}
	
	public function gestion(){
		Utils::isAdmin();
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		
		require_once 'views/categoria/gestion.php';
		
	}

	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir negocios;
			$negocio = new Negocio();
			$negocio->setId_categoria($id);
			$negocios = $negocio->getAllCategory();

			
		}
		echo"<div class='container' style='text-align:center'>";
		require_once 'views/negocio/negocios.php';
		echo"</div>";
	}
	
	public function crear(){

		require_once 'views/categoria/crear.php';
			
	}

	public function editar(){
        Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$categoria = new Categoria();
			$categoria->setId($id);
			
            $cat = $categoria->getOne();
            
			require_once 'views/categoria/crear.php';
			
		}else{
            header('Location:'.base_url.'categoria/gestion');
            ob_end_flush();
        }
	}
	
	public function eliminar(){
        Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$categoria = new Categoria();
			$categoria->setId($id);
			
            $cat = $categoria->delete();
			
		}else{
            header('Location:'.base_url.'categoria/gestion');
            ob_end_flush();
        }
    }
	
	public function save(){
		Utils::isAdmin();
	    if(isset($_POST) && isset($_POST['nombre'])){
			// Guardar la categoria en bd
			$categoria = new Categoria();
			$categoria->setNombre($_POST['nombre']);

			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$categoria->setId($id);
				
				$edit = $categoria->edit();
			}else{
				$save = $categoria->save();
			}
			
		
		
		
		
		
		
		
		
		
		
		
		}
		header("Location:".base_url."categoria/gestion");
	}
	
}