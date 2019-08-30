<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Mcomun extends CI_Model {
	function __construct() {
		parent::__construct();	
		$this->load->database();
    }

    function guardar($id, $tabla, $data) {
		if ($id == 0) {
			return $this->db->insert($tabla, $data);
		} else {
			$this->db->update($tabla, $data, array('ID' => $id));

			return $this->db->affected_rows();
		}
    }

    function eliminar($id, $tabla) {
        $this->db->delete($tabla, array('ID' => $id));

        return $this->db->affected_rows();
    }
    
    function getListFrom($tabla, $orderBy = 'ID') {
        $this->db->select('*');
        $this->db->from($tabla);
        $this->db->order_by($orderBy);
        
        $query = $this->db->get();
                
        return $query->result();
    }
		
    function getRowFromById($tabla, $id) {
        $this->db->select('*');
        $this->db->from($tabla);
        $this->db->where('ID', $id);
        $query = $this->db->get();

        return $query->row();
    }
    
    function getRowFromBy($tabla, $data) {
        $this->db->select('*');
        $this->db->from($tabla);
        $this->db->where($data);
        $query = $this->db->get();

        return $query->row();
    }

    function list_from_like_data($tabla, $data) {
        $this->db->select('*');
        $this->db->from($tabla);
        $this->db->like($data);
        //return $this->db->get_compiled_select();
        $query = $this->db->get();
                
        return $query->result();
    }

    /*  @params
            $tabla  // tabla que se desea consular
            $data   // array con los valores o cadena de string con los where 
                    // -- array
                        $array = array('name' => $name, 'title' => $title, 'status' => $status);
                        $this->db->where($array);
                        // Produces: WHERE name = 'Joe' AND title = 'boss' AND status = 'active'

                    // -- cadena
                        $where = "name='Joe' AND status='boss' OR status='active'";
                        $this->db->where($where);

    */
    function list_from_where_data($tabla, $data) {
        $this->db->select('*');
        $this->db->from($tabla);
        $this->db->where($data);
        //return $this->db->get_compiled_select();
        $query = $this->db->get();
                
        return $query->result();
    }

    function list_from_where($tabla, $field, $value) {
        $this->db->select('*');
        $this->db->from($tabla);
        $this->db->where($field, $value);
        //return $this->db->get_compiled_select();
        $query = $this->db->get();
                
        return $query->result();
    }
}