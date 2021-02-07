<div class="container">
  <div id=#top></div>
    <div class="caja" style="text-align:center">
  

        <span style="font-size:x-large">Noticias Registradas</span><a href="<?=base_url?>noticia/crear" class="btn btn-success" > NUEVO</a><br>

        <?php if(isset($_SESSION['save']) && isset($_SESSION['save'])== 'complete'): ?>
            <strong class="alert_green"> La Noticia se ha creado correctamente</strong>
        <?php elseif(isset($_SESSION['save']) && isset($_SESSION['save'])!= 'complete'):  ?>
            <strong class="alert_red"> La Noticia no se ha creado correctamente</strong>
        <?php endif;  Utils::deleteSession('save');?>
        <?php if(isset($_SESSION['edit']) && isset($_SESSION['edit'])== 'complete'): ?>
            <strong class="alert_green"> La Noticia se ha actualizado correctamente</strong>
        <?php elseif(isset($_SESSION['edit']) && isset($_SESSION['edit'])!= 'complete'):  ?>
            <strong class="alert_red"> La Noticia no se ha actualizado correctamente</strong>
        <?php endif;  Utils::deleteSession('edit');?>
        <?php if(isset($_SESSION['delete']) && isset($_SESSION['delete'])== 'complete'): ?>
            <strong class="alert_green"> La Noticia se ha eliminado correctamente</strong>
        <?php elseif(isset($_SESSION['delete']) && isset($_SESSION['delete'])!= 'complete'):  ?>
            <strong class="alert_red"> La Noticia no se ha eliminado correctamente</strong>
        <?php endif;  Utils::deleteSession('delete');?>

        <hr>
          <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th class="text-left">Titulo</th>
                    
                    <th class="text-left">Fecha</th>
                    
                    <th class="text-left">Acciones</th>

                  </tr>
                </thead>
                <tbody class="table-hover">
                <?php while($not = $noticias->fetch_object()): ?>
                  <tr>
                 
                    <td class="text-left"><?=$not->titulo;?></td>
                    <td class="text-left"><?=$not->fechainicio;?> - <?=$not->fechafin;?></td>
                    
                    
                    <td class="text-left">
                    <a href="<?=base_url?>noticia/ver&id=<?=$not->id?>" class="btn btn-success" style="height:30px;border-radius:5px;padding:0px 5px">
                    <img src="<?=base_url?>assets/icons/search.svg" alt="Ver mas">
                  </a>
                    <a href="<?=base_url?>noticia/editar&id=<?=$not->id?>" class="btn btn-warning" style="height:30px;border-radius:5px;padding:0px 5px">
                    <img src="<?=base_url?>assets/icons/pencil.svg" alt="Editar">
                  </a>
                    <!--<a href="<?=base_url?>noticia/eliminar&id=<?=$not->id?>" class="btn btn-danger" style="height:30px;border-radius:5px;padding:0px 5px">Eliminar</a></td>
                    -->
                  <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?=$not->id?>" style="height:30px;border-radius:5px;padding:0px 5px">
                  <img src="<?=base_url?>assets/icons/trash.svg" alt="Eliminar">
                  </a>
                      <!-- The Modal -->
                      <div class="modal" id="myModal<?=$not->id?>">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal body -->
                            <div class="modal-body">
                              ¿Estas seguro de que quieres eliminar de forma permanente la noticia <strong><?=$not->titulo;?></strong>?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <a type="button" class="btn btn-danger" href="<?=base_url?>noticia/eliminar&id=<?=$not->id?>">Eliminar</a>
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

  <div class="btn-top"> <img src="<?=base_url?>assets/icons/arrow-up.svg" alt="Icono servicios" style="width:30px"></div>
