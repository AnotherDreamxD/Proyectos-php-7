<?php if (isset($_SESSION['identity'])) : ?>

    <h1>Hacer Pedido</h1>
    <p>
    <a href="<?= base_url ?>carrito/index">Ver los Productos y el Precio del Pedido</a>
    </p>

    <br>

    <form action="<?=base_url?>pedido/add" method="POST">

        <h3>Domicilio para el envio</h3>
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" id="" require>
        
        <label for="Localidad">Localidad</label>
        <input type="text" name="localidad" id="" require>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="" require>
        
        <input type="submit" value="Confirmar_pedido">
    </form>

<?php else : ?>
    <h1>Necesitas Estar Identificado</h1>
    <p>Necesitas estar logeado en la web para poder realizar tu pedido</p>

<?php endif; ?>