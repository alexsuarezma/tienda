<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'completed'):?>
    <h1>Pedido Confirmado</h1>
    <p>Tu pedido ha sido guardado con exito, una vez que realice la transferencia bancarria a la cuenta 78942163431631691DADD con el coste de su pedido sera
        procesado y enviado.
    </p>
    <br>
    <?php if(isset($pedido)):?>
        <h3>Datos del pedido:</h3>
            Número de pedido: <?=$pedido->id?>
            <br>
            Total a pagar: <?=$pedido->coste?>$
            <br>
            Productos:
            <br>
            <br>
            <table>
                <tr>
                    <th>IMAGEN</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>UNIDADES</th>
                </tr>
                <?php while ($producto = $productos->fetch_object()):?>
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
                            <?=$producto->unidades?>
                        </td>
                    </tr>    
                    
                <?php endwhile;?>
            </table>
    <?php endif;?>
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'completed'):?>
    <h1>Tu pedido no ha podido procesarse</h1>
<?php endif;?>