<?php if(isset($gestion)):?>
    <h1>Gestionar Pedidos</h1>
<?php else:?>
    <h1>Mis pedidos</h1>
<?php endif;?>

<table>
    <tr>
        <th>N° PEDIDO</th>
        <th>COSTE</th>
        <th>FECHA</th>
        <th>ESTADO</th>
    </tr>
    <?php while($pedido = $pedidos->fetch_object()):?>
        <tr>
            <td>
                <a href="<?=base_url.'pedido/detalle&id='.$pedido->id?>"><?=$pedido->id?></a>
            </td>
            <td>
                <?=$pedido->coste?>$
            </td>
            <td>
                <?=$pedido->fecha?>
            </td>
            <td>
                <?=Utils::showStatus($pedido->estado)?>
            </td>
        </tr>    
    <?php endwhile;?>
</table>
