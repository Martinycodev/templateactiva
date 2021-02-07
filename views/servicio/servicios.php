<div id=#top></div>

<?php if ($servicios->num_rows == 0): ?>
<p>No hay servicios para mostrar</p>
<a href="<?= base_url?>/servicio/buscador" class="btn btn-primary mb-4 btn-buscador">Volver al buscador</a>

<?php else: ?>

<div class="card-columns">
   <?php while($ser=$servicios->fetch_object()): ?> 
   
    <?php 
	
    $tarjeta="
        <div class='card' style='align-items: center;'>";
            

        if($ser->imagen != null){
            $tarjeta.="<img class='card-img-top img-fluid' src='".base_url."assets/images/servicios/".$ser->imagen."' alt='imagen negocio' style='max-width:320px;max-height:300px;'>";
        }else{
            $tarjeta.="<img class='card-img-top img-fluid' src='".base_url."assets/images/000.jpg' alt='Sin foto negocio' style='width:150px'>";
        }

    $tarjeta.="
        <div class='card-body' style='width:100%'>
            <h4 class='card-title'>". $ser->nombre."</h4>
                
            <p class='card-text'>".str_replace('\r\n', '<br>', $ser->horario)."</p>
            
                
                    <a href='tel:+34".$ser->telefono."' class='btn btn-outline-success' style='width:49%'>
                        <img src='".base_url."assets/icons/telephone-fill.svg' alt='Llamar por teléfono'>
                    </a>
                
                    <a href='".base_url.'servicio/ver&id='.$ser->id."' class='btn btn-success' style='width:49%'>
                    <strong><img src='".base_url."assets/icons/plus.svg' alt='ver mas' style='width:24px'></strong>
                    </a>
                
            
        </div>
        </div>";

    echo $tarjeta; ?>

   <?php endwhile; ?>


   

</div>

<a href="<?= base_url?>/servicio/buscador" class="btn btn-primary mb-4 btn-buscador" >Volver</a>

<?php endif; ?>

	

  <div class="btn-top"> <img src="<?=base_url?>assets/icons/arrow-up.svg" alt="Icono servicios" style="width:30px"></div>





