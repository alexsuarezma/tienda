<?php
class Pedido {
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }


    public function getId(){
        return $this->id;
    }

    public function getUsuario_id(){
        return $this->usuario_id;
    }

    public function getProvincia(){
        return $this->provincia;
    }

    public function getLocalidad(){
        return $this->localidad;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getCoste(){
        return $this->coste;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getHora(){
        return $this->hora;
    }


    public function setId($id){
        $this->id = $id;
    }
    
    public function setUsuario_id($usuario_id){
        $this->usuario_id = $usuario_id;
    }

    public function setProvincia($provincia){
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    public function setLocalidad($localidad){
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    public function setDireccion($direccion){
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    public function setCoste($coste){
        $this->coste = $coste;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getAll(){
        $pedidos = $this->db->query('SELECT * FROM pedidos ORDER BY id DESC;');
        return $pedidos;
    }

    public function getOne(){
        $pedidos = $this->db->query("SELECT * FROM pedidos WHERE id={$this->id}");
        return $pedidos->fetch_object();
    }

    public function getOneByUser(){
        $pedido = $this->db->query("SELECT id, coste FROM pedidos WHERE usuario_id={$this->getUsuario_id()} ORDER BY id DESC LIMIT 1");
    
        return $pedido->fetch_object();
    }

    public function getAllByUser(){
        $pedido = $this->db->query("SELECT * FROM pedidos WHERE usuario_id={$this->getUsuario_id()} ORDER BY id DESC");
    
        return $pedido;
    }

    public function getProductsByPedido($pedido_id){
        // $productos = $this->db->query("SELECT * FROM productos WHERE id IN (SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$pedido_id})");
        $productos = $this->db->query("SELECT pr.*,lp.unidades FROM productos AS pr, lineas_pedidos AS lp WHERE pr.id=lp.producto_id AND lp.pedido_id = {$pedido_id}");
        return $productos;
    }

    public function save(){
        $save = $this->db->query("INSERT INTO pedidos VALUES (NULL,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm',CURDATE(),CURTIME())");
   
        $this->result = false;
        if($save){
            $this->result = true;
        }
        return $this->result;
    }

    public function saveLinea(){
        $query =$this->db->query("SELECT LAST_INSERT_ID() AS 'pedido';");
        $pedidoId = $query->fetch_object()->pedido;
        
        foreach($_SESSION['carrito'] as $elemento){
            $producto = $elemento['producto'];

            $save = $this->db->query("INSERT INTO lineas_pedidos VALUES (NULL,{$pedidoId},{$producto->id},{$elemento['unidades']})");

        }

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function updateOneState(){
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}'";
        $sql .= " WHERE id={$this->id}"; 

        $save = $this->db->query($sql);

        $this->result = false;
        if($save){
            $this->result = true;
        }
        return $this->result;
    }

}