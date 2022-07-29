<h1>Carrito de la compra</h1>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito'])>=1):?>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio Unitario</th>
        <th>Unidades</th>
        <th>eliminar</th>
    </tr>
    
    <?php foreach($carrito as $indice => $elemento): 
    $producto = $elemento['producto']
    ?>
<tr>
        <td> <?php if ($producto->imagen != NULL) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito">
            <?php endif; ?>
        </td>

        <td>
           <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>" ><?=$producto->nombre?></a> 
        </td>

        <td>
            <?=$producto->precio?>
        </td>

        <td>
           
            <?=$elemento["unidades"] ?>
            <div class="updown-unidades">
            <a href="<?=base_url?>/carrito/up&index=<?=$indice?>"class="button">+</a>
            <a href="<?=base_url?>/carrito/down&index=<?=$indice?>"class="button">-</a>
            </div>
        </td>
        <td>
        <a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class=" button button-red button-carrito">quitar Producto</a>
        </td>
        </tr>
    <?php endforeach; ?>
   
</table>

<br>
    <div class="delete-carrito">
        <a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar Carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito() ?>
        <h3>Precio Total: <?=$stats['total']?>$</h3>
        <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
    </div>
    <?php else:?>
        <p>El carrito esta Vacio, añade algun producto</p>
<?php endif;?>