<?php
	class Login extends CI_Controller{
		public function index(){
			//importacion de las librerias
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->library('session');
			
			$this->load->view('login_view');
		}
		public function acceder(){
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('usuario', 'Usuario', 'required|callback_checa_usuario');
			$this->form_validation->set_rules('contrasena', 'Contraseña', 'required|callback_checa_contrasena');
		    $this->form_validation->set_message('checa_usuario', 'Usuario no encontrado');
		    $this->form_validation->set_message('checa_contrasena', 'Contraseña incorrecta');
			
			if($this->form_validation->run() == false){
				$this->load->helper('url');
			    $this->load->library('session');
			    $this->load->library('form_validation');
				$this->load->view('login_view');
			}else{
			    $this->load->library('session');
			    $this->load->helper('url');
			    $this->load->library('form_validation');
			    $this->session->set_userdata(array('id_agente'=>$this->input->post('usuario')));
				redirect('http://luiscarlosdeveloper.8it.be/index.php/app/');
				
			}
		}
		function checa_usuario($str){
		    $this->load->database();
		    $nombre = $this->db->get_where('Agente', array('username' => $str), 1);

		    if($nombre->num_rows() != 0){
		        return true;
		    }else{
		        return false;
		    }
		}
		function checa_contrasena($str){
		    $this->load->database();
		    $nombre = $this->db->get_where('Agente', array('password' => $str), 1);

		    if($nombre->num_rows() != 0){
		        return true;
		    }else{
		        return false;
		    }
		}
		public function salir(){
			$this->load->library('session');
		    $this->session->sess_destroy();
			$this->load->library('form_validation');
			$this->load->helper('url');
			redirect('http://luiscarlosdeveloper.8it.be');
		    
		}
	}
?>
