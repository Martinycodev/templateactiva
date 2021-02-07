<div class="container">
    <div class="caja"><!-- caja Buscadodr -->
            <div class="row">
                <div class="col-sm-6">
                    <div style="margin-top:25px">
                        <h2>Encuentra los <br><i>Servicios Públicos que ofrece</i><br> 
                        <span style="text-decoration: underline; font-weight: bold">Arjonilla</span>
                        fácilmente<br>
                        </h2>
                    </div>
                </div>
                <div class="col-sm-6">

                    <form class="form" action="<?=base_url?>" method="GET">
                        <div class="frorm-goup ">
       
                            <input type="text" class="form-control buscador" name="controller" value="servicio" hidden/>
                            <input type="text" class="form-control buscador" name="action" value="servicios" hidden/>
                            <input type="text" class="form-control buscador" name="buscar" placeholder="Buscar Servicio"  required/>
                          
                        <button type="submit" class="btn btn-primary mb-4 btn-buscador">Buscar</button>
                        <a href="<?=base_url?>servicio/servicios" class="btn btn-primary mb-2 btn-categoria">Ver Todos</a>
                    </form>
                    </div>
                </div>
            </div>
    </div>

        <div class='caja deco2'></div>
</div>

            
  
  