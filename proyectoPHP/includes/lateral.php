<aside id="sidebar">

<div id="buscador" class="bloque">
            <h3>Buscar</h3>   
            
            <form action="buscar.php" method="post">

            <input type="text" name="busqueda" >

            <input type="submit" value="Buscar">
            </form>
        </div>

<?php if(isset($_SESSION['usuario'])): ?>
<div id="usuario-logueado" class="bloque"> 
<h3>Bienvenido,<?=$_SESSION['usuario']['nombre'].''.$_SESSION['usuario']['apellidos']; ?></h3> 

<a href="crear-entradas.php" class="boton boton-verde">Crear Entradas</a>
<a href="crear-categoria.php" class="boton boton-azul">Crear Categoria</a>
<a href="mis-datos.php" class="boton boton-naranja">Mis Datos</a>
<a href="cerrar.php" class="boton boton-rojo">Cerrar Sesión</a>
</div>
<?php endif; ?>

<?php if(!isset($_SESSION['usuario'])): ?>
    <div id="login" class="bloque">
            <h3>Identificate</h3>   

            <?php if(isset($_SESSION['error_login'])): ?>
            <div class="alerta alerta-error"> 
            <h3><?=$_SESSION['error_login']; ?></h3> 
            </div>
            <?php endif; ?>
            
            <form action="login.php" method="post">
            <label for="email">email</label>
            <input type="email" name="email" >

            <label for="password">password</label>
            <input type="password" name="password" >

            <input type="submit" value="Entrar">
            </form>
        </div>

        <div id="register" class="bloque">
            <h3>Registrate</h3>
            <!-- Mostrar Errores -->
            <?php if (isset($_SESSION['completado'])): ?>
                <div class="alerta alerta-exito"><?php echo $_SESSION['completado'];?></div>
                <?php elseif(isset($_SESSION['errores'])): ?>
                    <div class="alerta alerta-exito"><?php echo $_SESSION['errores']['general'];?></div>
                    <?php endif;?>
            <form action="registro.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" >
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'nombre'): ''; ?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" >
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'apellidos'): ''; ?>

            <label for="email">email</label>
            <input type="email" name="email" >
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'email'): ''; ?>

            <label for="password">password</label>
            <input type="password" name="password" >

            <input type="submit" value="Registrar" name="submit">
            </form>
            <?php echo borrarErrores(); ?>
        </div>
        <?php endif; ?>
    </aside>