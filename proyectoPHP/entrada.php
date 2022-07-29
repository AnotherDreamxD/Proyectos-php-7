<?php require_once('includes/cabecera.php');?>
<?php require_once('includes/conexion.php');?>
<?php require_once('includes/helpers.php') ?>
<?php $entradaActual = conseguirentrada($db,$_GET['id']);

    if (!isset($entradaActual['id'])) {
        header('Location:index.php');
    }

?>

<?php require_once('includes/lateral.php') ?>

    <div id="principal">
        
        
            <h1><?=$entradaActual['titulo']?> </h1>
            <a href="categoria.php?id= <?=$entradaActual['categoria_id'] ?>" >
            <h2><?=$entradaActual['categoria']?></h2>
            </a>
            <p><?=$entradaActual['descripcion']?></p>
            <h4><?=$entradaActual['fecha']?>|<?=$entradaActual['usuario']?> </h4>
     

    <?php if($_SESSION['usuario'] && $_SESSION['usuario']['id'] == $entradaActual['usuario_id'] ): ?>
        <br>
        <a href="editar-entrada.php?id=<?=$entradaActual['id'] ?> " class="boton boton-verde">Editar Entrada</a>
        <a href="borrar-entrada.php?id=<?=$entradaActual['id'] ?> " class="boton boton-rojo">Borrar Entrada</a>

    <?php endif;?>
    </div>
    

<?php require_once('includes/pie.php') ?>