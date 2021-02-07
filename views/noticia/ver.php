<?php if (isset($not)): ?>
<div class="container">
	
	<div class="caja">

		<div class="centrado" ><h1><?= $not->titulo ?></h1></div> <hr>

			<div class="imagen_negocio_ver">
									<?php if($not->imagen != null): ?>
												<img src="<?= base_url."assets/images/noticias/".$not->imagen?>" alt="foto negocio">
												<?php else: ?>
												<img src="<?= base_url?>assets/images/000.jpg" alt="Sin foto negocio">
									<?php endif; ?>
			</div> <hr>

			<div class="col">

				<div><p>
				
				<?php
				$fecha_fin=$not->fechafin;
				$fecha_ini=$not->fechainicio;
				if($fecha_fin=="" || $fecha_fin=="00/00/0000" || $fecha_fin==NULL){
					echo "Publicado el ".$fecha_ini;
				}else{
					echo "Del ".$fecha_ini." hasta el ".$fecha_fin;
				}
				?>
				
				</p></div>
				<p><?php 
				$cuerpo=nl2br($not->cuerpo);
				echo $cuerpo;
				?></p>

			</div>
		<div class="center">	<a href="<?= base_url?>noticia/hemeroteca" class="btn btn-success" style="width:70%" >Volver</a>  </div>
	</div>

	
</div>

<?php else: ?>
    <div class="container">
    
	<h1>La noticia no existe</h1>

	<a href="<?= base_url?>noticia/noticias" class="btn btn-success" style="width:70%" >Volver</a>  
    </div>
<?php endif; ?>


