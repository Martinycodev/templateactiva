<div style="text-align:center">
    
        

        <div class='row justify-content-center'>
            <?php while($cat = $categorias->fetch_object()): ?>

            <a href="<?=base_url?>categoria/ver&id=<?=$cat->id;?>">
                <div class="col cajaCategoria" >
                    <div class="categoriaTexto">
                        <?=$cat->nombre;?>
                    </div>
                </div>
            </a>
       
	        <?php endwhile; ?>
        </div>
        
    

</div>