<?php if (isset($pro)) : ?>

    <h1> <?= $pro->nombre ?> </h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($pro->imagen != NULL) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png">
            <?php endif; ?>
        </div>
        <div class="data">
            <h2 class="description"><?= $pro->descripcion?></h2>
            </a>
            <p class="price"><?= $pro->precio ?> Euros</p>
            <a href="<?=base_url?>Carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1> El Productto no Existe</h1>

<?php endif; ?>