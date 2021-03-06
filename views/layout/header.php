<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en linea | Home</title>
    <link rel="stylesheet" href="<?=base_url?>/assets/css/styles.css">
</head>
<body>
    <!-- CABECERA -->
    <div id="container">

        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>/assets/images/camiseta.png" alt="Camiseta Logo" />
                <a href="index.php">
                    Tienda de camisetas
                </a>
            </div>
        </header>
        <!-- MENU -->
        <?php $categorias = Utils::showCategorias();?>
        <nav id="menu">
            <ul>
                <li><a href="<?=base_url?>">Inicio</a></li>
                <?php while($categoria = $categorias->fetch_object()):?>
                    <li><a href="<?=base_url.'categoria/ver&id='.$categoria->id?>"><?=$categoria->nombre?></a></li>
                <?php endwhile;?>
            </ul>
        </nav>
        <div id="content">