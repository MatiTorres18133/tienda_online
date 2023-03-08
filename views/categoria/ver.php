<?php if(isset($categoria)):?>
<h1><?= $categoria->nombre?></h1>
<?php if($productos->num_rows == 0):?>
    <p>No hay productos para mostrar</p>
<?php else:?>
    <?php while($prod_dest = $productos->fetch_object()):?>
            <div class="product">
            <a href="<?=base_url?>producto/ver&id=<?=$prod_dest->id?>" >
                <?php if($prod_dest->imagen !=null):?>
                <img height="150"  src="<?=base_url?>uploads/images/<?=$prod_dest->imagen?>" alt="">
                <?php else:?>
                <img height="150"  src="<?php base_url?>assets/img/no-image-icon-11.png" alt="">
                <?php endif;?>


                <h2><?=$prod_dest->nombre?></h2>
                <p><?=$prod_dest->precio?>$</p>
                </a>
                <a href="<?= base_url?>Carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
            </div>   
    <?php endwhile;?>

<?php endif;?>


<?php else:?>
    <h1>La categoria no existe</h1>
<?php endif;?>

