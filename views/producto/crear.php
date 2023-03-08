<?php if(isset($edit) && isset($pro) && is_object($pro)):?>

    <h1>Editar producto <strong><?=$pro->nombre?></strong> </h1>
    <?php 
    $urlAction = base_url."producto/save&id=".$pro->id;
    ?>
<?php else:?>

    <h1>Crear producto</h1>
    <?php 
    $urlAction = base_url."producto/save";
    ?>

<?php endif;?>

 
<div class="form_container">
  
<form action="<?= $urlAction?>" method="POST" enctype="multipart/form-data">
<label for="nombre"> <strong>NOMBRE DEL PRODUCTO</strong> </label>
<input type="text" name="nombre" value="<?=isset($pro) && is_object($pro)? $pro->nombre:''?>" required>
<label for="categoria"><strong>CATEGORIA</strong></label>
<?php
$categorias = Utils::showCategorias();?>
<select name="categoria">
    <?php while($cat  = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>"  <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id? "selected":''?>>
      
        <?=strtoupper($cat->nombre)?>
    </option>
   <?php endwhile;?>
</select>

<label for="oferta"><strong>OFERTA</strong></label>
<select name="oferta">
    <option value="si">En oferta</option>
    <option value="no">Sin oferta</option>
</select>

<label for="descripcion" ><strong>DESCRIPCION DEL PRODUCTO</strong></label>
<textarea name="descripcion"  cols="30" rows="10"><?=isset($pro) && is_object($pro)? $pro->descripcion:''?></textarea>
<label for="Stock"><strong>STOCK</strong></label>
<input type="number" name="Stock" value="<?=isset($pro) && is_object($pro)? $pro->stock:''?>" required>
<label for="Precio"><strong>PRECIO</strong></label>
<input type="number" value="<?=isset($pro) && is_object($pro)? $pro->precio:''?>" name="Precio" required>
<label for="Imagen"><strong>Imagen</strong></label>
<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
    <img class="thumb" src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt=""/>
    <?php endif;?>
<input type="file" name="Imagen" >
<input type="submit" value="Crear">
</form>

</div>

