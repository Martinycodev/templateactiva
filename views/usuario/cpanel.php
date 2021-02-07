<div id=#top></div>

<div class="container">
    <div class="caja">
		<H1>Hola <?= $_SESSION['identity']->nombre?></H1>
		
	

              <?php if(isset($_SESSION['save']) && isset($_SESSION['save'])== 'complete'): ?>
                  <strong class="alert_green"> El Negocio se ha creado correctamente</strong>
              <?php elseif(isset($_SESSION['save']) && isset($_SESSION['save'])!= 'complete'):  ?>
                  <strong class="alert_red"> El Negocio no se ha creado correctamente</strong>
              <?php endif;  Utils::deleteSession('save');?>
              <?php if(isset($_SESSION['edit']) && isset($_SESSION['edit'])== 'complete'): ?>
                  <strong class="alert_green"> El Negocio se ha actualizado correctamente</strong>
              <?php elseif(isset($_SESSION['edit']) && isset($_SESSION['edit'])!= 'complete'):  ?>
                  <strong class="alert_red"> El Negocio no se ha actualizado correctamente</strong>
              <?php endif;  Utils::deleteSession('edit');?>
              <?php if(isset($_SESSION['delete']) && isset($_SESSION['delete'])== 'complete'): ?>
                  <strong class="alert_green"> El Negocio se ha eliminado correctamente</strong>
              <?php elseif(isset($_SESSION['delete']) && isset($_SESSION['delete'])!= 'complete'):  ?>
                  <strong class="alert_red"> El Negocio no se ha eliminado correctamente</strong>
              <?php endif;  Utils::deleteSession('delete');?>
			  <hr>
			  
<?php if($negocios->num_rows == 0):?>

"No tiene negocios asignados"

<?php  else :?>  

	<?php while($neg = $negocios->fetch_object()): ?>

		
		<div class="caja" style="text-align:center">
            
              <span style="font-size:x-large">Mis Negocios</span>
			  
              <div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								
								<th class="text-left">Negocio</th>
								
								<th class="text-left">Acciones</th>

							</tr>
						</thead>
						<tbody class="table-hover">
							
							<tr>
								<td class="text-left"><?=$neg->nombre_negocio;?></td>
								
								<td class="text-left">
								
								<a href="<?=base_url?>negocio/editar&id=<?=$neg->id?>" class="btn btn-warning" style="height:20px;border-radius:5px;padding:0px 5px">Editar</a>
								<!--<a href="<?=base_url?>negocio/eliminar&id=<?=$neg->id?>" class="btn btn-danger" style="height:20px;border-radius:5px;padding:0px 5px">Eliminar</a></td>
								-->
							<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?=$neg->id?>" style="height:20px;border-radius:5px;padding:0px 5px">
								Eliminar
							</a>
							<!-- The Modal -->
								<div class="modal" id="myModal<?=$neg->id?>">
									<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<!-- Modal body -->
										<div class="modal-body">
										¿Estas seguro de que quieres eliminar de forma permanente el negocio <?=$neg->nombre_negocio;?>?
										</div>

										<!-- Modal footer -->
										<div class="modal-footer">
										<a type="button" class="btn btn-danger" href="<?=base_url?>negocio/eliminar&id=<?=$neg->id?>">Eliminar</a>
										<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
										</div>

									</div>
									</div>
								</div>

							</tr>
							
					
						</tbody>
					</table>
			  </div>
		</div>



			 

<div class="caja">
		<div class="centrado" ><h1><?= $neg->nombre_negocio ?></h1></div> <hr>

	<div class="imagen_negocio_ver">
							<?php if($neg->imagen_negocio != null): ?>
										<img src="<?= base_url."assets/images/negocios/".$neg->imagen_negocio?>" alt="foto negocio">
										<?php else: ?>
										<img src="<?= base_url?>assets/images/000.jpg" alt="Sin foto negocio">
							<?php endif; ?>
				</div> <hr>

		<div class="row">
			<div class="col-xs-12 col-md-6">

			<?php $categorias = Utils::showCategorias(); ?>
				<?php while($cat = $categorias->fetch_object()){

					if($cat->id == $neg->id_categoria){$categoria=$cat->nombre; $catid=$cat->id;}
				}?>
				<div class="center"><p><b>Categoría:</b><br><strong><a href="<?= base_url?>categoria/ver&id=<?=$catid?>"><?=$categoria?></a></strong></p><b>Contacto:</b><br></div>
				
				<div class='row justify-content-center'>
							<a href="tel:+34<?=$neg->telefono_privado?>">
								<div class="accion">
									<img src="<?=base_url?>assets/icons/telephone-fill-3.svg" alt="Llamar por teléfono">
								</div>
							</a>
							<?php if($neg->telefono_negocio != null && $neg->telefono_negocio != 0): ?>
										
								<a href="tel:+34<?=$neg->telefono_negocio?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/telephone-fill-2.svg" alt="Llamar por otro teléfono">
									</div>
								</a>
							<?php endif; ?>

							<?php if($neg->email != null): ?>
										
								<a href="mailto:<?=$neg->email?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/mail.svg" alt="email">
									</div>
								</a>
										
							<?php endif; ?>

							<?php if($neg->facebook != null): ?>
										
								<a href="<?=$neg->facebook?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/facebook.svg" alt="facebook">
									</div>
								</a>										
										
							<?php endif; ?>

							<?php if($neg->instagram != null): ?>
										
									
								<a href="<?=$neg->instagram?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/instagram.svg" alt="instagram">
									</div>
								</a>
												
							<?php endif; ?>

							<?php if($neg->web != null): ?>
										
							<a href="<?=$neg->web?>">
								<div class="accion">
									<img src="<?=base_url?>assets/icons/web.svg" alt="Otra red social">
								</div>
							</a>
												
							<?php endif; ?>

							<?php if($neg->maps != null): ?>
										
								<a href="<?=$neg->maps?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/brujula.svg" alt="Otra red social">
									</div>
								</a>			
												
							<?php endif; ?>
						

				</div>

				<?php if($neg->imagen_libre != null): ?>
								
					<div class="center" style="margin-top:10px">
						<a class="btn btn-success" data-toggle="modal" data-target="#myModal2<?=$neg->id?>">
						Ver Oferta
						</a>	
					</div>
					
					   <!-- The Modal -->
					   <div class="modal" id="myModal2<?=$neg->id?>">
                  <div class="modal-dialog modal-lg"  style="margin-top:-10px">
                    <div class="modal-content">

                      <!-- Modal body -->
                      <div class="modal-body">
                        <img src="<?= base_url?>assets/images/libres/<?=$neg->imagen_libre;?>" style="width:100%" alt="Imagen oferta">
                      </div>


                    </div>
                  </div>
                </div>
								
				<?php endif; ?>

			</div>

			<div class="col-xs-12 col-md-6">

				

				<div><p><b>Direccion:</b><br><?= $neg->direccion?></div></p>

				<p class="horario"><b>Horario:</b><br>
				<?=
				nl2br($neg->horario);
				?>
				</p>

				<p class="description"><b>Información:</b><br><?= nl2br($neg->descripcion); ?></p>
	
			</div>

	

	</div>
</div>


				<?php endwhile; ?>









<?php endif; ?>
  	
</div>

</div>

    <a href="#top">
      <div class="btn-top"> <img src="<?=base_url?>assets/icons/arrow-up.svg" alt="Icono servicios" style="width:30px"></div>
    </a>