<?php require_once('includes/cabecera.php');?>
<?php require_once('includes/conexion.php');?>
<?php require_once('includes/helpers.php') ?>
<?php require_once('includes/redireccion.php') ?>
<?php $entradaActual = conseguirentrada($db,$_GET['id']);

    if (!isset($entradaActual['id'])) {
        header('Location:index.php');
    }

?>
<?php require_once('includes/lateral.php') ?>



<div id="principal">
        <h1>Editar Entradas</h1>
        <p>
            Edita tu entrada <?= $entradaActual['titulo'] ?>
        </p>
        <br>

        <form action="guardar-entrada.php?editar= <?= $entradaActual['id'] ?> " method="post">
            <label for="titulo">Titulo de la Entrada</label>
            <input type="text" name="titulo" id="" value="<?= $entradaActual['titulo'] ?>">
            <?php echo isset($_SESSION['errores_entrada'])?mostrarError($_SESSION['errores_entrada'],'titulo'): ''; ?>

            <label for="descripcion">Descripcion de la Entrada</label>
            <textarea name="descripcion" id="" cols="30" rows="10" value="<?= $entradaActual['descripcion'] ?>"></textarea>
            <?php echo isset($_SESSION['errores_entrada'])?mostrarError($_SESSION['errores_entrada'],'descripcion'): ''; ?>

            <label for="categoria">Categoria de la Entrada</label>
            <select name="categoria" id="">
                
                <?php $categorias = conseguirCategorias($db);
                if (!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):?>

                        <option value="<?=$categoria['id']?>"<?=($categoria['id'] == $entradaActual['categoria_id']) ? 'selected="selected"': ''?>>
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