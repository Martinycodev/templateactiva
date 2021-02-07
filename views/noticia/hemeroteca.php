<div class="caja" >

<?php if(isset($paginas)):?>

    <div class="row">
    <?php while($not=$noticias->fetch_object()): ?>
    
                    <div class="col-12 col-md-4" style="text-align:left">
                        <img src="<?= base_url."assets/images/noticias/". $not->imagen?>" alt="Foto noticia" style="width:inherit">
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
    

    <div class="centrarpagi">
        <div class="pagination" >

            <ul >
            <?php 
            if ($page>=1) {
                $atras=$page-1;
                echo "<li><a href='".base_url."/?controller=noticia&action=hemeroteca&page=$atras'>«</a></li>";
            }
            for ($i=0; $i < $paginas/6; $i++) { 
                $pagina=$i+1;
                

            
                echo" <li";
                if ($page==$i) {echo " class='active'";}
                echo"><a href='".base_url."/?controller=noticia&action=hemeroteca&page=$i'>$pagina</a></li>";
                }
                if ($page+1<$paginas/6) {
                    $adelante=$page+1;
                    echo "<li><a href='".base_url."/?controller=noticia&action=hemeroteca&page=$adelante'>»</a></li>";
                }
                ?>
                
                
            </ul>
        </div>

    </div>

    <a href="<?= base_url?>noticia/noticias" class="btn btn-success" style="width:70%" >Volver</a>  
<?php else:?>

    <?php if ($noticias->num_rows == 0): ?>
		<p>No hay noticias con la búsqueda</p>
        <a href="<?= base_url?>/noticia/noticias" class="btn btn-primary mb-4 btn-buscador">Volver al buscador</a>

	<?php else: ?>

    <div class="row">
    <?php while($not=$noticias->fetch_object()): ?>
    
                    <div class="col-12 col-md-4" style="text-align:left">

<?php   if($nto->imagen != null){
            echo"  <img src='".base_url."assets/images/noticias/". $not->imagen."' alt='Foto noticia' style='width:inherit'>";
        }else{
            echo "<img class='card-img-top img-fluid' src='".base_url."assets/images/000.jpg' alt='Sin foto negocio' style='width:inherit'>";
        } ?>

                        <h3><?= $not->titulo?></h3>
                        <small >	
                        <?php
                        $fecha_fin=$not->fechafin;
                        $fecha_ini=$not->fechainicio;
                        if($fecha_fin=="" || $fecha_fin=="00/00/0000" || $fecha_fin==NULL){
                            echo "Publicado el ".$fecha_ini."";
                        }else{
                            echo "Del ".$fecha_ini." hasta el ".$fecha_fin."";
                        }
                        ?></small>
                        <p><?= substr($not->cuerpo, 0 , 100)?>...</p>
                    <a href="<?= base_url."noticia/ver&id=".$not->id?>" class="btn btn-success">Leer más</a>
                    <hr>
                    </div>
                <?php endwhile; ?>
    </div>
    <a href="<?= base_url?>noticia/noticias" class="btn btn-success" style="width:70%" >Volver</a>  
    <?php endif;?>
                        
<?php endif; ?>


</div>