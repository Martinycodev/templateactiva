<div class="container">

    <div class="caja">


<?php if (isset($edit) && isset($neg) && is_object($neg)): ?>
    <h3>Editar Negocio <br>" <?=$neg->nombre_negocio?> "</h3>
    <?php $url= base_url."negocio/save&id=".$neg->id;?>
<?php else: ?>
    <h3>Nuevo Negocio</h3>
    <?php $url= base_url."negocio/save"?>
<?php endif; ?>
    
        <form action="<?= $url?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre_negocio">Nombre del Negocio*</label>
            <textarea  class="form-control"  name="nombre_negocio" required><?=isset($neg) && is_object($neg) ? $neg->nombre_negocio : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="id_categoria">Categoria*</label>
            <?php $categorias = Utils::showCategorias(); ?>
            <select class= "form-control" name="id_categoria">
                <?php while($cat = $categorias->fetch_object()): ?>
                    <option value="<?=$cat->id;?>" <?=isset($neg) && is_object($neg) && $cat->id == $neg->id_categoria? "selected" : ''; ?>><?=$cat->id;?> . <?=$cat->nombre;?></option>
                <?php endwhile; ?>
            </select>    
        </div>
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <textarea  class="form-control"  name="direccion"><?=isset($neg) && is_object($neg) ? $neg->direccion : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="maps">Google Maps</label>
            <input type="text" class="form-control"  name="maps" value="<?=isset($neg) && is_object($neg) ? $neg->maps : ''; ?>">
        </div>
        <div class="form-group">
            <label for="responsable">Nombre Responsable*</label>
            <input type="text" class="form-control"  name="responsable" value="<?=isset($neg) && is_object($neg) ? $neg->responsable : ''; ?>" required> 
        </div>
        <div class="form-group">
            <label for="telefono_privado">Telefono 1*</label>
            <input type="number" class="form-control"  name="telefono_privado" value="<?=isset($neg) && is_object($neg) ? $neg->telefono_privado : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="telefono_negocio">Telefono 2</label>
            <input type="number" class="form-control"  name="telefono_negocio" value="<?=isset($neg) && is_object($neg) ? $neg->telefono_negocio : ''; ?>">
        </div>
        <div class="form-group">
            <label for="horario">Horario</label>
            <textarea type="text" class="form-control"  name="horario"><?=isset($neg) && is_object($neg) ? $neg->horario : ''; ?></textarea>
        </div>
        <div class="form-group">
        
            <label for="servicio_domicilio">Servicio a Domicilio </label></br>
            <label class="radio-inline">
            
            <input type="radio" name="servicio_domicilio" id="inlineRadio1" value="SI"  
            <?=isset($neg) && is_object($neg) && $neg->servicio_domicilio == "SI" ? "checked" : ""; ?> > SI
            </label>
            <label class="radio-inline">
            <input type="radio" name="servicio_domicilio" id="inlineRadio2" value="NO" 
            <?=isset($neg) && is_object($neg) && $neg->servicio_domicilio == "NO" ? "checked" : ""; ?> > NO
            </label>
        </div>
            
        <div class="form-group">
            <label for="exampleInputFile">Imagen del Negocio</label> <?php if(isset($neg) && is_object($neg)){echo"<img src=".base_url."assets/images/negocios/".$neg->imagen_negocio." alt='imagen_negocio' style=' height: 50px;'>";}; ?>
            <a href='<?=base_url."negocio/borrar&id=".$neg->id."&n=1";?>'  class="btn btn-danger"><img src="<?=base_url?>assets/icons/trash.svg" alt="Eliminar"></a>
            <small><i>( <img src="<?=base_url?>assets/icons/exclamation-triangle.svg" alt="Alerta"> Al borrar se reinicia la página)</i></small>
            <br><br><input type="file" name="imagen_negocio" id='negocio'>
            <p>
              
            exclamation-triangle
            <small><i>Tiene que ser formato Jpg y no superar los 2Mb.</i></small>
            
            </p>
        </div>
      



        
        <div class="form-group">
            <label for="exampleInputFile">Imagen libre </label><?php if(isset($neg) && is_object($neg)){echo"<img src=".base_url."assets/images/libres/".$neg->imagen_libre." alt='imagen_libre' style=' height: 50px;'>";}; ?>
            <a href='<?=base_url."negocio/borrar&id=".$neg->id."&n=2";?>'  class="btn btn-danger"><img src="<?=base_url?>assets/icons/trash.svg" alt="Eliminar"></a>
            <small><i>( <img src="<?=base_url?>assets/icons/exclamation-triangle.svg" alt="Alerta"> Al borrar se reinicia la página)</i></small>
            <br><br><input type="file" name="imagen_libre">
            <p>
           
            <small><i>Tiene que ser formato Jpg y no superar los 2Mb.</i></small>
            
            </p>
        </div>
        <div class="form-group">
            <label for="email">Em@il</label>
            <input type="email" class="form-control"  name="email" value="<?=isset($neg) && is_object($neg) ? $neg->email : ''; ?>">
        </div>
        <div class="form-group">
            <label for="web">Web</label>
            <input type="text" class="form-control"  name="web" value="<?=isset($neg) && is_object($neg) ? $neg->web : ''; ?>">
        </div>
        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control"  name="facebook" value="<?=isset($neg) && is_object($neg) ? $neg->facebook : ''; ?>">
        </div>
        <div class="form-group">
            <label for="instagram">Red Social</label>
            <input type="text" class="form-control"  name="instagram" value="<?=isset($neg) && is_object($neg) ? $neg->instagram : ''; ?>">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea class="form-control"  name="descripcion"><?=isset($neg) && is_object($neg) ? $neg->descripcion : ''; ?></textarea>
        </div>


        <div class="form-group">
        <?php if($rol=="admin") {echo "<label for='id_usuario' >Usuario Responsable*</label>";}?>
            <?php $usuarios = Utils::showUsuarios(); ?>
            <select class= "form-control" name="id_usuario" <?php if($rol!="admin") {echo"hidden";}?>>
                <?php while($usu = $usuarios->fetch_object()): ?>
                    <option value="<?=$usu->id;?>" <?=isset($neg) && is_object($neg) && $usu->id == $neg->id_usuario? "selected" : ''; ?> >
                    <?=$usu->nombre;?> . <?=$usu->id;?></option>
                <?php endwhile; ?>
            </select>    
        </div>

        

        <small>*Campos obligatorios</small> <br>
        <?php if (isset($edit)):?> <button type="submit" class="btn btn-info">Actualizar</button>
        <?php else: ?> <button type="submit" class="btn btn-info">Crear</button>
        <?php endif; ?>
       
        </form>
    </div>  

</div>