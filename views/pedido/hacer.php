
<?php
if(isset($_SESSION['identity'])):?>
<h1>Hacer pedido</h1>


<h3></h3>
<form action="<?=base_url?>pedido/confirmarPedido" method="POST">
<label for="provincia">Provincia</label>
<input type="text" name="provincia" required>

<label for="localidad">Ciudad</label>
<input type="text" name="localidad" required>


<label for="direccion">Direccion</label>
<input type="text" name="direccion" required>
<input type="submit" class="enviar"  value="Confirmar pedido">
</form>
<br>
<a class="button_ver_carrito button2 "  href="<?=base_url?>carrito/index">Volver al carrito</a>



<?php
else:
?>
    <script>
    Swal.fire(
            
        'Upss!',
        'Necesitas estar identificado para poder realizar un pedido',
        'error'
    
    )
</script>
<?php
endif;
?>