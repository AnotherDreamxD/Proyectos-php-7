<h1> Gestión de Productos</h1>
<a class="button button-small" href="<?=base_url?>producto/crear"> Crear Producto</a>

<?php #CREAR UN PRODUCTO ?>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'):?>
    <strong class="alert_green">El Producto se ha Creado Correctamente</strong>
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'):?>
        <strong class="alert_red">El Registro no se ha Creado Correctamente</strong>
    <?php endif;?>
<?php Utils::deleteSession('producto')?>


<?php #Eliminar un Producto?>
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
    <strong class="alert_green">El Producto se ha Eliminado Correctamente</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'):?>
        <strong class="alert_red">El Producto no se ha Eliminado</strong>
    <?php endif;?>
<?php Utils::deleteSession('delete')?>


<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>STOCK</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
                <td ><?=$pro->id?></td>
                <td ><?=$pro->nombre?></td>
                <td ><?=$pro->precio?></td>
                <td ><?=$pro->stock?></td>
                <td>
                    <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>"  class="button button-gestion">Editar</a>
                    <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
                </td>
        </tr>
        <?php endwhile;?>
      
    </tbody>
</table>
