<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Document</title>
</head>

<body>
    <div id='container'>
        <!--CABECERA-->
        <header id='header'>
            <div id='logo'>
                <img src="assets/img/LOGO.png" alt="camiseta" />
                <a href="index.php">OUTFITERS</a>
            </div>

        </header>
   
        <!--MENU-->
        <nav id='menu'>

            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Categoria 1</a>
                </li>
                <li>
                    <a href="#">Categoria 2</a>
                </li>
                <li>
                    <a href="#">Categoria 3</a>
                </li>
            </ul>
        </nav>


        <div id="content">
            <!--BARRA LATERAL-->
            <aside id="lateral">
                <div id='login' class="block-aside">
                    <h3>Entrar a la web</h3>
                    <form action="#" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Clave</label>
                        <input type="password" name="password">

                        <input type="submit" value="Entrar">
                    </form>
                    <ul>
                        <li><a href="#">Mis Pedidos</a></li>
                        <li><a href="#">Gestionar Pedidos</a></li>
                        <li><a href="#">Gestionar Categorias</a></li>
                    </ul>
                    
                    
                    
                </div>

            </aside>
       


        <!--CONTENIDO CENTRAL-->

        <div id='central'>
            <h1>Produtos destacados</h1>
            <div class="product">
                <img src="assets/img/camiseta.jpeg" alt="">
                <h2>Camiseta Azul olgada</h2>
                <p>$20.000</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.jpeg" alt="">
                <h2>Camiseta Azul olgada</h2>
                <p>$20.000</p>
                <a href="#" class="button">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.jpeg" alt="">
                <h2>Camiseta Azul olgada</h2>
                <p>$20.000</p>
                <a href="#" class="button">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.jpeg" alt="">
                <h2>Camiseta Azul olgada</h2>
                <p>$20.000</p>
                <a href="#" class="button">Comprar</a>
            </div>



        </div>
        </div>
        <!--PIE DE PAGINA-->

        <footer id='footer'>
            <p>Desarrollado por Matias Torres WEB &copy;
                <?= date('Y'); ?>
            </p>

        </footer>
    </div>
</body>

</html>