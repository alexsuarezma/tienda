<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en linea | Home</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <!-- CABECERA -->
    <div id="container">

        <header id="header">
            <div id="logo">
                <img src="assets/images/camiseta.png" alt="Camiseta Logo" />
                <a href="index.php">
                    Tienda de camisetas
                </a>
            </div>
        </header>
        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Categoria 1</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 3</a></li>
                <li><a href="#">Categoria 4</a></li>
                <li><a href="#">Categoria 5</a></li>
            </ul>
        </nav>
        <div id="content">
            <!-- BARRA LATERAL -->
            <aside id="lateral">
                <h3>Entrar a la web</h3>
                <div class="block_aside" id="login">
                    <form action="" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="">
                        <button type="submit">Enviar</button>
                    </form>
                    <ul>
                        <li><a href="#">Mis Pedidos</a></li>
                        <li><a href="#">Gestionar Pedidos</a></li>
                        <li><a href="#">Gestionar Categorias</a></li>
                    </ul>
                </div>
            </aside>
            <!-- CONTENIDO CENTRAL -->
            <div id="central">
                <h1>Productos Destacados</h1>
                <div class="product">
                    <img src="assets/images/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/images/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/images/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30</p>
                    <a href="#" class="button">Comprar</a>
                </div>
            </div>
        </div>
        <!-- PIE DE PAGINA -->
        <footer id="footer">
            <p>Desarrollado por Alex Suárez &copy; <?=date('Y')?></p>
        </footer>
    </div>
    </body>
    </html>