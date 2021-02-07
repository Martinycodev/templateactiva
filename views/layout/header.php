<!doctype html>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#75be75">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#75be75">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#75be75">

    <title>Activ@rjonilla</title>
    <meta name="description"
    content="Activ@rjonilla es la guía de comercio, negocios, empresas y servicios públicos de Arjonilla. También se puede informar de las noticias y acceder a los servicios telemáticos que ofrece Arjonilla">
    <link rel="canonical" href="https://activarjonilla.com">
  


    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Datepicker Custom CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Modal CSS -->

    <!-- style CSS -->
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
    <!-- favicon -->
    <link rel="icon" href="<?=base_url?>favicon.png" sizes="32x32" type="image/png">


  </head>
  <body id="body">
  <div class="overlay"></div>
<!-- Codigo para facebook-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v9.0" nonce="q9v6ndws"></script>

<!-- ||||||||||||||||||||||||||||||||||||||||||||||-->


<?php if(!isset($_SESSION['cookies'])): ?>
  <div class="cookies center" id="cajacookies"> Utilizamos cookies para ofrecer una mejor experiencia de navegación. Si continúa navegando, consideramos que acepta su uso. 
      <button  id="cookies" class="btn btn-info" style="margin-left:20px"> Ok</button>
      <a href="<?=base_url?>home/infocookies" class="btn btn-outline-info">+info</a>
    </div>
    <script>   
        document.getElementById('cookies').addEventListener("click", cookies)
        function cookies(){
        document.getElementById('cajacookies').style.display = 'none';    
        }
        </script>
<?php $_SESSION['cookies']=true; endif; ?>

       




<?php if(isset($_SESSION['identity'])): ?>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div id="dismiss">
                <i> <img src="<?=base_url?>assets/icons/text-right.svg" alt="Cerrar panel"></i>
            </div>

            <div class="sidebar-header">
                <img src="<?=base_url?>assets/images/logo_mini.png" style="height:80px" alt="logo mini">
                <h3 style="margin-top:17px">Activ@rjonilla</h3>
            </div>

            <ul class="list-unstyled components">
                
                <li class="active">
                <a href="<?=base_url?>home/inicio"><img src="<?=base_url?>assets/icons/house.svg" alt="Icono negocios"> &nbsp&nbsp Inicio</a>
                    
                </li>
                <li>
                    <a href="<?=base_url?>negocio/buscador"> <img src="<?=base_url?>assets/icons/shop.svg" alt="Icono negocios">&nbsp&nbsp Negocios y Empresas</a>
                    
                </li>
                <li>
                    <a href="<?=base_url?>servicio/buscador"> <img src="<?=base_url?>assets/icons/flag.svg" alt="Icono negocios">&nbsp&nbsp Servicios Públicos</a>
                    
                </li>
                <li>
                    <a href="<?=base_url?>noticia/noticias"><img src="<?=base_url?>assets/icons/file-text.svg" alt="Icono negocios"> &nbsp&nbsp Noticias</a>
                </li>
                
            </ul>

            <div style="margin-left:20px">
            <br><a href="https://arjonilla.sedelectronica.es/" class="btn btn-primary boton_sede" style="width:210px;">Sede Electrónica</a><br>
                <?php if(!isset($_SESSION['identity'])): ?>
                <br><a href="<?=base_url?>usuario/entrar" class="btn btn-success" style="width:210px;">Entrar</a>
                <?php else: ; ?>
                <br><a href="<?=base_url?>usuario/cpanel" class="btn btn-primary" style="width:210px;">Panel de usuario</a>
                <?php endif; ?>
                
            

            </div>
        </nav>

<?php endif; ?>

        <!-- Page Content Holder -->
        

        <div class="logo">
                <a href="<?=base_url?>">

                    <picture>
                        <source srcset='<?=base_url?>assets/images/logo_grande.png' media='(min-width: 768px)' />
                        <source srcset='<?=base_url?>assets/images/logo_medio.png' media='(min-width: 360px)' />
                        <img src='<?=base_url?>assets/images/logo_mini.png' />
                    </picture>

                </a>
        </div>

        <nav class="navbar navbar-expand-lg navegador" >

                
                
<?php if(isset($_SESSION['identity'])): ?>
                
            <div class="boton_abrir">
                    <button type="button" id="sidebarCollapse" class="btn boton_abrir">
                        <i><img src="<?=base_url?>assets/icons/text-left.svg" alt="Abrir panel"></i> 
                    </button>
            </div>

            <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav mx-auto">
                        <li class="nav-item active"><a class="nav-link" href="<?=base_url?>home/inicio">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url?>negocio/buscador">Negocios y Empresas</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url?>servicio/buscador">Servicios Públicos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url?>noticia/noticias">Noticias</a></li>
                        <li class="nav-item"><a class="nav-link boton_sede" href="https://arjonilla.sedelectronica.es/" style="border:1px solid #ccc;border-radius:10px">Sede electrónica</a></li>
                    </ul>
                    
            </div>
                <?php 
                if(isset($_SESSION['identity'])){
                    echo" <div class='botonsalir'>
                            <a href='".base_url."usuario/logout' type='button' id='sidebarCollapse' class='btn boton_logout' >
                                 <i><img src='".base_url."assets/icons/arrow-bar-right.svg' alt='Cerrar sesión'></i> 
                            </a>
                            </div>";
                }
                ?>
                

            <?php endif; ?>
        </nav>
    </div><!-- wraper Holder -->
  
   

        