<h1>Carrito de la compra</h1>

<table>

<tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
</tr>

<?php 
    foreach($carrito as $indice => $elemento):
    $producto = $elemento['producto'];
    ?>

    <tr>
        <td>
            <?php if($producto->imagen !=null):?>
                <a class="img_producto" href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><img width="100" src="<?= base_url?>uploads/images/<?= $producto->imagen?>" ></a>
            <?php else:?>
                <img src="<?=base_url?>/assets/img/camiseta.png" >
            <?php endif;?>
        </td>

        <td>
           <a class="carrito_producto" href="<?=base_url?>producto/ver&id=<?=$producto->id?>"> <?= $producto->nombre ?></a>
        </td>
        <td>
            <?= $producto->precio ?>$
        </td>
        <td>
            <?= $elemento['unidades']?>
        </td>
    </tr>
<?php endforeach;?>
</table>
<br>

<?php $STATS = Utils::statsCarrito()?>
<div class="total_carrito">
<h3>TOTAL: <?=$STATS['total']?>$</h3>
<br>
<a class="button2" href="<?=base_url?>pedido/hacer">Confirmar pedido</a>
</div>
