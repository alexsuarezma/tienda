<h1>Crear Nueva Categoria</h1>

<form action="<?=base_url?>categoria/save" method="POST">
    <label for="nombre">Nombre de la categoria:</label>
    <input type="text" name="nombre" id="" required/>
    <button type="submit">Guardar</button>
</form>