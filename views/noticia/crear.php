<div class="container">

    <div class="caja">


            <?php if (isset($edit) && isset($not) && is_object($not)): ?>
                <h3>Editar Noticia <br>" <?=$not->titulo?> "</h3>
                <?php $url= base_url."noticia/save&id=".$not->id;?>
            <?php else: ?>
                <h3>Nueva Noticia</h3>
                <?php $url= base_url."noticia/save"?>
            <?php endif; ?>
    
        <form action="<?= $url?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo">Título*</label>
                <textarea  class="form-control"  name="titulo" required><?=isset($not) && is_object($not) ? $not->titulo : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="cuerpo">Cuerpo</label>
                <textarea  class="form-control"  name="cuerpo"><?=isset($not) && is_object($not) ? $not->cuerpo : ''; ?></textarea>
            </div>
          
            
            <div class="form-group">
                <label for="fecha_fin">Fecha Inicio*</label>
                <input type="text" class="form-control datepicker" name="fecha_inicio"  <?=isset($not) && is_object($not) ? 'value="'.$not->fecha_inicio.'"' : ''; ?> placeholder="Pincha Aquí" readonly required>
            </div>
                <div class='form-group'>
                <label for='fecha_fin'>Fecha Fin</label>
                <input type='text' class='form-control datepicker' name='fecha_fin'  value='<?=isset($not) && is_object($not) ? $not->fecha_fin : ''; ?>' placeholder="Pincha Aquí" readonly />
            </div>
          
           

            <div class="form-group">
                <label for="exampleInputFile">Imagen de la noticia</label> <?php if(isset($not) && is_object($not)){echo"<img src=".base_url."assets/images/noticias/".$not->imagen." alt='imagen_servicio' style=' height: 50px;'>";}; ?>
                <input type="file" name="imagen" >
                <p class="help-block">Tiene que ser formato Jpg y no superar los 2Mb.</p>
            </div>
            
        
            <small>*Campos obligatorios</small> <br>
            <?php if (isset($edit)):?> <button type="submit" class="btn btn-info">Actualizar</button>
            <?php else: ?> <button type="submit" class="btn btn-info">Crear</button>
            <?php endif; ?>
       
        </form>
    </div>  

</div>

