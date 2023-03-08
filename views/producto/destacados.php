
<h1>Algunos de nuestros productos</h1>
<?php

?>
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
                <a href="<?= base_url?>Carrito/add&id=<?=$prod_dest->id?>" class="button">Comprar</a>
                
            </div>   
    <?php endwhile;?>


