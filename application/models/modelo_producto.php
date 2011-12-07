<?php


class Modelo_producto extends CI_Model {
	var $claveInterna;
	var $nombre;
	var $descripcion;
	var $precio;
	var $foto;
	


	function __construct() {
        parent::__construct();
    }

	function anadeProducto () {
		
		$this->claveInterna = $this->input->post('claveInterna');
		$this->nombre = $this->input->post('nombre');
		$this->descripcion = $this->input->post('descripcion');
		$this->precio = $this->input->post('precio');
		$this->foto = $this->input->post('foto');
		
		$this->db->insert('Producto', $this); 
	}

	function obtenProductoPorId ($claveInterna) {
		$query = $this->db->get_where('Producto', array('claveInterna' => $this->input->post('claveInterna')), $limit, $offset);
	
		return $query->result();
	}
	
	function obetnerTodosLosProductos() {
		$query = $this->db->get('Producto');
		
		return $query->result();
	}
}

?>
