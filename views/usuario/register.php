<h1>Registrarse</h1>

<?php
if(isset($_SESSION['register']) && $_SESSION['register']=='complete'):?>
<script>
    Swal.fire(
            
        'Registrado!',
        'Te registraste correctamente',
        'success'
           
           
        
       
    )
</script>
<!-- <strong>Registro completado correctamente</strong> -->
<?php elseif(isset($_SESSION['register']) && $_SESSION['register']=='fail'):?>
    <script>
    Swal.fire(
            
        'Upss!',
        'Algo salio mal, introduce bien los datos',
        'error'
           
           
        
       
    )
</script>

<?php endif;?>
<?php
Utils::deleteSession('register');

?>

</br>
</br>

<form action="<?=base_url?>usuario/save" method="POST">

<label for="name">Nombre</label>
<input type="text" name="name" required>



<label for="apellido">Apellidos</label>
<input type="text" name="apellido" required>



<label for="email">Email</label>
<input type="email" name="email" required>



<label for="password">Password</label>
<input type="password" name="password" required>

<input type="submit" value="Registrarse">




</form>