<h1>Crear producto</h1>

<div class="form_container">
<form action="<?php base_url?>save" method="POST" enctype="multipart/form-data">
<label for="nombre"> <strong>NOMBRE DEL PRODUCTO</strong> </label>
<input type="text" name="nombre" required>
<label for="categoria"><strong>CATEGORIA</strong></label>
<?php
$categorias = Utils::showCategorias();?>
<select name="categoria">
    <?php while($cat  = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>"><?=strtoupper($cat->nombre)?></option>
   <?php endwhile;?>
</select>

<label for="oferta"><strong>OFERTA</strong></label>
<select name="oferta">
    <option value="si">En oferta</option>
    <option value="no">Sin oferta</option>
</select>

<label for="descripcion"><strong>DESCRIPCION DEL PRODUCTO</strong></label>
<textarea name="descripcion"  cols="30" rows="10"></textarea>
<label for="Stock"><strong>STOCK</strong></label>
<input type="number" name="Stock" required>
<label for="Precio"><strong>PRECIO</strong></label>
<input type="number" name="Precio" required>
<label for="Imagen"><strong>Imagen</strong></label>
<input type="file" name="Imagen" required>



<input type="submit" value="Crear">
</form>

</div>

