<div id=#top></div>


    <?php if(isset($_GET['id'])){

         $categorias = Utils::showCategorias(); 
         $id= $_GET['id'];

            while($cat = $categorias->fetch_object()){

                if($cat->id == $id ){
                     echo '<h3>'.$cat->nombre.'</h3>';
                }
             }
      
    }   ?>
    <?php if ($negocios->num_rows == 0): ?>
		<p>No hay negocios para mostrar</p>
        <a href="<?= base_url?>/negocio/buscador" class="btn btn-primary mb-4 btn-buscador">Volver al buscador</a>

	<?php else: ?>

        <!--<div class="row justify-content-center">-->
        <div class="card-columns">
                    <?php while($neg=$negocios->fetch_object()): ?>
            
                 <?php $categorias = Utils::showCategorias();
		while($cat = $categorias->fetch_object()){
			if($cat->id == $neg->id_categoria){$categoria=$cat->nombre;$catid=$cat->id;}
		}

		$tarjeta="
			<div class='card' style='align-items: center;'>";
				

			if($neg->imagen_negocio != null){
				$tarjeta.="<img class='card-img-top img-fluid ' src='".base_url."assets/images/negocios/".$neg->imagen_negocio."' alt='imagen negocio' style='max-width:320px;max-height:300px;'>";
			}else{
				$tarjeta.="<img class='card-img-top img-fluid ' src='".base_url."assets/images/000.jpg' alt='Sin foto negocio' style='width:150px'>";
			}

		$tarjeta.="
			<div class='card-body' style='width:100%'>
				<h4 class='card-title'>". $neg->nombre_negocio."</h4>
					
						<small>
							<a href='".base_url."categoria/ver&id=".$catid."' >".$categoria."</a>
						</small>
					
				<p class='card-text' style='font-size:smaller'><strong>Horario:</strong><br>".nl2br($neg->horario)."</p>
				
					
						<a href='tel:+34".$neg->telefono_privado."' class='btn btn-outline-success' style='width:49%'>
							<img src='".base_url."assets/icons/telephone-fill.svg' alt='Llamar por teléfono'>
						</a>
					
					
						<a href='".base_url.'negocio/ver&id='.$neg->id."' class='btn btn-success' style='width:49%'>
						<strong><img src='".base_url."assets/icons/plus.svg' alt='ver mas' style='width:24px'></strong>
						</a>
					
				
			</div>
			</div>";

		echo $tarjeta; ?>

            <?php endwhile; ?>

        </div>

        <a href="<?= base_url?>/negocio/buscador" class="btn btn-primary mb-4 btn-buscador" >Volver</a>

	<?php endif; ?>
	
	
  <div class="btn-top"> <img src="<?=base_url?>assets/icons/arrow-up.svg" alt="Icono servicios" style="width:30px"></div>








    
