<?php if(isset($_SESSION['identity'])):?>
    <h1>Hacer Pedido</h1>
    <p>
        <a href="<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a>   
    </p>
    <h3>Dirección para el envio</h3>
    <br>
    <form action="<?=base_url?>pedido/add" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" id="" required>

        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" id="" required>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="" required>

        <button type="submit">Confirmar</button>
    </form>
<?php else:?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logeado en la web para poder realizar el pedido</p>
<?php endif;?>