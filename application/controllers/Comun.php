<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comun extends CI_Controller {

    public function __construct() {
		parent::__construct();		
        $this->load->model('mcomun'); 
    }

    public function index() {
		$this->load->view('headers');
        $this->load->view('footer');
    }

    public function get_all_from($table) {
        echo json_encode($this->mcomun->getListFrom($table));
    }

    public function get_list_from_like($table, $field, $value = '') {
        echo json_encode($this->mcomun->list_from_like($table, $field, $value));
    }

    public function get_list_where($table, $field, $value = '') {
        echo json_encode($this->mcomun->list_from_where($table, $field, $value));
    }

    public function get_row_from_by_id($table, $id) {
        echo json_encode($this->mcomun->getRowFromById($table, $id));
    }
}