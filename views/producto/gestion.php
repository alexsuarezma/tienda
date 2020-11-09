<h1>Gestion De Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear Producto
</a>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'completed'):?>
   <strong class="alert_green">Producto registrado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'):?>
    <strong class="alert_red">Registro de producto Fallido, introduce bien los datos</strong>
<?php endif;?>
<?php Utils::deleteSession('producto');?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed'):?>
   <strong class="alert_green">Producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'):?>
    <strong class="alert_red">El proceso de borrado del producto ha fallado, intente en otro momento.</strong>
<?php endif;?>
<?php Utils::deleteSession('delete');?>


<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($producto = $productos->fetch_object()):?>
        <tr>
            <td><?=$producto->id?></td>
            <td><?=$producto->nombre?></td>
            <td><?=$producto->precio?></td>
            <td><?=$producto->stock?></td>
            <td>
                <a href="<?=base_url?>/producto/delete&id=<?=$producto->id?>" class="button button-gestion button-red">Eliminar</a>
                <a href="<?=base_url?>/producto/update&id=<?=$producto->id?>" class="button button-gestion button-green">Editar</a>
            </td>
        </tr>
    <?php endwhile;?>
</table>
