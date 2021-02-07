<?php

require_once 'models/noticia.php';

class homeController{
    public function index(){
        require_once 'views/usuario/entrar.php';
        //require_once 'views/home/inicio.php';
    }
    public function inicio(){
      
        $noticia = new Noticia();
        $noticias = $noticia->getLast();
        require_once 'views/home/inicio.php';
    }

    public function emergencias(){
      
        require_once 'views/home/emergencias.php';
    }
    public function facebook(){
      
        require_once 'views/home/facebook.php';
    }
    
    
    public function about(){
        require_once 'views/home/about.php';
    
    }
    public function avisolegal(){
        require_once 'views/home/avisolegal.php';
    
    }

    public function infocookies(){
        require_once 'views/home/infocookies.php';
    
    }
    public function cookies(){

        $_SESSION['cookies']=true;
        header("Location:".base_url."usuario/entrar");
                        ob_end_flush();
    
    }


}


?>