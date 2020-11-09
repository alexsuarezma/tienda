
           
<h1>Algunos de Nuestros Productos</h1>

<?php while($producto = $productos->fetch_object()):?>
    <div class="product">
    <a href="<?=base_url.'producto/ver&id='.$producto->id?>">
        <?php if($producto->imagen != NULL):?>
            <img src="<?=base_url.'uploads/images/'.$producto->imagen?>" alt="Imagen">
        <?php else:?>
            <img src="assets/images/camiseta.png" alt="Imagen">
        <?php endif;?>
            <h2><?=$producto->nombre?></h2>
    </a>
        <p>$<?=$producto->precio?></p>
        <a href="<?=base_url.'carrito/add&id='.$producto->id?>" class="button">Comprar</a>
    </div>
<?php endwhile;?>
    