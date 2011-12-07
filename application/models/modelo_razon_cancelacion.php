<?php

class Modelo_razon_cancelacion extends CI_Model{

	var $razon = '';
		
	function __construct()
	{
		//Llamamos al modelo constructor
		parent::__construct();
		
	}
	
	function anadeRazon()
	{
	//inserto id de agente y id de cliente
		$this->razon = $this->input->post('razon');
		
		$this->db->insert('RazonCancelacion',$this);
	}
	
	function obtenerTodasLasRazones()
	{
	//inserto id de llamada anterior 
		$query = $this->db->get('RazonCancelacion');
		return $query->result();
	}
}
