<div class="container">
<div id=#top></div>
    <div class="caja" style="text-align:center">
 

        
        
        <span style="font-size:x-large">Usuarios Registrados </span> <a href="<?=base_url?>usuario/registro" class="btn btn-success">NUEVO</a><br>

        <?php if(isset($_SESSION['save']) && isset($_SESSION['save'])== 'complete'): ?>
            <strong class="alert_green"> El Usuario se ha creado correctamente</strong>
        <?php elseif(isset($_SESSION['save']) && isset($_SESSION['save'])!= 'complete'):  ?>
            <strong class="alert_red"> El Usuario no se ha creado correctamente</strong>
        <?php endif;  Utils::deleteSession('save');?>
        <?php if(isset($_SESSION['edit']) && isset($_SESSION['edit'])== 'complete'): ?>
            <strong class="alert_green"> El Usuario se ha actualizado correctamente</strong>
        <?php elseif(isset($_SESSION['edit']) && isset($_SESSION['edit'])!= 'complete'):  ?>
            <strong class="alert_red"> El Usuario no se ha actualizado correctamente</strong>
        <?php endif;  Utils::deleteSession('edit');?>
        <?php if(isset($_SESSION['delete']) && isset($_SESSION['delete'])== 'complete'): ?>
            <strong class="alert_green"> El Usuario se ha eliminado correctamente</strong>
        <?php elseif(isset($_SESSION['delete']) && isset($_SESSION['delete'])!= 'complete'):  ?>
            <strong class="alert_red"> El Usuario no se ha eliminado correctamente</strong>
        <?php endif;  Utils::deleteSession('delete');?>

        <?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
                <strong class="alert_green">Registro completado correctamente</strong>
            <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'nombre'): ?>
                <strong class="alert_red">Registro fallido, introduce un nombre de usuario diferente</strong>
                <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
                <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
            <?php endif; ?>
            <?php Utils::deleteSession('register'); ?>


        <hr>
        <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-left">Id</th>
              <th class="text-left">User</th>
              
              <th class="text-left">Nombre</th>

              <th class="text-left">Correo</th>
              
              <th class="text-left">Acciones</th>

            </tr>
          </thead>
          <tbody class="table table-hover">
          <?php while($usu = $usuarios->fetch_object()): ?>
            <tr>
            <td class="text-left"><?=$usu->id;?></td>
              <td class="text-left"><?=$usu->user;?></td>
              <td class="text-left"><?=$usu->nombre;?></td>
              <td class="text-left"><?=$usu->email;?></td>
              <td class="text-left">
                <a href="<?=base_url?>usuario/editar&id=<?=$usu->id?>" class="btn btn-warning" style="height:30px;border-radius:5px;padding:0px 5px">
                <img src="<?=base_url?>assets/icons/pencil.svg" alt="Editar">
                </a>
                <!--<a href="<?=base_url?>usuario/eliminar&id=<?=$usu->id?>" class="btn btn-danger" style="height:30px;border-radius:5px;padding:0px 5px">Eliminar</a></td>
                -->
                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?=$usu->id?>" style="height:30px;border-radius:5px;padding:0px 5px">
                <img src="<?=base_url?>assets/icons/trash.svg" alt="Eliminar">
                </a>
            
               </td>
               <!-- The Modal -->
               <div class="modal" id="myModal<?=$usu->id?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal body -->
                      <div class="modal-body">
                        ¿Estas seguro de que quieres eliminar de forma permanente la usuario <strong><?=$usu->nombre;?></strong>?
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <a type="button" class="btn btn-danger" href="<?=base_url?>usuario/eliminar&id=<?=$usu->id?>">Eliminar</a>
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
