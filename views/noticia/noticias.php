<div class="row">
    <div class="col-12 col-sm-6">
        <div class="caja  buscador-noticias">   
            <form action="<?= base_url?>" method="get">
                <h4>Buscar Noticias</h4>
                <input type="text" class="form-control buscador" name="controller" value="noticia" hidden/>
                <input type="text" class="form-control buscador" name="action" value="hemeroteca" hidden/>
                <input type="text" name="buscar" class="form-control" placeholder="¿Qué estas buscando?"><br>
                <input type="submit" class="btn btn-primary" value="Buscar"> <a href="<?= base_url?>noticia/hemeroteca" class="btn btn-success">Ver todas</a>
            </form>
        </div>
       

    </div>
    <div class="col-12 col-sm-6">
        <div class="caja" overflow:scroll>   
             <h4>El tiempo</h4>
            <div style="margin-left:-290px">
                <div id="c_3d2c4772538683e04c7bba76065efcde" class="ancho" ></div><script type="text/javascript" src="https://www.eltiempo.es/widget/widget_loader/3d2c4772538683e04c7bba76065efcde"></script>
            </div>
        </div>
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
                <a href="<?= base_url?>noticia/hemeroteca" class="btn btn-success" style="width:70%" >Ver hemeroteca</a>   
        </div>

        </div>
    </div>

    <div class="caja" overflow:scroll style="background-size:120px; background-image:url(<?= base_url?>/assets/images/bg-facebook.jpg)">
        <div >
            <div class="fb-page" data-href="https://www.facebook.com/ayuntamiento.dearjonilla" data-tabs="timeline" data-width="500" data-height="700" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ayuntamiento.dearjonilla" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ayuntamiento.dearjonilla">Ayuntamiento de Arjonilla</a></blockquote></div>
        
        </div>
    </div>
    
</div>
   
    
