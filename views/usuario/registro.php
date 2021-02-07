
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="caja">
            <?php if (isset($edit) && isset($usu) && is_object($usu)): ?>
                <h3>Editar usuario " <?=$usu->nombre?> "</h3>
                <?php $url= base_url."usuario/edit&id=".$usu->id;?>
            <?php else: ?>
                <h3>Nuevo usuario</h3>
                <?php $url= base_url."usuario/save"?>
            <?php endif; ?>

           
                
            <form action="<?=$url?>" method="POST">
                
                <div class="form-group">
                    <label for="user">Usuario</label>
                    <input type="text" class="form-control" name="user" placeholder="Usuario" value="<?=isset($usu) && is_object($usu) ? $usu->user : ''; ?>" <?=isset($usu) && is_object($usu) ? 'readonly ' : ''; ?> required>
                </div>
                
                <?php 
                    if (!isset($edit)){
                        echo "  <div class='form-group'>
                        <label for='password'>Contraseña</label>
                        <input type='password' class='form-control' name='password' placeholder='Contraseña' >
                        </div>";
                    }
                ?>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"  placeholder="Email" value="<?=isset($usu) && is_object($usu) ? $usu->email : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?=isset($usu) && is_object($usu) ? $usu->nombre : ''; ?>" required>
                </div>
                <?php if (isset($edit)):?>
                <button type="submit" class="btn btn-info">Actualizar</button>
                <?php else: ?> 
                <button type="submit" class="btn btn-info ">Crear</button>
                <?php endif; ?> 
                
            </form>
            </div>
        </div>
    </div>
</div>