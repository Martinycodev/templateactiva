<?php 

if(isset($_SESSION['admin']) || isset($_SESSION['identity'])){
    header("Location:".base_url."home/inicio");
    ob_end_flush();
}
?>

<div class="hero" >
        <div class="banner">
            <div class="banner_content">
                <h1>Tu guía de negocios y servicios de Arjonilla.</h1>
            </div>
        </div>
</div>
<div class="container">
 


    </div>


    <div class="row justify-content-center">
        <div class="col-md-6">


        <div class="caja" style="margin-top:-120px">
                
                <form action="<?=base_url?>usuario/login" method="POST">
                <div class="center"><h4>Acceso usuarios</h4></div>
                <?php if(isset($_SESSION['error_login'])): ?>
                    <strong class="alert_red"> Usuario y contraseña incorrectos.</strong>
                <?php 
                unset($_SESSION['error_login']);
                endif; ?>
                    <div class="form-group">
                        <label for="user">Usuario</label>
                        <input type="text" class="form-control" name="user" id="user" placeholder="Usuario">
                       
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary"  style="width:100%">Entrar</button>
                </form>
    
    
    
                </div>



            <div class="caja"  style="font-size:large; text-align:center">
            ¿Tienes una <strong>empresa</strong> en <u>Arjonilla</u>?
            </br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfS90Lj3nLv9jZT3ThiH6s1AzW4S3u8JRX0mqxCbUoHRc5tRg/viewform?usp=sf_link"
            class="btn btn-success" style="width:100%"
            >Regístrate</a>
            </div>
            

        </div>

    </div>
</div>