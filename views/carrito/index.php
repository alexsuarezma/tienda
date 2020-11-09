<h1>Carrito de la Compra</h1>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1):?>
<table>
    <tr>
        <th>IMAGEN</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>UNIDADES</th>
        <th>ELIMINAR</th>
    </tr>
    <?php foreach($carrito as $index => $elemento):
            $producto = $elemento['producto'];
    ?>
        <tr>
            <td>
                <?php if($producto->imagen != NULL):?>
                    <img class="img_carrito" src="<?=base_url.'uploads/images/'.$producto->imagen?>" alt="Imagen">
                <?php else:?>
                    <img class="img_carrito" src="<?=base_url?>assets/images/camiseta.png" alt="Imagen">
                <?php endif;?>
            </td>
            <td>
               <a href="<?=base_url.'producto/ver&id='.$producto->id?>"><?=$producto->nombre?></a>
            </td>
            <td>
                <?=$producto->precio?>
            </td>
            <td>
                <?=$elemento['unidades']?>
                <div class="updown-unidades">
                    <a href="<?=base_url.'carrito/plus&id='.$index?>" class="button">+</a>                
                    <a href="<?=base_url.'carrito/less&id='.$index?>" class="button">-</a>                
                </div>
            </td>
            <td>
                <a href="<?=base_url.'carrito/remove&id='.$index?>" class="button button-carrito button-red">Remover Producto</a>                
            </td>
        </tr>    
    <?php endforeach;?>
</table>
<br>
<div class="delete-carrito">
    <a href="<?=base_url?>carrito/delete" class="button button-delete button-red">Borrar Pedido</a>
</div>
<div class="total-carrito">
    <?php $stats = Utils::statsCarrito();?>
    <h3 >Precio Total: <?=$stats['total']?> $</h3>
    <a href="<?=base_url?>pedido/pedir" class="button button-pedido">Hacer Pedido</a>
</div>
<?php else:?>
    <p>El carrito esta vacio añade algun producto.</p>
<?php endif;?>