<?php if(isset($edit) && isset($produc) && is_object($produc)):
        $urlAction = base_url.'producto/save&id='.$produc->id;    
?>
        <h1>Editar Producto</h1><?=$produc->nombre?>
<?php else:
        $urlAction = base_url.'producto/save';
?>
        <h1>Crear Nuevo Producto</h1>
<?php endif;?>

<form action="<?=$urlAction?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre del producto:</label>
    <input type="text" name="nombre" id="" value="<?= isset($produc) && is_object($produc) ? $produc->nombre : '' ?>" required/>
   
    <label for="descripcion">Descripcion:</label>
    <textarea type="text" name="descripcion" id="" required><?= isset($produc) && is_object($produc) ? $produc->descripcion : '' ?></textarea>

    <label for="precio">Precio del producto:</label>
    <input type="text" name="precio" id="" value="<?= isset($produc) && is_object($produc) ? $produc->precio : '' ?>" required/>

    <label for="stock">Stock del producto:</label>
    <input type="number" name="stock" id="" value="<?= isset($produc) && is_object($produc) ? $produc->stock : '' ?>" required/>

    <label for="categoria">Categoria del producto:</label>
    <select name="categoria" id="">
        <?php $categorias = Utils::showCategorias();?>
            <option disabled selected value="">Selecciona...</option>
        <?php while ($categoria =$categorias->fetch_object()):?>
            <option value="<?=$categoria->id?>" <?= isset($produc) && is_object($produc) && $categoria->id == $produc->categoria_id  ? 'selected' : '' ?> ><?=$categoria->nombre?></option>
        <?php endwhile;?>
    </select>

    <label for="imagen">Imagen del producto:</label>
    <?php if(isset($produc) && is_object($produc) && !empty($produc->imagen)):?>
        <img src="<?= base_url.'uploads/images/'.$produc->imagen ?>" alt="" class="thumb"/>
        <br/>
    <?php endif;?>
    <input type="file" name="imagen" id=""/>

    <button type="submit">Guardar</button>
</form>