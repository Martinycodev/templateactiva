<div class="container">
<div id=#top></div>
        <?php if(isset($_SESSION['save']) && isset($_SESSION['save'])== 'complete'): ?>
            <strong class="alert_green"> La categoria se ha creado correctamente</strong>
        <?php elseif(isset($_SESSION['save']) && isset($_SESSION['save'])!= 'complete'):  ?>
            <strong class="alert_red"> La categoria no se ha creado correctamente</strong>
        <?php endif;  Utils::deleteSession('save');?>
        <?php if(isset($_SESSION['edit']) && isset($_SESSION['edit'])== 'complete'): ?>
            <strong class="alert_green"> La categoria se ha actualizado correctamente</strong>
        <?php elseif(isset($_SESSION['edit']) && isset($_SESSION['edit'])!= 'complete'):  ?>
            <strong class="alert_red"> La categoria no se ha actualizado correctamente</strong>
        <?php endif;  Utils::deleteSession('edit');?>
        <?php if(isset($_SESSION['delete']) && isset($_SESSION['delete'])== 'complete'): ?>
            <strong class="alert_green"> La categoria se ha eliminado correctamente</strong>
        <?php elseif(isset($_SESSION['delete']) && isset($_SESSION['delete'])!= 'complete'):  ?>
            <strong class="alert_red"> La categoria no se ha eliminado correctamente</strong>
        <?php endif;  Utils::deleteSession('delete');?>




    <div class="caja" style="text-align:center">
    
   
    <span style="font-size:x-large">Categorias Registrados</span><a href="<?=base_url?>categoria/crear" class="btn btn-success">NUEVA</a><br>

    <hr>
    <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-left">ID</th>
              <th class="text-left">Categoria</th>           
              <th class="text-left">Acciones</th>
            </tr>
          </thead>
          <tbody class="table-hover">
          <?php while($cat = $categorias->fetch_object()): ?>
            <tr>
              <td class="text-left"><?=$cat->id;?></td>
              <td class="text-left"><?=$cat->nombre;?></td>
              
              <td class="text-left">
              <a href="<?=base_url?>categoria/editar&id=<?=$cat->id?>" class="btn btn-warning" style="height:30px;border-radius:5px;padding:0 5px" >
              <img src="<?=base_url?>assets/icons/pencil.svg" alt="Editar">
              </a>
              <!--<a href="<?=base_url?>categoria/eliminar&id=<?=$cat->id?>" class="btn btn-danger" style="height:20px;border-radius:20px;padding:0">Eliminar</a></td>
              -->
              <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?=$cat->id?>" style="height:30px;border-radius:5px;padding:0px 5px">
              <img src="<?=base_url?>assets/icons/trash.svg" alt="Eliminar">
              </a>
              <!-- The Modal -->
              <div class="modal" id="myModal<?=$cat->id?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal body -->
                      <div class="modal-body">
                        ¿Estas seguro de que quieres eliminar de forma permanente la categoria <strong><?=$cat->nombre;?></strong>?
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <a type="button" class="btn btn-danger" href="<?=base_url?>categoria/eliminar&id=<?=$cat->id?>">Eliminar</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                      </div>

                    </div>
                  </div>
                </div>
            
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
</div>
    </div>
</div>

<a href="#top">
  <div class="btn-top"> <img src="<?=base_url?>assets/icons/arrow-up.svg" alt="Icono servicios" style="width:30px"></div>
</a>