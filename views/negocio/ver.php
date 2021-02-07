<?php if (isset($neg)): ?>
<div class="container">
	
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
									<img src="<?=base_url?>assets/icons/telephone-fill-31.svg" alt="Llamar por teléfono">
								</div>
							</a>
							<?php if($neg->telefono_negocio != null && $neg->telefono_negocio != 0): ?>
										
								<a href="tel:+34<?=$neg->telefono_negocio?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/telephone-fill-21.svg" alt="Llamar por otro teléfono">
									</div>
								</a>
							<?php endif; ?>

							<?php if($neg->email != null): ?>
										
								<a href="mailto:<?=$neg->email?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/mail1.svg" alt="email">
									</div>
								</a>
										
							<?php endif; ?>

							<?php if($neg->facebook != null): ?>
										
								<a href="<?=$neg->facebook?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/facebook1.svg" alt="facebook">
									</div>
								</a>										
										
							<?php endif; ?>

							<?php if($neg->instagram != null): ?>
										
									
								<a href="<?=$neg->instagram?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/instagram1.svg" alt="instagram">
									</div>
								</a>
												
							<?php endif; ?>

							<?php if($neg->web != null): ?>
										
							<a href="<?=$neg->web?>">
								<div class="accion">
									<img src="<?=base_url?>assets/icons/web1.svg" alt="Otra red social">
								</div>
							</a>
												
							<?php endif; ?>

							<?php if($neg->maps != null): ?>
										
								<a href="<?=$neg->maps?>">
									<div class="accion">
										<img src="<?=base_url?>assets/icons/brujula1.svg" alt="Otra red social">
									</div>
								</a>			
												
							<?php endif; ?>
						

				</div>

				<?php if($neg->imagen_libre != null): ?>
								
					<div class="center" style="margin-top:10px">
						<a class="btn btn-success" data-toggle="modal" data-target="#myModal<?=$neg->id?>">
						Ver Oferta - Foto Extra
						</a>	
					</div>
					
					   <!-- The Modal -->
					   <div class="modal" id="myModal<?=$neg->id?>">
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

</div>

<?php else: ?>
	<h1>El negocio no existe</h1>
<?php endif; ?>



