<?php if(isset($pro)):?>
<h1><?= $pro->nombre?></h1>



    <img width="300px" src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="">

    <div class="row">
   
    <br>
    <strong>Precio:</strong> <?=$pro->precio?>$
    <br>
    <br>
    <strong>Stock:</strong> <?=$pro->stock?>
    <br>
    <br>
    <strong>Descripcion:</strong>
    <br>
    
    <p><?=$pro->descripcion?></p>
    <div class="row">   
    <a href="<?= base_url?>Carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
    <a href="<?= base_url?>Carrito/deleteAll" class="button">borrar</a>
    </div>


    </div>




<?php else:?>
    <h1>El producto no existe</h1>
<?php endif;?>

