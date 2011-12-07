<?php
	class ModeloEstadoCivil extends CI_Model{
	
		var $idEstado;
		var $estadoCivil;
		
		function __construct(){
			
			parent::__construct();
		}

		function anadeEstadoCivil(){
		
			$this->estadoCivil = $this->input->post('estadoCivil');
			
			$this->db->insert('estadocivil', $this);

		}

		function obtenerTodosLosEstadosCiviles($idEstado){
			
			$query = $this->db->get('estadocivil');
			
			return $query->result();
		}
	}
		
?>