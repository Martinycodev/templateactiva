<?php

class Utils{

    public static function deleteSession($name){
        if(isset($_SESSION[$name])){

            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
        

    }

	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
            ob_end_flush();
		}else{
			return true;
		}
	}
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
            header("Location:".base_url);
            ob_end_flush();
		}else{
			return true;
		}
	}

	public static function showCategorias(){
		require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		return $categorias;
	}

	public static function showUsuarios(){
		require_once 'models/usuario.php';
		$usuario = new Usuario();
		$usuarios = $usuario->getAll();
		return $usuarios;
	}

	public static function tarjeta_negocio($neg){

		$categorias = Utils::showCategorias();
		while($cat = $categorias->fetch_object()){
			if($cat->id == $neg->id_categoria){$categoria=$cat->nombre;$catid=$cat->id;}
		}

		$tarjeta="
			<div class='negocio' >
				<div class='imagen_negocio'>";

			if($neg->imagen_negocio != null){
				$tarjeta.=" <img src='".base_url."assets/images/negocios/".$neg->imagen_negocio."' alt='foto negocio'>";
			}else{
				$tarjeta.="<img src='".base_url."assets/images/000.jpg' alt='Sin foto negocio'>";
			}

		$tarjeta.="
				</div>
			
						<div class='negocio_info'>        
							<div class='nombre_tarjeta'>
								<div class='nombre_negocio'>
									<span>". $neg->nombre_negocio." </span> 
								</div>
							</div>
							<div class='categoria_tarjeta'>
								<small>
									<a href='".base_url."categoria/ver&id=".$catid."' >".$categoria."</a>
								</small>
							</div>

						<div class='row '>     
							<div class='col horario_tarjeta' style='margin-left:10px'><span><b>Horario:</b><br>
							".
							str_replace('\r\n', '<br>', $neg->horario)."</span>
							</div>
						</div>
						<div class='row botones'>
							<div class='col'> 
								<a href='tel:+34".$neg->telefono_privado."' class='btn btn-outline-success btn_vermas'>
									<img src='".base_url."assets/icons/telephone-fill.svg' alt='Llamar por teléfono'>
								</a>
							</div>
							<div  class='col' >
								<a href='".base_url.'negocio/ver&id='.$neg->id."' class='btn btn-success btn_vermas' >
								<strong><img src='".base_url."assets/icons/plus.svg' alt='ver mas' style='width:24px'></strong>
								</a>
							</div>
						</div>
					</div>   
				</div>";

		echo $tarjeta;
	}





}