<div class="container" style="text-align:center; min-height:60vh">
    
        <div class='row justify-content-center'>

            <a href="tel:+34635542199">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Policía Local 
                    </div>
                </div>
            </a>
            <a href="tel:+34953521368">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Guardia Civil 
                    </div>
                </div>
            </a>
            <a href="tel:+34953515260">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Policía Nacional Andújar
                    </div>
                </div>
            </a>
            <a href="tel:+34953515050">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Bomberos Andújar
                    </div>
                </div>
            </a>
            <a href="tel:+34953521378">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Centro de salud
                    </div>
                </div>
            </a>
            <a href="tel:+34953539653">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Urgencias Arjona
                    </div>
                </div>
            </a>
            <a href="tel:061">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Ambulancia 
                    </div>
                </div>
            </a>
            <a href="tel:112">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Emergencia General
                    </div>
                </div>
            </a>

            <?php
           
            $hoy = getdate();
            $año = $hoy['year'];
            $fecha = date('N', strtotime($año."-01-01"));
            $dia=($hoy['yday']+1)+(7-$fecha);//dia del año+1(empieza a contar en 0) + los dias que faltan de la primera semana
            $semana=$dia/7; //dividimos entre 7 para saber numero de la semana
            if ($semana%2==0): //si es par una y si es impar la otra ?> 

            <a href="tel:+34953520214">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Farmacia de guardia Ana Mª Navas
                    </div>
                </div>
            </a>
            <?php else: ?>

            <a href="tel:+34953521197">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        Farmacia de guardia  Eva Mª Soto
                    </div>
                </div>
            </a>
            <?php endif; ?>



       
	       
        </div>
        
    

</div>
