<?php

class Modelo_llamada extends CI_Model{

	var $horainicio = '';
	var $horafinal = '';
	var $Agente_idAgente = '';
	var $Cliente_idCliente = '';
	
	function __construct()
	{
		//Llamamos al modelo constructor
		parent::__construct();
		
	}
	
	function iniciaLlamada($id_agente)
	{
	//inserto id de agente y id de cliente
		$this->Agente_idAgente = $id_agente;
		$this->Cliente_idCliente = (int)$this->input->post('id_cliente');
		$this->horainicio = unix_to_human(time(), true);
		
		$this->db->insert('Llamada', $this);
		
		$this->db->select_max('idLlamada');
		$query = $this->db->get('Llamada');
		
		return $query->result();
	}
	
	function finalizaLlamada()
	{
	//inserto id de llamada anterior 
		$id_llamada = (int)$this->input->post('id_llamada');
		
		$this->db->where('idLlamada ', $id_llamada);
		$this->db->update('Llamada', array('horaFinal' => unix_to_human(time(), true)));
		
	}
}

?>