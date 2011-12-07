<?php

class Modelo_lada extends CI_Model{
   
    var $idLada="";
    var $lada="";
    
    function __construct()
    {
       
        parent::__construct();

	}
    
    public function añadeLada()
    {
      $this->lada = $this->input->post('lada'); 
      
      $this->db->insert('Lada', $this); 
    }

   
    public function obtenTodasLasLadas()
    {
		$query = $this->db->get('Lada');
       return $query->result();

       
    }

} 

?>
