<?php require_once('includes/redireccion.php') ?>
<?php require_once('includes/cabecera.php')?>
<?php require_once('includes/lateral.php') ?>


<div id="principal">
        <h1>Crear Entradas</h1>
        <p>
            Añade nuevas Entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido.
        </p>
        <br>

        <form action="guardar-entrada.php" method="post">
            <label for="titulo">Titulo de la Entrada</label>
            <input type="text" name="titulo" id="">
            <?php echo isset($_SESSION['errores_entrada'])?mostrarError($_SESSION['errores_entrada'],'titulo'): ''; ?>

            <label for="descripcion">Descripcion de la Entrada</label>
            <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
            <?php echo isset($_SESSION['errores_entrada'])?mostrarError($_SESSION['errores_entrada'],'descripcion'): ''; ?>

            <label for="categoria">Categoria de la Entrada</label>
            <select name="categoria" id="">
                
                <?php $categorias = conseguirCategorias($db);
                if (!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):?>
                        <option value="<?=$categoria['id']?>">
                            <?= $categoria['nombre'] ?>
                        </option>
                <?php endwhile;
                endif;?>
            </select>
            <?php echo isset($_SESSION['errores_entrada'])?mostrarError($_SESSION['errores_entrada'],'categoria'): ''; ?>

            <input type="submit" value="guardar">
        </form>

        <?php borrarErrores(); ?>
        
 </div>
    

<?php require_once('includes/pie.php') ?>