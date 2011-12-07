<?php

	class Modelo_cliente extends CI_Model{
	
		var $nombre;
		var $apellidoPaterno;
		var $apellidoMaterno;
		var $calleYNumero;
		var $colonia;
		var $codigoPostal;
		var $estado;
		var $ciudad;
		var $municipio;
		var $numeroTelefonico;
		var $fechaDeNacimiento;
		var $genero;
		var $Lada_idLada;
		var $EstadoCivil_idEstado;
	
		function __construct(){
			
			parent::__construct();
		}
		
		function nuevoCliente(){

			$this->nombre = $this->input->post('nombre');
			$this->apellidoPaterno = $this->input->post('apellidoPaterno');
			$this->apellidoMaterno = $this->input->post('apellidoMaterno');
			$this->calleYNumero = $this->input->post('calleYNumero');
			$this->colonia = $this->input->post('colonia');
			$this->codigoPostal = $this->input->post('codigoPostal');
			$this->estado = $this->input->post('estado');
			$this->ciudad = $this->input->post('ciudad');
			$this->municipio = $this->input->post('municipio');
			$this->numeroTelefonico = $this->input->post('numeroTelefonico');
			$this->fechaDeNacimiento = $this->input->post('fechaDeNacimiento');
			$this->genero = $this->input->post('genero');
			$this->Lada_idLada = $this->input->post('Lada_idLada');
			$this->EstadoCivil_idEstado = $this->input->post('EstadoCivil_idEstado');
						
			$this->db->insert('Cliente', $this);
			
			$this->db->select_max('idCliente');
			$query = $this->db->get('Cliente');
		
			return $query->result();
		
		}
		
		function obtenerClientePorId($id){
				
			$query = $this->db->get_where('Cliente', array('idCliente'=>(int)$id));
			return $query->result();
		
		}
		
		function obtenerTodosLosClientes(){
			
			$query = $this->db->get('Cliente');
			
			return $query->result();
			
		}
		
		function obtenerClientePorTel($telefono){
			$query = $this->db->get_where('Cliente', array('numeroTelefonico' => $telefono));
			return $query->result();
		
		}
	}

?>	
		
