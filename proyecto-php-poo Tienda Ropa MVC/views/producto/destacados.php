
    

        <h1>Algunos de nuestros productos</h1>

        <?php while ($producto = $productos->fetch_object()):?>

            

        <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>">
            <?php if ($producto->imagen != NULL):?>
            <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>">
            <?php else: ?>
            <img src="assets/img/camiseta.png">
            <?php endif; ?>
            <h2><?= $producto->nombre ?></h2>

            </a>

            <p><?= $producto->precio ?> Euros</p>
            <a href="<?=base_url?>Carrito/add&id=<?=$producto->id?>" class="button">Comprar</a>
        </div>
        
        <?php endwhile;?>