<?php 
require_once('modeloBase.php');
    class Nota extends ModeloBase{
        public $usuario_id;
        public $titulo;
        public $descripcion;


    public function __construct()
    {
        parent::__construct();
    }
        
    function getUsuario_Id()
    {
        return $this->usuario_id;
    }
    function setUsuario_Id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    function getTitulo()
    {
        return $this->titulo;
    }
    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }
    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function guardar()
    {
        $query = $this->db->query("INSERT INTO notas (usuario_id,titulo,descripcion,fecha)VALUE( {$this->usuario_id},'{$this->titulo}','{$this->descripcion}', CURDATE() ) ");
        return $query;
    }
    

    

    
    }

?>