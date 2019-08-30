<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lugar extends CI_Controller {

    public $tbl_name = "lugar"; 

	public function __construct(){
		parent::__construct();				
        $this->load->model('mcomun');	        
    }

    public function index() {
        $this->load->view('headers');
        $this->load->view('lugares');
        $this->load->view('footer');
    }

    public function guardar() {
        $id = $this->input->post('id');
        $data = array(
            'pais' => $this->input->post('txt_pais'),
            'departamento' => $this->input->post('txt_departamento'),
            'nombre' => $this->input->post('txt_nombre'),
            'alias' => $this->input->post('txt_alias') 
        );

        $row = $this->mcomun->guardar($id, $this->tbl_name, $data);
        echo json_encode(array('TIPO' => $row, 'MENSAJE' => 'Lugar se guardo correctamente'));
    }

    public function listado_lugares() {
        $filtro = array($this->input->post('cmbFiltro') => $this->input->post('txtFiltro'));

        $data = $this->mcomun->list_from_like_data($this->tbl_name, $filtro);
        echo json_encode($data);
    }

    public function eliminar($ID) {
        echo $this->mcomun->eliminar($ID, $this->tbl_name);
    }
}