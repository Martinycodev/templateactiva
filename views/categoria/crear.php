<div class="container">

    <div class="caja">

<?php if (isset($edit) && isset($cat) && is_object($cat)): ?>
    <h3>Editar categoria " <?=$cat->nombre?> "</h3>
    <?php $url= base_url."categoria/save&id=".$cat->id;?>
<?php else: ?>
    <h3>Nueva categoria</h3>
    <?php $url= base_url."categoria/save"?>
<?php endif; ?>
    
        <form action="<?= $url?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre_categoria">Nombre del categoria*</label>
            <input  class="form-control"  name="nombre" value= "<?=isset($cat) && is_object($cat) ? $cat->nombre : ''; ?>" required></input>
        </div>
        
        <small>*Campos obligatorios</small> <br>
        <?php if (isset($edit)):?> <button type="submit" class="btn btn-info">Actualizar</button>
        <?php else: ?> <button type="submit" class="btn btn-info">Crear</button>
        <?php endif; ?>
       
        </form>
    </div>  

</div>