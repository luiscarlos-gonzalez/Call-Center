<?php

class Modelo_pedido extends CI_Model{
    
    var $subtotal = "";
    var $iva = "";
    var $total="";
    var $Cliente_idCliente="";
    var $Agente_idAgente="";
    var $EstadoPedido_idEstadoPedido="";
    var $RazonCancelacion_idRazonCancelacion="";
	

 public function __construct()
    {
       
        parent::__construct();
    }
   
    
    public function anadePedido($id_cliente, $id_agente)
    {
		$this->subtotal = 0;
		$this->iva = 0;
		$this->total = 0;
		$this->Cliente_idCliente = (int)$id_cliente;
		$this->Agente_idAgente = $id_agente;
		$this->EstadoPedido_idEstadoPedido = 2;
		$this->RazonCancelacion_idRazonCancelacion = 1;
       
       
       $this->db->insert('Pedido', $this);
	   
		$this->db->select_max('idPedido');
		$query = $this->db->get('Pedido');
		
		return $query->result();
    }

    
    public function anadeProducto($id_pedido, $id_producto)
    {
		$data = array(
			'Pedido_idPedido' => (int)$id_pedido,
		   'Producto_idProducto' => (int)$id_producto
		);
		$this->db->insert('Pedido_has_Producto', $data); 
		
		$num = $this->db->get('Pedido_has_Producto');
		
		$producto_query = $this->db->get_where('Producto', array('idProducto'=>$id_producto), 1);
		$producto = $producto_query->result();
		
		$pedido_query = $this->db->get_where('Pedido', array('idPedido' => $id_pedido), 1);
		$pedido = $pedido_query->result();
		
		$sub_total = $pedido[0]->subtotal + $producto[0]->precio;
		$iva = $sub_total * .15;
		$total = $sub_total + $iva;
		
		$this->db->where('idPedido', $id_pedido);
		$this->db->update('Pedido', array('subtotal'=>$sub_total, 'iva'=> $iva, 'total'=>$total));
		
		return $num->num_rows();
        
    }

   
    public function obtenerPedidoPorCleinteId($id_cliente)
    {
       $query = $this->db->query('SELECT Producto.nombre, Producto.descripcion, Producto.precio, Producto.foto FROM Producto, `Pedido_has_Producto` WHERE `Pedido_has_Producto`.Pedido_idPedido = '.$id_cliente.' AND Producto.idProducto = `Pedido_has_Producto`.Producto_idProducto;');
	
       return $query->result();
    }

} 

?>
