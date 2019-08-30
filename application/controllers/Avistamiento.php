<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avistamiento extends CI_Controller {

    public $tbl_name = "avistamiento"; 

	public function __construct(){
		parent::__construct();				
        $this->load->model('mcomun');	  
        $this->load->model('mavistamiento');	        
    }

    public function index() {
        $this->load->view('headers');
        $this->load->view('avistamientos');
        $this->load->view('footer');
    }
    

    public function guardar() {
        if ($this->input->post('cmbEspecie') == 0) {
            echo json_encode(array('TIPO' => 0, 'MENSAJE' => 'Debe seleccionar una especie'));
            return;
        }   
        if ($this->input->post('cmbLugar') == 0){
            echo json_encode(array('TIPO' => 0, 'MENSAJE' => 'Debe seleccionar un lugar'));
            return;
        }

        $id = $this->input->post('id');
        $data = array(
            'especie' => $this->input->post('cmbEspecie'),
            'lugar' => $this->input->post('cmbLugar'),
            'latitud' => $this->input->post('txt_latitud'),
            'longitud' => $this->input->post('txt_longitud'),
            'autor' => $this->input->post('txt_autor'),
            'observacion' => $this->input->post('txt_observacion') 
        );

        $row = $this->mcomun->guardar($id, $this->tbl_name, $data);
        echo json_encode(array('TIPO' => $row, 'MENSAJE' => 'Avistamiento se guardo correctamente'));
    }

    public function listado_avistamientos() {
        //$filtro = array($this->input->post('cmbFiltro') => $this->input->post('txtFiltro'));
        $data = array('autor' => $this->input->post('txtFiltro'));
        if ($this->input->post('cmbFEspecie') > 0) {
            $data['especie'] = $this->input->post('cmbFEspecie');
        } 
        if ($this->input->post('cmbFLugar') > 0) {
            $data['lugar'] = $this->input->post('cmbFLugar');
        } 

        $data = $this->mavistamiento->listado($data);
        echo json_encode($data);
    }
}