<?php if (isset($ser)): ?>
<div class="container">
		
	<div class="caja">

	<div class="centrado" ><h1><?= $ser->nombre?></h1></div> <hr>
		<div class="row">
			<div class="col-12 col-sm-6 ">

				<div class=imagen_ver >
							<?php if($ser->imagen != null): ?>
										<img src="<?= base_url."assets/images/servicios/".$ser->imagen?>" alt="foto negocio">
										<?php else: ?>
										<img src="<?= base_url?>assets/images/000.jpg" alt="Sin foto negocio">
							<?php endif; ?>
				</div>

			</div>

			<div class="col-12 col-sm-6 center">

				<div>
				<p ><b>Direccion:</b><br><a href="<?= $ser->maps ?>"><?= $ser->direccion ?></a></p>

				<p><b>Información:</b><br><?= nl2br($ser->informacion)?></div></p>

				<p class="horario"><b>Horario:</b><br>  <?=
				nl2br($ser->horario);

				?></p>
				<?php if($ser->telefono !=0): ?>
				<p ><b>Teléfono:</b><a href="tel:+34<?= $ser->telefono ?>"><br><?= $ser->telefono ?></a></p>
				<?php endif; ?>
	
			</div>

	
	
		</div>

	</div>

</div>

<?php else: ?>
	<h1>El servicio no existe</h1>
<?php endif; ?>



