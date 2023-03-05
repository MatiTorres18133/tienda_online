<h1>Gestion de productos</h1>
<?php
if(isset($_SESSION['producto']) && $_SESSION['producto']=='creado'):?>
<script>
    Swal.fire(
            
        'Producto creado correctamente!',
        'Has creado un producto',
        'success'
           
           
        
       
    )
</script>
<!-- <strong>Registro completado correctamente</strong> -->
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=='fallo'):?>
    <script>
    Swal.fire(
            
        'Upss!',
        'Algo salio mal, introduce bien los datos',
        'error'
           
           
        
       
    )
</script>

<?php endif;?>

<?php
Utils::deleteSession('producto');
?>
<?php 
if($empty == true):?>

<h2>No hay productos</h2>
<?php else:?>

<table >
<tr>
    <th>id</td>
    <th>categoria</td>
    <th>nombre del producto</td>
    <th>descripcion</td>
    <th>precio</td>
    <th>stock</td>
    <th>oferta</td>
    <th>fecha de creacion</td>




</tr>
<?php
while($prod  = $productos->fetch_object()):?>


<tr>
    
    <td><?=$prod->id?></td>
    <td><?=$prod->categoria_id?></td>
    <td> <strong><?=strtoupper($prod->nombre)?></strong> </td>
    <td><?=$prod->descripcion?></td>
    <td><?=$prod->precio?>$</td>
    <td><?=$prod->stock?></td>
    <td><?=$prod->oferta?></td>
    <td><?=$prod->fecha?></td>
    <td><a href="<?php base_url?>eliminar?id=<?=$prod->id?>">Eliminar</a></td>
    
</tr>
 


<?php endwhile;?>
</table>

<?php endif;?>

<br>
<br>
<div id="buttons" class="row">
<a class="button-small"  href="<?php base_url?>crear">Crear producto</a>
