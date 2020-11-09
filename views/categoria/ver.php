<?php if(isset($categoria)):?>
    <h1><?=$categoria->nombre?></h1>
    
    <?php if($productos->num_rows == 0):?>
        <p>No hay productos para mostrar</p>
    <?php else:?>
        <?php while($producto = $productos->fetch_object()):?>
            <div class="product">
            <a href="<?=base_url.'producto/ver&id='.$producto->id?>">
                <?php if($producto->imagen != NULL):?>
                    <img src="<?=base_url.'uploads/images/'.$producto->imagen?>" alt="Imagen">
                <?php else:?>
                    <img src="<?=base_url?>assets/images/camiseta.png" alt="Imagen">
                <?php endif;?>
                    <h2><?=$producto->nombre?></h2>
            </a>
                <p>$<?=$producto->precio?></p>
                <a href="<?=base_url.'carrito/add&id='.$producto->id?>" class="button">Comprar</a>
            </div>
        <?php endwhile;?>
    <?php endif;?>
<?php else:?>
    <h1>La Categoria NO EXISTE.</h1>
<?php endif;?>