<h1>Gestionar Categorias</h1>
<table >
<tr>
    <th>id</td>
    <th>nombre</td>

</tr>
<?php  while($cat  = $categorias->fetch_object()):?>
<tr>
    <td><?=$cat->id?></td>
    <div class="row">
    <td><?=$cat->nombre?></td>
    
    
    </div>


</tr>
  

<?php endwhile;?>

</table>
<br>
<br>
<div id="buttons" class="row">
<a class="button-small" href="<?php base_url?>crear">Crear categoria</a>
<a class="button-small" href="<?php base_url?>crear">Editar categoria</a>

</div>