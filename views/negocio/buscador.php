


<div class="caja"><!-- caja Buscadodr -->

    <div class="row justify-content-center" style="padding:10px">

        <div style='text-align:center'>
            <h2>Encuentra los <i>Negocios y Empresas </i>de 
            <span style="text-decoration: underline; font-weight: bold">Arjonilla</span>
            fácilmente</h2>
        </div>

    </div>
    <div class="row justify-content-center">
        <div>

            <form class="form" style="width:60vw; text-align:center;max-width: 1000px;" action="<?=base_url?>" method="GET">
                
                <input type="text" class="form-control buscador" name="controller" value="negocio" hidden/>
                <input type="text" class="form-control buscador" name="action" value="negocios" hidden/>
                <input type="text" class="form-control buscador" name="buscar" placeholder="Buscar Negocio"  autocomplete="off" required/>
                <input type="submit" class="btn btn-primary mb-4 btn-buscador" style="max-width: 1000px;" value="Buscar"/><br>

                <div class="row">
                <div class="col"><a href="<?=base_url?>negocio/negocios" class="btn btn-verneg">Ver todos</a></div>

                <div class="col"><a href="<?=base_url?>categoria/listar" class="btn btn-vercat">Ver las Categorías</a></div>
                </div>
                
            </form>

        </div>
    </div> 
    
</div>

<div class='caja deco'></div>


    