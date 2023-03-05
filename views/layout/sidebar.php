            <!--BARRA LATERAL-->
            <aside id="lateral">
                <div id='login' class="block-aside">
                    <?php if(!isset($_SESSION['identity'])):?>
                    <h3>Entrar a la web</h3>
                    <form action="<?=base_url?>usuario/login" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Clave</label>
                        <input type="password" name="password">

                        <input type="submit" value="Entrar">
                    </form>

                    <?php else: ?>
                        <h3><?= strtoupper($_SESSION['identity']->nombre)?>  <?=strtoupper($_SESSION['identity']->apellidos) ?> </h3>
                        <ul>
                       
                       
                        <?php if(isset($_SESSION['admin'])):?>
                        <li><a href="<?php base_url?>Categoria/index">Gestionar Categorias</a></li>
                        <li><a href="<?php base_url?>Producto/gestion">Gestionar Productos</a></li>
                        <li><a href="#">Gestionar Pedidos</a></li>
                        
                        <?php endif;?>
                        <?php endif;?>
                        
                    </ul>
                    
                    <?php if(isset($_SESSION['identity'])):?>
                    <li><a href="#">Mis Pedidos</a></li>
                    <a class="button" href="<?=base_url?>usuario/logOut">Cerrar Sesion</a>
                    <?php else:?>
                    <li><a class="button" href="<?=base_url?>usuario/registro">Registrate aqui</a></li>
                    <?php endif;?>
                    
                </div>

            </aside>

        <!--CONTENIDO CENTRAL-->

        <div id='central'>