<?php

class modelo_agente extends CI_Model {

	var $disponibilidad = '';
	var $nombre;
var $username;
var $password;
var $disponibilidad;
var $idAgente;
	
	function __construct() {
        parent::__construct();
    }

	function verificarUsuario ($username) {
		$query = $this->db->get_where('agente', array('username' => $this->input->post('username')));
	
		if ($query->num_rows() > 0) {
			return true;
		}
	
		else {
			return false;
		}
	}

	function verificarPassword ($password) {
		$query = $this->db->get_where('agente', array('password' => $this->input->post('password')));
	
		if ($query->num_rows() > 0) {
			return true;
		}
	
		else {
			return false;
		}
	}

	function verificarDisponibilidad () {
		$query = $this->db->get_where('agente', array('idAgente' => $this->input->post('idAgente')));
				
		if ($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				echo $row->disponibilidad;
				return true;
			}
		}
				
		else {
			return false;
		}
	}

	function ponerDisponibilidad () {
		$query = $this->db->get_where('agente', array('idAgente' => $this->input->post('idAgente')));
		
		if ($query->num_rows() == 0) {
			foreach ($query->result() as $row) {
				echo $row->disponibilidad;
			}
			
			$data = array(
               'diponibilidad' => $disponibilidad
            );

			$this->db->where('diponibilidad', $diponibilidad);
			$this->db->update('agente', $data); 
		}
		
		else {
			return false;
		}
	}

}

?>
