<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url?>assets/CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/bs/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div id='container'>
        <!--CABECERA-->
        <header id='header'>
            <div id='logo'>
                <img src="<?=base_url?>assets/img/LOGO.png" alt="camiseta" />
                <a href="<?= base_url?>">OUTFITERS</a>
            </div>

        </header>
  
        <!--MENU-->
        <nav id='menu'>
        <?php $categorias= Utils::showCategorias();?>
            <ul>
                <li>
                    <a href="<?=base_url?>">Inicio</a>
                </li>  
                <li><a href="">Productos</a>
                <ul>
                <?php while($cat = $categorias->fetch_object()):?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                    </li>
                    <?php endwhile;?>
                </ul>
            </li>             
            </ul>
        </nav>


        <div id="content">