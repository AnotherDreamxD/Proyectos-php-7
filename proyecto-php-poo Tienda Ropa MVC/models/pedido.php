<?php 


class Pedido{
	private $id;
	private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $oferta;
    private $fecha;
    private $hora;
    private $db;

	public function __construct() {
		$this->db = Database::connect();
	}
    function getId() {
		return $this->id;
	}

	function getUsuario_id() {
		return $this->usuario_id;
	}

	function getProvincia() {
		return $this->provincia;
   	}

	function getLocalidad() {
		return $this->localidad;
	}
    function getDireccion() {
		return $this->direccion;
	}

	function getCoste() {
		return $this->coste;
	}

	function getEstado() {
		return $this->estado;
	}

	function getOferta() {
		return $this->oferta;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getHora() {
		return $this->hora;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setUsuario_id($usuario_id) {
		$this->usuario_id = $usuario_id;
	}

	function setProvincia($provincia) {
		$this->provincia = $this->db->real_escape_string($provincia);
	}

	function setLocalidad($localidad) {
		$this->localidad = $this->db->real_escape_string($localidad);
	}

    function setDireccion($direccion){
        $this->direccion = $this->db->real_escape_string($direccion);
    }

	function setCoste($coste) {
		$this->coste = ($coste);
	}

	function setEstado($estado) {
		$this->estado = $this->db->real_escape_string($estado);
	}

	function setOferta($oferta) {
		$this->oferta = $oferta;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function sethora($hora) {
		$this->hora = $hora;
	}

    public function getAll(){
        $sql = "SELECT * FROM pedidos ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }



    public function getOne(){
        $sql = "SELECT * FROM pedidos WHERE id = {$this->getId()} ";
        $producto = $this->db->query($sql);
        return $producto->fetch_Object();
    }

	public function getOneByUser(){
        $sql = "SELECT p.id, p.coste FROM pedidos p  WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1 ";
        $pedido = $this->db->query($sql);
	
        return $pedido->fetch_Object();
    }
	public function getAllByUser(){
        $sql = "SELECT p.* FROM pedidos p  WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC ";
        $pedido = $this->db->query($sql);
	
        return $pedido;
    }

	public function getProductsByPedido($id){

		$sql = "SELECT pr.*, lp.unidades from productos pr INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id WHERE lp.pedido_id = {$id}";
		$productos = $this->db->query($sql);
	
        return $productos;

	}



    public function save(){

        $sql = "INSERT INTO pedidos VALUES(NULL,'{$this->getUsuario_id()}', '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}',{$this->getCoste()}, 'confirm', curdate(), curtime() );";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }

	public function saveLinea(){
		$sql= "SELECT LAST_INSERT_ID() as 'pedido' ;";
		$query = $this->db->query($sql);
		$pedido_id = $query->fetch_object()->pedido;

		foreach ($_SESSION['carrito'] as $elemento) {
			$producto = $elemento['producto'];
			$insert = "INSERT INTO lineas_pedidos VALUES (NULL,{$pedido_id},{$producto->id},{$elemento['unidades']});";
			$save = $this->db->query($insert);
		}

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	
	}

	public function updateOne(){
		$sql = "UPDATE pedidos SET estado='{$this->getEstado()}'  WHERE id={$this->getId()};";
	
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

  

}

?>