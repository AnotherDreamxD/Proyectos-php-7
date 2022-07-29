<?php 

    class NotaController{

        public function listar(){
            require_once('models/nota.php');
            $nota = new Nota();
            $notas = $nota-> conseguirTodos('notas');
            require_once('views/nota/lista.php');
        }

        public function crear(){
            require_once('models/nota.php');
            $nota = new Nota();
            $nota->setUsuario_Id(1);
            $nota->setTitulo('Nota de PHP MVC');
            $nota->setDescripcion('Descripcion de mi nota');
            $guardar = $nota->guardar();


            header('Location:index.php?controller=Nota&action=listar');

        }
        
        public function borrar(){
            
         }
    }

?>