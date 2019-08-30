<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Mavistamiento extends CI_Model {
	function __construct() {
		parent::__construct();	
		$this->load->database();
    }

    function listado($data) {
        /*$sql = "SELECT * 
                FROM avistamiento a
                INNER JOIN especie e ON a.especie = e.ID
                INNER JOIN lugar l ON a.lugar = l.ID";

        $query = $this->db->query($sql);						
        return $query->result();   */

        $this->db->select('*');
        $this->db->from('avistamiento a');
        $this->db->join('especie e', 'a.especie = e.ID');
        $this->db->join('lugar l', 'a.lugar = l.ID');
        $this->db->like($data);

        $query = $this->db->get();                
        return $query->result();
             
    }
}