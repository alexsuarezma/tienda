<?php if(isset($producto)):?>
    <h1><?=$producto->nombre?></h1>  
    <div id="detail-product">
        <div class="image">
            <?php if($producto->imagen != NULL):?>
                <img src="<?=base_url.'uploads/images/'.$producto->imagen?>" alt="Imagen">
            <?php else:?>
                <img src="<?=base_url?>assets/images/camiseta.png" alt="Imagen">
            <?php endif;?>
        </div>
        <div class="data">
            <h2 class="description"><?=$producto->nombre?></h2>
            <p class="price">$<?=$producto->precio?></p>
            <a href="<?=base_url.'carrito/add&id='.$producto->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else:?>
    <h1>El producto NO EXISTE.</h1>
<?php endif;?>