<?php if (isset($categoria)) : ?>

    <h1> <?= $categoria->nombre ?> </h1>
    <?php if ($productos->num_rows == 0) : ?>
        <p>No hay Productos para Mostrar</p>
    <?php else : ?>
        <?php while ($producto = $productos->fetch_object()) : ?>

            <div class="product">
            <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"> 
                <?php if ($producto->imagen != NULL) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>">
                <?php else : ?>
                    <img src="<?=base_url?>assets/img/camiseta.png" >
                <?php endif; ?>
                <h2><?= $producto->nombre ?></h2>
                </a>
                <p><?= $producto->precio ?> Euros</p>
                
            <a href="<?=base_url?>Carrito/add&id=<?=$producto->id?>" class="button">Comprar</a>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>

<?php else : ?>
    <h1> La Categoria no Existe</h1>

<?php endif; ?>