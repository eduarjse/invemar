<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imprimir extends CI_Controller {

	public function __construct(){
		parent::__construct();				
        $this->load->model('mimprimir');	        
    }

    public function index() {
		$this->load->view('headers');
		$idUsuario = $this->session->userdata('s_idUsuario');
		$tipoUsuario['tipo'] = $this->session->userdata('s_tipo');
        //$data['menu']= $this->mmenu->cargarMenu($idUsuario);
		$data['menu']= $this->mmenu->cargarMenuByTipoUsuario($this->session->userdata('s_tipo')); 
        $data['tipo']= $this->session->userdata('s_tipo');               
    }

    public function historiaClinica($NAI = 'AiepiSoft', $orientacion = "P", $hoja = "Letter") {

        $historiaClinica = $this->mimprimir->getHistoriaClinica($NAI);
        if (empty($historiaClinica)) {
            $this->load->view('headers');
            $this->load->view('message', array('text' => 'NO EXISTE HISTORIA CLINICA PARA EL
                                                          NUMERO DE CITA <strong>'.$NAI.' </strong>'));
            $this->load->view('footer');
            return;
        }
        $antecedentes = $this->mimprimir->getAntecentesPersonalesByCodPaciente($historiaClinica->Id);
        $firmaMedico = $this->mimprimir->getFirmaMedico($historiaClinica->CedulaMedico);
        $revisionSistema = $this->mimprimir->getRevisionPorSistemas();
        $antecedentesGinecologico = $this->mimprimir->getAntecedentesGinecologicos();
        $examenFisico = $this->mimprimir->getExamenFisico($NAI);
        $receta = $this->mimprimir->getReceta($NAI);
        $ordenesProcedimiento = $this->mimprimir->getOrdenesProcedimiento($NAI);
        $recetaPyP = $this->mimprimir->getRecetaPyP($NAI);
        $ordenPyP = $this->mimprimir->getOrdenPyP($NAI);
        

        $this->load->library('myfpdf');
        $data['orientacion'] = $orientacion;
        $data['size'] = $hoja;
        $data['NAI'] = $NAI;  
        $data['historia'] = json_encode($historiaClinica);
        $data['hc'] = $historiaClinica;
        $data['antecedentes'] = $antecedentes;
        $data['firmaMedico'] = $firmaMedico;
        $data['revisionSistema'] = $revisionSistema;
        $data['antGinecologico'] = $antecedentesGinecologico;
        $data['examenFisico'] = $examenFisico;
        $data['receta'] = $receta;
        $data['ordenesProcedimiento'] = $ordenesProcedimiento;
        $data['recetaPyP'] = $recetaPyP;
        $data['ordenPyP'] = $ordenPyP;
        
        $this->load->view('pdf/HistoriaClinica', $data);
    }    

    public function historiaClinicaEmbarazada($NAI = 'AiepiSoft', $numHijo = 1, $orientacion = "P", $hoja = "Letter") {

        $historiaClinica = $this->mimprimir->getHistoriaClinicaEmbarazo($NAI);
        if (empty($historiaClinica)) {
            $this->load->view('headers');
            $this->load->view('message', array('text' => 'NO EXISTE HISTORIA CLINICA DE EMBARAZADA PARA EL
                                                          NUMERO DE CITA <strong>'.$NAI.' </strong>'));
            $this->load->view('footer');
            return;
        }
        $examenFisico = $this->mimprimir->getExamenFisico($NAI);
        $diagnostico = $this->mimprimir->getDiagnosticoHistoriaClinica($NAI);
        $ordenPyP = $this->mimprimir->getOrdenPyP($NAI);
        $especialidad = $this->mimprimir->getEspecialidad($NAI);
        $riesgoEmbarazo = $this->mimprimir->getRiesgoEmbarazo($historiaClinica->CodPaciente);
        $tamizaje = $this->mimprimir->getTamizajeClinica($historiaClinica->CodPaciente);
        $historialEmbarazo = $this->mimprimir->getHistorialEmbarazo($historiaClinica->CodPaciente, $numHijo);

        $this->load->library('myfpdf');
        $data['orientacion'] = $orientacion;
        $data['size'] = $hoja;
        $data['NAI'] = $NAI;  
        $data['historia'] = json_encode($historiaClinica);
        $data['hc'] = $historiaClinica;
        $data['examenFisico'] = $examenFisico;
        $data['diagnostivo'] = $diagnostico;        
        $data['ordenPyP'] = $ordenPyP;
        $data['especialidad'] = $especialidad;
        $data['riesgoEmbarazo'] = $riesgoEmbarazo;
        $data['tamizaje'] = $tamizaje;
        $data['he'] = $historialEmbarazo;
        
        //echo json_encode($historiaClinica);

        $this->load->view('pdf/HistoriaClinicaEmbarazada', $data);
    }    
} ?>