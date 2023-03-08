<h1>Gestion de productos</h1>
<?php

/*===================================CREAR PRODUCTO ALERTA========================== */
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
/*===================================ELIMINAR PRODUCTO ALERTA========================== */

if(isset($_SESSION['producto']) && $_SESSION['producto']=='eliminado'):?>
<script>
    Swal.fire(
            
        'Producto eliminado correctamente!',
        'Eliminaste un producto',
        'success'
           
           
        
       
    )
</script>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=='fallo'):?>
    <script>
    Swal.fire(
            
        'Upss!',
        'El producto no pudo ser eliminado',
        'error'
           
           
        
       
    )
</script>
<?php endif;?>


<?php 
/*===================================EDITAR PRODUCTO ALERTA========================== */

if(isset($_SESSION['producto']) && $_SESSION['producto']=='editado'):?>
    <script>
    Swal.fire(
            
        'Producto fue editado correctamente',
        'El producto fue editado!',
        'success'
           
    
    )
</script>

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=='fallo_editado'):?>
    <script>
    Swal.fire(
            
        'Upss!',
        'El producto no pudo ser editado',
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
    <th>#id</th>
    <th>Categoria</th>
    <th>Nombre del producto</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Oferta</th>
    <th>Fecha de creacion</th>
    <th>Acciones</th>





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
   
    <td>
        <a class="button-red" href="<?php base_url?>eliminar&id=<?=$prod->id?>">Eliminar</a>
        <a class="button-gestion" href="<?php base_url?>editar&id=<?=$prod->id?>">Editar</a>

    </td>
  
</tr>

 


<?php endwhile;?>
</table>

<?php endif;?>

<br>
<br>
<div id="buttons" class="row">
<a class="button-small"  href="<?php base_url?>crear">Crear producto</a>