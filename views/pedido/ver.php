
<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido']=='complete'):?>
   <script>
    Swal.fire(
            
        'Pedido confirmado',
        'Tu pedido ha sido confirmado con exito, una vez que realices la transferencia bancaria con el coste del pedido, sera procesado y enviado. Muchas gracias !',
        'success'
           
    
    )
</script>
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido']=='failed'):?>

    <script>
    Swal.fire(
            
        'Upss!',
        'El pedido no se pudo generar',
        'error'
           
           
        
       
    )
</script>
<?php endif;?>

<?php Utils::deleteSession('pedido');?>

<?php if(isset($_SESSION['identity'])):?>
<h1>Mis pedidos</h1>

<table>
    <th>#id</th>
    <th>#id</th>
    <th>#id</th>
    <th>#id</th>
    <th>#id</th>
</table>

<?php while($ped = $pedido->fetch_object())?>









<?php else: ?>

    <script>
    Swal.fire(
            
        'Upss!',
        'Tienes que estar registrado',
        'error',
           
           
        
       
    )
</script>

<?php endif;?>

