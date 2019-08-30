<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especie extends CI_Controller {

	public function __construct(){
		parent::__construct();				
        $this->load->model('mcomun');	        
    }

    public function index() {
        $this->load->view('headers');
        $this->load->view('especies');
        $this->load->view('footer');
    }

    public function guardar() {
        $id = $this->input->post('id');
        $data = array(
            'nombre_comun' => $this->input->post('txt_nombre'),
            'nombre_cientifico' => $this->input->post('txt_nCientifico'),
            'familia' => $this->input->post('txt_familia')
        );

        $row = $this->mcomun->guardar($id, 'especie', $data);
        echo json_encode(array('TIPO' => $row, 'MENSAJE' => 'Especie se guardo correctamente'));
    }

    public function listado_especies() {
        $filtro = array($this->input->post('cmbFiltro') => $this->input->post('txtFiltro'));

        $data = $this->mcomun->list_from_like_data('especie', $filtro);
        echo json_encode($data);
    }

    public function eliminar($ID) {
        echo $this->mcomun->eliminar($ID, 'especie');
    }
}