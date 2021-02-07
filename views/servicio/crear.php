<div class="container">

    <div class="caja">


<?php if (isset($edit) && isset($ser) && is_object($ser)): ?>
    <h3>Editar servicio " <?=$ser->nombre?> "</h3>
    <?php $url= base_url."servicio/save&id=".$ser->id;?>
<?php else: ?>
    <h3>Nuevo servicio</h3>
    <?php $url= base_url."servicio/save"?>
<?php endif; ?>
    
        <form action="<?= $url?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre del Servicio*</label>
            <textarea  class="form-control"  name="nombre" required><?=isset($ser) && is_object($ser) ? $ser->nombre : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="informacion">Informacion</label>
            <textarea  class="form-control"  name="informacion"><?=isset($ser) && is_object($ser) ? $ser->informacion : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="horario">Horario</label>
            <textarea  class="form-control"  name="horario"><?=isset($ser) && is_object($ser) ? $ser->horario : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="number" class="form-control"  name="telefono" value="<?=isset($ser) && is_object($ser) ? $ser->telefono : ''; ?>" >
        </div>
        <div class="form-group">
            <label for="maps">Direccion</label>
            <input type="text" class="form-control"  name="direccion" value="<?=isset($ser) && is_object($ser) ? $ser->direccion : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="maps">Maps</label>
            <input type="text" class="form-control"  name="maps" value="<?=isset($ser) && is_object($ser) ? $ser->maps : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Imagen del servicio</label> <?php if(isset($ser) && is_object($ser)){echo"<img src=".base_url."assets/images/servicios/".$ser->imagen." alt='imagen_servicio' style=' height: 50px;'>";}; ?>
            <input type="file" name="imagen" >
            <p class="help-block">Tiene que ser formato Jpg y no superar los 2Mb.</p>
        </div>
        <div class="form-group">
            <label for="prioridad">Prioridad* (1. Principal | 2. Recurrente | 3. Menor prioridad |4. Edificios)</label>
            <input type="number" class="form-control"  name="prioridad" value="<?=isset($ser) && is_object($ser) ? $ser->prioridad : ''; ?>" >
        </div>
        
        
       
        <small>*Campos obligatorios</small> <br>
        <?php if (isset($edit)):?> <button type="submit" class="btn btn-info">Actualizar</button>
        <?php else: ?> <button type="submit" class="btn btn-info">Crear</button>
        <?php endif; ?>
       
        </form>
    </div>  

</div>