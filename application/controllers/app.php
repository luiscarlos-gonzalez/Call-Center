<?php
	class App extends CI_Controller{
		
		/*
		 *  Este funcion llamara a todos los cleintes de la base de datos usando 
		 *  la funcion obtenerTodosLosClientes() en el modelo modelo_cliente 
		 * y se lo pasamos a la vista llamada index.php
		 */
		function index(){
			//$this->load->helper('url');
			//$this->load->library('session');
			$this->load->library('session');
				$this->load->helper('url');
			if($this->session->userdata('id_agente') != false){	
				$this->load->model('modelo_cliente');
				$this->load->database();
			
				$obyenerClientes = $this->modelo_cliente->obtenerTodosLosClientes();
			
				$this->load->view('index', array('clientes'=>$obyenerClientes));
			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			
			
		}
		/*
		 * Esta funcion llamara al pedido que corresponde a esta llamada y cliente utilizara la funcion 
		 * obtenerPedidoPorCleinteId(id_cliente : Integer) del modelo llamado Modelo_pedido y se lo 
		 * pasa a la vista llamada vistaPedido.php. hola TEAM
		 * 
		 */
		function pedido(){
			$this->load->library('session');
				$this->load->helper('url');
			if($this->session->userdata('id_agente') != false){
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('modelo_pedido');
			
			$obtenerPedidoIdCliente = $this->modelo_pedido->obtenerPedidoPorCleinteId($this->uri->segment(3));
			$totales_query = $this->db->get_where('Pedido', array('idPedido'=>$this->uri->segment(3)));
			$totales = $totales_query->result();
				$this->load->view('vistaPedido', array('pedidos'=>$obtenerPedidoIdCliente, 'totales' => $totales));
			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			
			
		}
		/*
		 * Esta funcion llamara a la interfaz donde se mostraran los productos y se tendra la oportunidad de añadir un producto
		 * Utilizara las funciones obtenerPedidoPorCleinteId(id_cliente : Integer) y obtenerProductos()
		 */
		function levanta_pedido(){
			
			$this->load->library('session');
			$this->load->helper('url');
			if($this->session->userdata('id_agente') != false){
			
			$this->load->model('modelo_producto');
			$this->load->model('modelo_cliente');
			$this->load->model('modelo_lada');
			$this->load->model('modelo_estado_civil');
			$this->load->database();
			
			$obtenerProductos = $this->modelo_producto->obetnerTodosLosProductos();
			
			$cliente = $this->modelo_cliente->obtenerClientePorId($this->uri->segment(3));
			
			$ladas = $this->modelo_lada->obtenTodasLasLadas();
			
			$estados = $this->modelo_estado_civil->obtenerTodosLosEstadosCiviles();
			
			$this->load->view('appCatalogoPedido', array('productos'=> $obtenerProductos, 'clientes'=> $cliente, 'ladas' => $ladas, 'estados'=>$estados));

			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			
		    	
		}
		/*
		 * Funcion que desata el evento drop en la interfaz, añade un producto al pedido, utilizara la funcion añadeProducto(id_pedido : Integer,id_producto : Integer)
		 * regresara el numero de productos en el pedido.
		 * 
		 */
		function ajax_pone_producto_pedido(){
			$this->load->library('session');
			$this->load->helper('url');
			if($this->session->userdata('id_agente') != false){
			$this->load->database();
			$this->load->model('modelo_pedido');	
				$numero = $this->modelo_pedido->anadeProducto($this->input->post('Pedido_idPedido'), $this->input->post('Producto_idProducto'));
			
				echo json_encode(array('numero' => $numero));	
			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			

		    	
		}
		/*
		 * Obtiene todos los productos de la base de datos y los regresa en formato json utiliza la funcion obtenerProductos(), esto sera cuando sea llamado por la interfaz al buscar un producto
		 * desde la barra de busqueda
		 * 
		 */
		function ajax_obten_productos(){
			
			$this->load->library('session');
			$this->load->helper('url');
			if($this->session->userdata('id_agente') != false){
			$this->load->database();
			$this->load->model('modelo_producto');
				$productos = $this->modelo_producto->obetnerTodosLosProductos();
			
				echo json_encode($productos);	
			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			
			
		}
		/*
		 * Se desata cuando le dan click en el boton de contestar usara la funcion iniciaLlamada(id_agente : Integer,id_cliente : Integer) de el modelo 
		 * Modelo_llamada
		 * 
		 */
		function ajax_inicia_llamada(){
			
			$this->load->database();
			$this->load->library('session');
			$this->load->model('modelo_llamada');
			$this->load->model('modelo_pedido');
			$this->load->helper('url');
			$this->load->helper('date');
			
			/////////Codigo temporal de prueba/////////
			
			$this->session->set_userdata(array('id_agente' => 1));
			
			//////////////////////////////////////////
			if($this->session->userdata('id_agente') != false){
				$ultimo_id = $this->modelo_llamada->iniciaLlamada($this->session->userdata('id_agente'));
				$ultimo_pedido = $this->modelo_pedido->anadePedido($this->input->post('id_cliente'), $this->session->userdata('id_agente'));
			
				echo json_encode(array('ultima_llamada'=>$ultimo_id, 'ultimo_pedido'=>$ultimo_pedido));	
			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			
			
		}
		/*
		 * Se desata cuando le dan click en el boton de colgar utiliza la funcion finalizaLlamada(id_llamada : Integer) del modelo
		 * Modelo_llamada
		 */
		function ajax_finaliza_llamada(){
			$this->load->database();
			$this->load->library('session');
			$this->load->model('modelo_llamada');
			$this->load->helper('url');
			$this->load->helper('date');
			if($this->session->userdata('id_agente') != false){
				$this->modelo_llamada->finalizaLlamada();
			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			
			
		}
		/*
		 * Añade cliente a la base de datos
		 * 
		 * 
		 */
		function ajax_pone_cliente(){
			
			$this->load->database();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('modelo_cliente');
			if($this->session->userdata('id_agente') != false){
				echo json_encode($this->modelo_cliente->nuevoCliente());
			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			
			
		
		}
		function ajax_pone_pedido(){
			
			$this->load->database();
			$this->load->library('session');
			$this->load->model('modelo_pedido');
			$this->load->helper('url');
			if($this->session->userdata('id_agente') != false){
				$ultimo = $this->modelo_pedido->anadePedido($this->input->post('Cliente_idCliente') ,$this->session->userdata('id_agente'));
				echo json_encode($ultimo);
			}else{
				redirect('http://luiscarlosdeveloper.8it.be');
			}
			
			
			
		}
		function llamadaDesconocido(){
			
			$this->load->library('session');
			$this->load->helper('url');
			if($this->session->userdata('id_agente') != false){	
				$this->load->model('modelo_cliente');
				$this->load->model('modelo_lada');
				$this->load->model('modelo_estado_civil');
				$this->load->database();
			
				$obyenerClientes = $this->modelo_cliente->obtenerTodosLosClientes();			
				$ladas = $this->modelo_lada->obtenTodasLasLadas();
			
				$estados = $this->modelo_estado_civil->obtenerTodosLosEstadosCiviles();
			
			
				$this->load->view('index2', array('clientes'=>$obyenerClientes, 'ladas' => $ladas, 'estados'=>$estados));
				}else{
					redirect('http://luiscarlosdeveloper.8it.be');
				}
			
		}
	}
?>
