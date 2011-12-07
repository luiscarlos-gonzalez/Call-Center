<?php
	class Modelo_estado_civil extends CI_Model{
	
		var $idEstado;
		var $estadoCivil;
		
		function __construct(){
			
			parent::__construct();
		}

		function anadeEstadoCivil(){
		
			$this->estadoCivil = $this->input->post('estadoCivil');
			
			$this->db->insert('EstadoCivil', $this);

		}

		function obtenerTodosLosEstadosCiviles(){
			
			$query = $this->db->get('EstadoCivil');
			
			return $query->result();
		}
	}
		
?>