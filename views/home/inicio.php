<div class="hero">
    <div class="banner">
        <div class="banner_content">
            <h1>Tu guía de negocios y servicios de Arjonilla.</h1>
            
        </div>
    </div>


</div>

<div class="container" >

    <div class="row caja" style="text-align:center; margin-top:-100px">
        <h1 style="width:100%">¿Qué necesitas?</h1>
        
        <div class="col-12 col-md-4">
            <a href="<?=base_url?>negocio/buscador" style="color:black">
                <div class="cajaCategoria center" >
                    
                    <img src="<?=base_url?>assets/icons/shop.svg" alt="Icono negocios"style="width: 30px; margin-top:15px"><br>
                    <h2>NEGOCIOS</h2>
                </div>
            </a>
        </div>
        
        <div class="col-12 col-md-4">
            <a href="<?=base_url?>servicio/buscador" style="color:black">
                <div class="cajaCategoria center" >
                    <img src="<?=base_url?>assets/icons/flag.svg" alt="Icono emergencias" style="width: 30px; margin-top:15px">
                    <h2>SERVICIOS</h2>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-4">
            <a href="<?=base_url?>home/emergencias" style="color:black">
                <div class="cajaCategoria center" >
                    <img src="<?=base_url?>assets/icons/exclamation-triangle.svg" alt="Icono emergencias" style="width: 30px; margin-top:15px">
                    <h2>SOS</h2>
                </div>
            </a>
        </div>
    </div>  

    <div class="row">    
        <div class="col-12 col-md-6">
            <a href="https://cronicadearjonilla.es/" target="_blank">
                <div class="caja cronica" >
                    <div class="cronica-content">
                        CRÓNICA</div>
                </div>
            
            </a>
        </div> 
        <div class="col-12 col-md-6">
            <a href="http://www.arjonilla.es" target="_blank">
            <div class="caja ayun" >
                    <div class="ayun-content">
                        ARJONILLA.ES</div>
                </div>
            
            </a>
        </div> 
        
    </div>

    <div class="row">

        <div class="col">
            <div class="caja center">

                <h1 style="color:#35A05C">Últimas Noticias</h1><hr>
                <div class="row">
                <?php while($not=$noticias->fetch_object()): ?>
                    <div class="col-12 col-md-4" style="text-align:left">
                        <h3><?= $not->titulo?></h3>
                        <small>	
                        <?php
                        $fecha_fin=$not->fechafin;
                        $fecha_ini=$not->fechainicio;
                        if($fecha_fin=="" || $fecha_fin=="00/00/0000" || $fecha_fin==NULL){
                            echo "Publicado el ".$fecha_ini;
                        }else{
                            echo "Del ".$fecha_ini." hasta el ".$fecha_fin;
                        }
                        ?></small>
                        <p><?= substr($not->cuerpo, 0 , 100)?>...</p>
                    <a href="<?= base_url."noticia/ver&id=".$not->id?>" class="btn btn-success">Leer más</a>
                    <hr>
                    </div>
                <?php endwhile; ?>
                
                </div>    
                <a href="<?= base_url?>/noticia/noticias" class="btn btn-success" style="width:70%" >Ir a noticias</a>   
        </div>

    </div>
</div>


<div class="row justify-content-center">   

    <div class="col-12 col-md-4 ">
        <a href="https://www.facebook.com/ayuntamiento.dearjonilla" target="_blank">
            <div class="caja rrss"  style="background-color: #3b5998; display:block; ">
            <img src="<?=base_url?>assets/icons/facebook4.svg" alt="Icono negocios"style="width: 30px; margin-top:-5px">
                    FACEBOOK

                    </div>
            
        
        </a>
    </div> 
    <div class="col-12 col-md-4">
        <a href="https://www.instagram.com/ayto_arjonilla" target="_blank" >
            <div class="caja rrss"
                     style="background: #f09433; 
                    background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
                    background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
                    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );">
                <img src="<?=base_url?>assets/icons/instagram4.svg" alt="Icono negocios"style="width: 30px; margin-top:-5px">
                    INSTAGRAM
                
            </div>
        </a>
    </div> 

    
    <div class="col-12 col-md-4 ">
        <a href="https://www.youtube.com/channel/UCYwU24zEA1Vfk6_1Nv6zI0w" target="_blank">
            <div class="caja rrss"  style="background-color: #c4302b; display:block;  ">
            <img src="<?=base_url?>assets/icons/youtube4.svg" alt="Icono negocios"style="width: 30px; margin-top:-5px">
                    YOUTUBE

                    </div>
            
        
        </a>
    </div> 
    
</div>

    <div class="caja deco"></div>

</div>

