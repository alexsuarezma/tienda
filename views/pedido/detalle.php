<h1>Detalle Del Pedido</h1>

<?php if(isset($pedido)):?>
    <?php if(isset($_SESSION['admin'])):?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" name="id" value="<?=$pedido->id?>">
            <select name="estado" id="">
                <option value="confirm" <?=$pedido->estado == 'confirm' ? 'selected' : ''?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected' : ''?>>En preparacion</option>
                <option value="ready" <?=$pedido->estado == 'ready' ? 'selected' : ''?>>Preparado para enviar</option>
                <option value="sended" <?=$pedido->estado == 'sended' ? 'selected' : ''?>>Enviado</option>
            </select>
            <button type="submit">Cambiar Estado</button>
        </form>
        <br>
    <?php endif;?>
    <h3>Direccion del envio:</h3>
    Provincia: <?=$pedido->provincia?>
    <br>
    Localidad: <?=$pedido->localidad?>
    <br>
    Direccion: <?=$pedido->direccion?>
    <br>
    <br>
        <h3>Datos del pedido:</h3>
            Estado del pedido: <?=Utils::showStatus($pedido->estado)?>
            <br>
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