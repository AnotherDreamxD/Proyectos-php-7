<?php 

require_once('models/categoria.php');
require_once('models/producto.php');

    class categoriaController{
        public function index(){
            Utils::isAdmin();
            $categoria = new Categoria();
            $categorias = $categoria->getAll();
            require_once('views/categoria/index.php');
        }

        public function crear(){
            Utils::isAdmin();
            require_once('views/categoria/crear.php');
        }

        public function save(){
            Utils::isAdmin();
            #guardar la Categoria
            if(isset($_POST['nombre']) && $_POST){
                $nombre = $_POST['nombre'];
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                $categoria->save();
            }

            
            header('location:'.base_url."categoria/index");

        }

        public function ver(){
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                #conseguir categoria
                $categoria = new Categoria();
                $categoria->setId($id);
                $categoria = $categoria->getOne();

                #Conseguir Productos
                $producto = new Producto();
                $producto->setCategoria_id($id);
                $productos = $producto->getAllCategoria();
            }
            require_once('views/categoria/ver.php');
        }
    }

?>