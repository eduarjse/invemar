<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Mimprimir extends CI_Model {
    function __construct() {
		parent::__construct();	
		$this->load->database();
    }

    public function getHistoriaClinica($historiaClinica) {
        $sql = "SELECT
                Historial1.`Tipo`, Historial1.`Fecha`, Historial1.`NAI`, Historial1.`Hora`, Historial1.`CondicionUs`, Historial1.`DIncap`, Historial1.`MotivosC`, Historial1.`EnfAct`, Historial1.`Talla`, Historial1.`Peso`, Historial1.`TensioAi`, Historial1.`TensioA`, Historial1.`FreC`, Historial1.`FrecR`, Historial1.`Pc`, Historial1.`Temp`, Historial1.`EstadoG`, Historial1.`Observaciones1`, Historial1.`Finalidad`, Historial1.`Causaexte`, Historial1.`Diagnostico`, Historial1.`Diagnostico1`, Historial1.`Diagnostico2`, Historial1.`Diagnostico3`, Historial1.`TipoDiagnostico`,
                Medicos1.`Nombres`, Medicos1.`PrimerApelli`, Medicos1.`SeguApelli`, Medicos1.`NoRegPRof`, Medicos1.`Cedula` AS CedulaMedico,
                Diagnostico1.`De_CIE`,
                Diagnostico_11.`De_CIE` AS De_CIE1,
                Diagnostico_21.`De_CIE` AS De_CIE2,
                Diagnostico_31.`De_CIE` AS De_CIE3,
                Afiliado1.`Id`, Afiliado1.`IdentiAfiliado`, Afiliado1.`NombreyApellidos`, Afiliado1.`IdentificacionPaciente`, Afiliado1.`TipoDocumen`, Afiliado1.`EstadoCivil`, Afiliado1.`Sexo`, Afiliado1.`PriApellido`, Afiliado1.`SegApellido`, Afiliado1.`SegNombre`, Afiliado1.`Nombre`, Afiliado1.`Direccion`, Afiliado1.`Telefono`, Afiliado1.`AnteFami`, Afiliado1.`FechaNacimiento`, Ocupacion1.Ocupacion,
                Municipio.Departamento, Municipio.Municipio
            FROM
                { oj (((((`clinicaseg`.`Historial` Historial1 
                INNER JOIN `clinicaseg`.`Diagnostico` Diagnostico1 ON
                    Historial1.`Diagnostico` = Diagnostico1.`Cd_CIE`)
                INNER JOIN `clinicaseg`.`Diagnostico` Diagnostico_11 ON
                    Historial1.`Diagnostico1` = Diagnostico_11.`Cd_CIE`)
                INNER JOIN `clinicaseg`.`Diagnostico` Diagnostico_21 ON
                    Historial1.`Diagnostico2` = Diagnostico_21.`Cd_CIE`)
                INNER JOIN `clinicaseg`.`Diagnostico` Diagnostico_31 ON
                    Historial1.`Diagnostico3` = Diagnostico_31.`Cd_CIE`)
                INNER JOIN `clinicaseg`.`afiliado` Afiliado1 ON
                    Historial1.`CvePac` = Afiliado1.`IdentificacionPaciente`)
                INNER JOIN `clinicaseg`.`Medicos` Medicos1 ON
                    Historial1.`CveMed` = Medicos1.`Cedula`
                INNER JOIN `clinicaseg`.`ocupacion` Ocupacion1 ON
                    Afiliado1.Escolaridad = Ocupacion1.`CodigoOcupacion`
                INNER JOIN `clinicaseg`.`Municipio` Municipio ON
	                Municipio.cod_Dpto = Afiliado1.CodDep AND Municipio.cod_Munic = Afiliado1.codCiudad}
                    WHERE Historial1.`NAI`= ?
            ORDER BY
                Afiliado1.`IdentificacionPaciente` ASC,
                Historial1.`NAI` ASC";

        $query = $this->db->query($sql, $historiaClinica);						
        return $query->row();
    }

    public function getFirmaMedico($cedulaMedico) {
        $sql = "SELECT * FROM firma WHERE IdentificacionPaciente = ?";
        $query = $this->db->query($sql, $cedulaMedico);						
        return $query->row();
    }

    public function getAntecentesPersonalesByCodPaciente($codPaciente = '118815746') {
        $sql = "SELECT Antecedentes1.`CodAnte` CodAnte, Antecedentes1.`CodPaciente`, Antecedentes1.`CodMedico`, Antecedentes1.`Hora`, Antecedentes1.`Fecha`, Antecedentes1.`Observaciones`
                FROM `clinicaseg`.`Antecedentes` Antecedentes1
                WHERE Antecedentes1.`CodPaciente` = ?
                ORDER BY Antecedentes1.`CodPaciente` ASC";
        $query = $this->db->query($sql, $codPaciente);						
        return $query->result();
    }

    public function getRevisionPorSistemas($codPaciente = '1006576279') {
        $sql = "SELECT revisionsiste1.`CodAnte`, revisionsiste1.`CodPaciente`, revisionsiste1.`CodMedico`, revisionsiste1.`Hora`, revisionsiste1.`Fecha`, revisionsiste1.`Observaciones`
                FROM `clinicaseg`.`revisionsiste` revisionsiste1
                WHERE revisionsiste1.`CodPaciente` = ?
                ORDER BY revisionsiste1.`CodAnte` ASC";
        $query = $this->db->query($sql, $codPaciente);						
        return $query->result();
    }

    public function getAntecedentesGinecologicos($codPaciente = '0030741619') {
        $sql = "SELECT hginecologico1.`CodPaciente`, hginecologico1.`CodMedico`, hginecologico1.`Menarquia`, hginecologico1.`Frecuencia`, hginecologico1.`Duracion`, hginecologico1.`Regular`, hginecologico1.`Gravidez`, hginecologico1.`Parto`, hginecologico1.`Mortinato`, hginecologico1.`Aborto`, hginecologico1.`Cesarias`, hginecologico1.`Vivos`, hginecologico1.`Utopicos`, hginecologico1.`UltimaCitolog`, hginecologico1.`FrcuenciaCito`, hginecologico1.`ExamenMama`, hginecologico1.`UltimaPeriodo`, hginecologico1.`UltimaRegla`, hginecologico1.`ResultadoCit`
                FROM `clinicaseg`.`hginecologico` hginecologico1
                WHERE hginecologico1.`CodPaciente` = ?
                ORDER BY hginecologico1.`CodPaciente` ASC";

        $query = $this->db->query($sql, $codPaciente);						
        return $query->row();
    }

    public function getExamenFisico($codPaciente){
        $sql = "SELECT consexamen1.`Nombre`, hexamnenf1.`CodAdmision`, hexamnenf1.`Valor`, hexamnenf1.`Leyenda`, hexamnenf1.`Estado`
                FROM { oj `clinicaseg`.`consexamen` consexamen1 INNER JOIN `clinicaseg`.`hexamnenf` hexamnenf1 ON
                       consexamen1.`Id` = hexamnenf1.`Id`}
                WHERE hexamnenf1.`CodAdmision` = ?
                ORDER BY hexamnenf1.`CodAdmision` ASC";

        $query = $this->db->query($sql, $codPaciente);
        return $query->result();
    }

    public function getReceta($numCita = 0, $folio = 0) {
        $sql = "SELECT
                    Citas1.`NumCita`,
                    MedicanetosPaciente1.`CodigoMedi`, MedicanetosPaciente1.`NombreGenerico`, MedicanetosPaciente1.`NooUnida`, MedicanetosPaciente1.`Dosificacion`, MedicanetosPaciente1.`Folio`, MedicanetosPaciente1.`Frecuencia`, MedicanetosPaciente1.`Total`,
                    viaadmi1.`Descripcion` AS DescripcionVa,
                    tipofarmaceutico1.`Descripcion` AS DescripcionTf
                FROM
                    { oj ((`clinicaseg`.`Citas` Citas1 INNER JOIN `clinicaseg`.`MedicanetosPaciente` MedicanetosPaciente1 ON
                        Citas1.`NumCita` = MedicanetosPaciente1.`NoAutoInter`)
                    INNER JOIN `clinicaseg`.`tipofarmaceutico` tipofarmaceutico1 ON
                        MedicanetosPaciente1.`TipoF` = tipofarmaceutico1.`Codigo`)
                    INNER JOIN `clinicaseg`.`viaadmi` viaadmi1 ON
                        MedicanetosPaciente1.`Via` = viaadmi1.`codigo`}
                WHERE
                    Citas1.`NumCita` = ? AND
                    MedicanetosPaciente1.`Folio` = ?
                ORDER BY
                    Citas1.`NumCita` ASC";
        $query = $this->db->query($sql, array($numCita, $folio));
        return $query->result();
    }

    public function getOrdenesProcedimiento($codPaciente, $folio = 0) {
        $sql = "SELECT
                    Procedim1.`Nombre`,
                    REMPROCEDI1.`CodigoProc`, REMPROCEDI1.`TipoConsulta`, REMPROCEDI1.`NumAutorizacion`, REMPROCEDI1.`Cant`, REMPROCEDI1.`PorcentajeMEd`, REMPROCEDI1.`CodigoPP`,
                    Proceso1.`Nombre`
                FROM
                    { oj (`clinicaseg`.`Procedim` Procedim1 INNER JOIN `clinicaseg`.`remprocedi` REMPROCEDI1 ON
                        Procedim1.`Codigo` = REMPROCEDI1.`CodigoProc`)
                    INNER JOIN `clinicaseg`.`Proceso` Proceso1 ON
                        REMPROCEDI1.`TipoConsulta` = Proceso1.`Codigo`}
                WHERE
                    REMPROCEDI1.`NumAutorizacion` = ? AND
                    REMPROCEDI1.`PorcentajeMEd` = ?
                ORDER BY
                    REMPROCEDI1.`NumAutorizacion` ASC,
                    REMPROCEDI1.`TipoConsulta` ASC";

        $query = $this->db->query($sql, array($codPaciente, $folio));
        return $query->result();
    }

    public function getRecetaPyP($codPaciente) {
        $sql = "SELECT
                    citas1.`NumCita`,
                    detpypafiliado1.`Observaciones`, detpypafiliado1.`Cantidad`,
                    medicos1.`Nombres`, medicos1.`PrimerApelli`, medicos1.`SeguApelli`,
                    empresa1.`Identificacion`, empresa1.`Nombre`,
                    contenidopp1.`CodigoCups`, contenidopp1.`Descripcion`,
                    final1.`DESCRIPCION`
                FROM
                    { oj (((((`clinicaseg`.`citas` citas1 INNER JOIN `clinicaseg`.`detpypafiliado` detpypafiliado1 ON
                        citas1.`NumCita` = detpypafiliado1.`NumAutorizacion`)
                    INNER JOIN `clinicaseg`.`afiliado` afiliado1 ON
                        citas1.`CodPaciente` = afiliado1.`IdentificacionPaciente`)
                    INNER JOIN `clinicaseg`.`empresa` empresa1 ON
                        afiliado1.`CodEmpresa` = empresa1.`Identificacion`)
                    INNER JOIN `clinicaseg`.`contenidopp` contenidopp1 ON
                        detpypafiliado1.`CodigoG` = contenidopp1.`CodigoG`)
                    INNER JOIN `clinicaseg`.`medicos` medicos1 ON
                        detpypafiliado1.`OrdenadoPor` = medicos1.`Cedula`)
                    INNER JOIN `clinicaseg`.`final` final1 ON
                        contenidopp1.`CodigoCups` = final1.`CODIGO_COMPLETO_2`}
                WHERE
                    citas1.`NumCita` = ?
                ORDER BY
                    citas1.`NumCita` ASC";

        $query = $this->db->query($sql, $codPaciente);
        return $query->result();
    }

    public function getOrdenPyP($codPaciente) {
        $sql = "SELECT
                    citas1.`NumCita`,
                    detpypafiliado1.`Observaciones`, detpypafiliado1.`Cantidad`,
                    empresa1.`Identificacion`, empresa1.`Nombre`,
                    contenidopp1.`CodigoCups`, contenidopp1.`Descripcion`,
                    medicos1.`Nombres`, medicos1.`PrimerApelli`, medicos1.`SeguApelli`,
                    procedim1.`Tipo_proc`
                FROM
                    { oj (((((`clinicaseg`.`citas` citas1 INNER JOIN `clinicaseg`.`detpypafiliado` detpypafiliado1 ON
                        citas1.`NumCita` = detpypafiliado1.`NumAutorizacion`)
                    INNER JOIN `clinicaseg`.`afiliado` afiliado1 ON
                        citas1.`CodPaciente` = afiliado1.`IdentificacionPaciente`)
                    INNER JOIN `clinicaseg`.`contenidopp` contenidopp1 ON
                        detpypafiliado1.`CodigoG` = contenidopp1.`CodigoG`)
                    INNER JOIN `clinicaseg`.`medicos` medicos1 ON
                        detpypafiliado1.`OrdenadoPor` = medicos1.`Cedula`)
                    INNER JOIN `clinicaseg`.`empresa` empresa1 ON
                        afiliado1.`CodEmpresa` = empresa1.`Identificacion`)
                    INNER JOIN `clinicaseg`.`procedim` procedim1 ON
                        contenidopp1.`SOAT` = procedim1.`Codigo`}
                WHERE
                    citas1.`NumCita` = ?
                ORDER BY
                    procedim1.`Tipo_proc` ASC,
                    citas1.`NumCita` ASC";

        $query = $this->db->query($sql, $codPaciente);
        return $query->result();
    }

    /// historia Clinica Embarazo
    public function getHistoriaClinicaEmbarazo($numCita) {
        $sql = "SELECT
                    citas1.`CodPaciente`, citas1.`Fecha`, citas1.`Hora`, citas1.`TipoConsulta`, citas1.`Ambito`, citas1.`Edad`, citas1.`TEdad`,
                    aepi11.`NumCita`, aepi11.`Fechapp`, aepi11.`Pregunta1`, aepi11.`Pregunta3`, aepi11.`Pregunta2`, aepi11.`Pregunta4`, aepi11.`Pregunta5`, aepi11.`Pregunta6`, aepi11.`Cual2`, aepi11.`Pregunta7`, aepi11.`Pregunta8`, aepi11.`Pregunta9`, aepi11.`Pregunta10`, aepi11.`Pregunta11`, aepi11.`Pregunta12`, aepi11.`Pregunta13`, aepi11.`Pregunta14`, aepi11.`Pregunta15`, aepi11.`Pregunta16`, aepi11.`Pregunta17`, aepi11.`Pregunta18`, aepi11.`AlturaFeta`, aepi11.`FCFetal`, aepi11.`Pregunta19`, aepi11.`Pregunta20`, aepi11.`Pregunta21`, aepi11.`Pregunta22`, aepi11.`Pregunta23`, aepi11.`Pregunta24`, aepi11.`Pregunta25`, aepi11.`Pregunta26`, aepi11.`Pregunta27`, aepi11.`Pregunta28`, aepi11.`Pregunta29`, aepi11.`Pregunta30`, aepi11.`Pregunta31`, aepi11.`Diagnostico`, aepi11.`Pregunta32`, aepi11.`Pregunta33`, aepi11.`Cual3`, aepi11.`Recomendaciones1`, aepi11.`Control`, aepi11.`Recomendaciones2`, aepi11.`Recomendaciones3`, aepi11.`Dosis`, aepi11.`Pregunta34`, aepi11.`EdadGest`, aepi11.`Pregunta97`, aepi11.`Pregunta98`, aepi11.`Control1`, aepi11.`Control2`, aepi11.`Control3`,
                    historial1.`MotivosC`, historial1.`EnfAct`, historial1.`Talla`, historial1.`Peso`, historial1.`TensioAi`, historial1.`TensioA`, historial1.`FreC`, historial1.`FrecR`, historial1.`Temp`, historial1.`EstadoG`, historial1.`Diagnostico`,
                    afiliado1.`IdentificacionPaciente`, afiliado1.`PriApellido`, afiliado1.`SegApellido`, afiliado1.`SegNombre`, afiliado1.`Nombre`, afiliado1.`Telefono`, afiliado1.`GrupoS`, afiliado1.`RH`, afiliado1.`TEscolaridad`,
                    diagnostico1.`De_CIE`,
                    hginecologico1.`Gravidez`, hginecologico1.`Parto`, hginecologico1.`Mortinato`, hginecologico1.`Aborto`, hginecologico1.`Cesarias`, hginecologico1.`UltimaPeriodo`, hginecologico1.`UltimaRegla`, hginecologico1.`Espontaneos`, hginecologico1.`Mueneona`, hginecologico1.`hijos1`, hginecologico1.`hijos2`, hginecologico1.`malform`, hginecologico1.`pregunta1`, hginecologico1.`pregunta2`, hginecologico1.`cual`, hginecologico1.`caul1`,
                    firma1.`Foto`,
                    medicos1.`NoRegPRof`,
                    ocupacion1.`Ocupacion`,
                    raza1.`Descripcion`,
                    municipio1.`Municipio`, municipio1.`Departamento`,
                    causaexterna1.`Codigo`, causaexterna1.`Nombre` AS NombreEnfermedad,
                    finalidadcons1.`IDorigenatencion`, finalidadcons1.`Origenatencion`
                FROM
                    { oj (((((((((((`clinicaseg`.`citas` citas1 INNER JOIN `clinicaseg`.`historial` historial1 ON
                        citas1.`NumCita` = historial1.`NAI`)
                    INNER JOIN `clinicaseg`.`afiliado` afiliado1 ON
                        citas1.`CodPaciente` = afiliado1.`IdentificacionPaciente`)
                    INNER JOIN `clinicaseg`.`aepi1` aepi11 ON
                        citas1.`NumCita` = aepi11.`NumCita`)
                    INNER JOIN `clinicaseg`.`hginecologico` hginecologico1 ON
                        historial1.`CvePac` = hginecologico1.`CodPaciente`)
                    INNER JOIN `clinicaseg`.`firma` firma1 ON
                        historial1.`CveMed` = firma1.`IdentificacionPaciente`)
                    INNER JOIN `clinicaseg`.`medicos` medicos1 ON
                        historial1.`CveMed` = medicos1.`Cedula`)
                    INNER JOIN `clinicaseg`.`ocupacion` ocupacion1 ON
                        afiliado1.`Escolaridad` = ocupacion1.`CodigoOcupacion`)
                    INNER JOIN `clinicaseg`.`raza` raza1 ON
                        afiliado1.`Estrato` = raza1.`Codigo`)
                    INNER JOIN `clinicaseg`.`municipio` municipio1 ON
                        afiliado1.`CodCiudad` = municipio1.`Cod_Munic`)
                    INNER JOIN `clinicaseg`.`causaexterna` causaexterna1 ON
                        historial1.`Causaexte` = causaexterna1.`Codigo`)
                    INNER JOIN `clinicaseg`.`finalidadcons` finalidadcons1 ON
                        historial1.`Finalidad` = finalidadcons1.`IDorigenatencion`)
                    INNER JOIN `clinicaseg`.`diagnostico` diagnostico1 ON
                        aepi11.`Cual1` = diagnostico1.`Cd_CIE`}
                    WHERE aepi11.`NumCita` = ?
                ORDER BY
                    aepi11.`NumCita` ASC";

    $query = $this->db->query($sql, $numCita);
    return $query->row();
    }

    public function getDiagnosticoHistoriaClinica($NAI) {
        $sql = "SELECT
                    Historial1.`Tipo`, Historial1.`Fecha`, Historial1.`NAI`, Historial1.`Hora`, Historial1.`CondicionUs`, Historial1.`DIncap`, Historial1.`MotivosC`, Historial1.`EnfAct`, Historial1.`Talla`, Historial1.`Peso`, Historial1.`TensioAi`, Historial1.`TensioA`, Historial1.`FreC`, Historial1.`FrecR`, Historial1.`Pc`, Historial1.`Temp`, Historial1.`EstadoG`, Historial1.`Observaciones1`, Historial1.`Finalidad`, Historial1.`Causaexte`, Historial1.`Diagnostico`, Historial1.`Diagnostico1`, Historial1.`Diagnostico2`, Historial1.`Diagnostico3`, Historial1.`TipoDiagnostico`,
                    Diagnostico1.`De_CIE`,
                    Diagnostico_11.`De_CIE` AS De_CIE1,
                    Diagnostico_21.`De_CIE` AS De_CIE2,
                    Diagnostico_31.`De_CIE` AS De_CIE3,
                    Afiliado1.`IdentiAfiliado`, Afiliado1.`NombreyApellidos`, Afiliado1.`IdentificacionPaciente`, Afiliado1.`TipoDocumen`, Afiliado1.`EstadoCivil`, Afiliado1.`Sexo`, Afiliado1.`PriApellido`, Afiliado1.`SegApellido`, Afiliado1.`SegNombre`, Afiliado1.`Nombre`, Afiliado1.`Direccion`, Afiliado1.`Telefono`, Afiliado1.`AnteFami`
                FROM
                    { oj ((((`clinicaseg`.`Historial` Historial1 INNER JOIN `clinicaseg`.`Diagnostico` Diagnostico_11 ON
                        Historial1.`Diagnostico1` = Diagnostico_11.`Cd_CIE`)
                    INNER JOIN `clinicaseg`.`Diagnostico` Diagnostico_21 ON
                        Historial1.`Diagnostico2` = Diagnostico_21.`Cd_CIE`)
                    INNER JOIN `clinicaseg`.`Diagnostico` Diagnostico_31 ON
                        Historial1.`Diagnostico3` = Diagnostico_31.`Cd_CIE`)
                    INNER JOIN `clinicaseg`.`afiliado` Afiliado1 ON
                        Historial1.`CvePac` = Afiliado1.`IdentificacionPaciente`)
                    INNER JOIN `clinicaseg`.`Diagnostico` Diagnostico1 ON
                        Historial1.`Diagnostico` = Diagnostico1.`Cd_CIE`}
                WHERE
                    Historial1.`NAI` = ?
                ORDER BY
                    Afiliado1.`IdentificacionPaciente` ASC,
                    Historial1.`NAI` ASC";

        $query = $this->db->query($sql, $NAI);
        return $query->row();
    }

    public function getEspecialidad($NAI) {
        $sql = "SELECT
                    Citas1.`NumCita`,
                    Referencia1.`CodigoRef`,
                    Especialidad1.`Descripcion`
                FROM
                    { oj ((`clinicaseg`.`Citas` Citas1 INNER JOIN `clinicaseg`.`Referencia` Referencia1 ON
                        Citas1.`NumCita` = Referencia1.`CodAdmision`)
                    INNER JOIN `clinicaseg`.`DetReferencia` DetReferencia1 ON
                        Referencia1.`CodigoRef` = DetReferencia1.`CodReferencia`)
                    INNER JOIN `clinicaseg`.`Especialidad` Especialidad1 ON
                        DetReferencia1.`CodEsp` = Especialidad1.`CodEspecialidad`}
                WHERE
                    Citas1.`NumCita` = ?
                ORDER BY
                    Referencia1.`CodigoRef` ASC";

        $query = $this->db->query($sql, $NAI);
        return $query->row();
    }

    public function getRiesgoEmbarazo($NAI) {
        $sql = "SELECT
                    afiliado1.`IdentiAfiliado`, afiliado1.`NombreyApellidos`, afiliado1.`IdentificacionPaciente`, afiliado1.`TipoDocumen`, afiliado1.`EstadoCivil`, afiliado1.`Sexo`, afiliado1.`PriApellido`, afiliado1.`SegApellido`, afiliado1.`SegNombre`, afiliado1.`Nombre`, afiliado1.`Direccion`, afiliado1.`Telefono`,
                    evaluriesgo1.`NoFicha`, evaluriesgo1.`HijoNo`, evaluriesgo1.`Paciente`, evaluriesgo1.`PregunaA1`, evaluriesgo1.`PregunaA2`, evaluriesgo1.`PregunaA3`, evaluriesgo1.`PregunaA4`, evaluriesgo1.`PregunaA5`, evaluriesgo1.`PregunaA6`, evaluriesgo1.`PregunaA7`, evaluriesgo1.`PregunaA8`, evaluriesgo1.`PregunaB1`, evaluriesgo1.`PregunaB2`, evaluriesgo1.`PregunaB3`, evaluriesgo1.`PregunaB4`, evaluriesgo1.`PregunaB5`, evaluriesgo1.`PregunaB6`, evaluriesgo1.`PregunaB7`, evaluriesgo1.`PregunaB8`, evaluriesgo1.`PregunaC1`, evaluriesgo1.`PregunaC2`, evaluriesgo1.`PregunaC3`, evaluriesgo1.`PregunaC4`, evaluriesgo1.`PregunaC5`, evaluriesgo1.`PregunaC6`, evaluriesgo1.`PregunaC7`, evaluriesgo1.`PregunaC8`, evaluriesgo1.`PregunaC9`, evaluriesgo1.`PregunaC10`, evaluriesgo1.`PregunaC11`, evaluriesgo1.`PregunaC12`, evaluriesgo1.`PregunaC13`, evaluriesgo1.`PregunaC14`, evaluriesgo1.`PregunaC15`, evaluriesgo1.`PregunaC16`, evaluriesgo1.`PregunaC17`, evaluriesgo1.`PregunaC18`, evaluriesgo1.`PregunaC19`, evaluriesgo1.`PregunaC20`, evaluriesgo1.`PregunaC21`, evaluriesgo1.`PregunaD1`, evaluriesgo1.`PregunaD2`, evaluriesgo1.`PregunaD3`, evaluriesgo1.`PregunaD4`, evaluriesgo1.`PregunaD5`, evaluriesgo1.`PregunaD6`, evaluriesgo1.`PregunaD7`, evaluriesgo1.`PregunaD8`, evaluriesgo1.`PregunaD9`, evaluriesgo1.`PregunaD10`, evaluriesgo1.`PregunaD11`, evaluriesgo1.`PregunaD12`, evaluriesgo1.`PregunaD13`, evaluriesgo1.`PregunaD14`, evaluriesgo1.`PregunaD15`, evaluriesgo1.`PregunaD16`, evaluriesgo1.`PregunaD17`, evaluriesgo1.`PregunaD18`, evaluriesgo1.`PregunaD19`, evaluriesgo1.`PregunaD20`, evaluriesgo1.`PregunaD21`, evaluriesgo1.`PregunaD22`, evaluriesgo1.`PregunaD23`, evaluriesgo1.`PregunaD24`, evaluriesgo1.`PregunaD25`, evaluriesgo1.`PregunaD26`, evaluriesgo1.`PregunaD27`, evaluriesgo1.`PregunaD28`, evaluriesgo1.`PregunaD29`, evaluriesgo1.`PregunaD30`, evaluriesgo1.`PregunaD31`, evaluriesgo1.`PregunaD32`, evaluriesgo1.`PregunaE1`, evaluriesgo1.`PregunaE3`, evaluriesgo1.`PregunaE5`, evaluriesgo1.`PregunaE7`, evaluriesgo1.`PregunaE8`, evaluriesgo1.`PregunaE9`, evaluriesgo1.`PregunaF1`, evaluriesgo1.`PregunaF2`, evaluriesgo1.`PregunaF3`, evaluriesgo1.`PregunaF4`, evaluriesgo1.`PregunaF5`, evaluriesgo1.`PregunaF6`
                FROM
                    { oj `clinicaseg`.`afiliado` afiliado1 INNER JOIN `clinicaseg`.`evaluriesgo` evaluriesgo1 ON
                        afiliado1.`IdentificacionPaciente` = evaluriesgo1.`Paciente`}
                WHERE
                    afiliado1.`IdentificacionPaciente` = ?
                ORDER BY
                    evaluriesgo1.`Paciente` ASC,
                    evaluriesgo1.`HijoNo` ASC";

        return $this->db->query($sql, $NAI)->row();
    }
    
    public function getTamizajeClinica($NAI) {
        $sql = "SELECT
                    tamizajecli1.`IdentificacionPaciente`, tamizajecli1.`Embarazo`, tamizajecli1.`coombind`, tamizajecli1.`coombindl`, tamizajecli1.`gliayuna`, tamizajecli1.`glicepos`, tamizajecli1.`glicemiFec`, tamizajecli1.`GlicemiPre`, tamizajecli1.`Citologiapre`, tamizajecli1.`citolog1`, tamizajecli1.`citolog2`, tamizajecli1.`citolog3`, tamizajecli1.`reshep`, tamizajecli1.`fechahep`, tamizajecli1.`restoxoigg`, tamizajecli1.`fechatoxoigg`, tamizajecli1.`restoxoigm`, tamizajecli1.`fectoxoigm`, tamizajecli1.`asepre`, tamizajecli1.`fecasepre`, tamizajecli1.`aceptp`, tamizajecli1.`fechacep`, tamizajecli1.`elisa1`, tamizajecli1.`Fecelisa1`, tamizajecli1.`Elisa2`, tamizajecli1.`FecElisa2`, tamizajecli1.`asepos`, tamizajecli1.`feasepos`, tamizajecli1.`rewestern`, tamizajecli1.`fecwest`, tamizajecli1.`diagvih`, tamizajecli1.`fechadvih`,
                    controlemb1.`Identificacion`, controlemb1.`HBt1`, controlemb1.`HBt2`, controlemb1.`HBt3`, controlemb1.`HTCOt1`, controlemb1.`HTCOt2`, controlemb1.`HTCOt3`, controlemb1.`VDRLt1`, controlemb1.`VDRLt2`, controlemb1.`VDRLt3`, controlemb1.`FROTISt1`, controlemb1.`FROTISt2`, controlemb1.`FROTISt3`, controlemb1.`GRAMt1`, controlemb1.`GRAMt2`, controlemb1.`GRAMt3`, controlemb1.`ORINAt1`, controlemb1.`ORINAt2`, controlemb1.`ORINAt3`, controlemb1.`ANTITETANICAt1`, controlemb1.`ANTITETANICAt2`, controlemb1.`ANTITETANICAt3`, controlemb1.`FTAt1`, controlemb1.`FTAt2`, controlemb1.`FTAt3`, controlemb1.`CITOLOGÍAt1`, controlemb1.`CITOLOGÍAt2`, controlemb1.`CITOLOGÍAt3`, controlemb1.`ECOGRAFÍAt1`, controlemb1.`ECOGRAFÍAt2`, controlemb1.`ECOGRAFÍAt3`, controlemb1.`ANORMALIDADESt1`, controlemb1.`ANORMALIDADESt2`, controlemb1.`ANORMALIDADESt3`, controlemb1.`SEMANAt1`, controlemb1.`SEMANAt2`, controlemb1.`SEMANAt3`
                FROM
                    { oj (`clinicaseg`.`afiliado` afiliado1 INNER JOIN `clinicaseg`.`controlemb` controlemb1 ON
                        afiliado1.`IdentificacionPaciente` = controlemb1.`Identificacion`)
                    INNER JOIN `clinicaseg`.`tamizajecli` tamizajecli1 ON
                        afiliado1.`IdentificacionPaciente` = tamizajecli1.`IdentificacionPaciente`}
                WHERE
                    tamizajecli1.`IdentificacionPaciente` = ?";

        return $this->db->query($sql, $NAI)->row();
    }

    public function getHistorialEmbarazo($NAI, $numHijo) {
        /* $sql = "SELECT
                    afiliado1.`IdentiAfiliado`, afiliado1.`NombreyApellidos`, afiliado1.`IdentificacionPaciente`, afiliado1.`TipoDocumen`, afiliado1.`EstadoCivil`, afiliado1.`Sexo`, afiliado1.`PriApellido`, afiliado1.`SegApellido`, afiliado1.`SegNombre`, afiliado1.`Nombre`, afiliado1.`Direccion`, afiliado1.`Telefono`,
                    detallehistoria1.`EnfAct`, detallehistoria1.`Talla`, detallehistoria1.`Peso`, detallehistoria1.`TensioAi`, detallehistoria1.`TensioA`, detallehistoria1.`FreC`, detallehistoria1.`FrecR`, detallehistoria1.`Temp`, detallehistoria1.`AlturaFeta`, detallehistoria1.`FCFetal`, detallehistoria1.`EdadGest`, detallehistoria1.`Fecha`, detallehistoria1.`Cita`
                FROM
                    { oj `clinicaseg`.`afiliado` afiliado1 INNER JOIN `clinicaseg`.`detallehistoria` detallehistoria1 ON
                        afiliado1.`IdentificacionPaciente` = detallehistoria1.`Identificacion`}
                WHERE
                    afiliado1.`IdentificacionPaciente` = ?
                ORDER BY
                    afiliado1.`IdentificacionPaciente` ASC,
                    detallehistoria1.`Fecha` DESC";*/ 
         $sql = "SELECT DISTINCT (historial.NAI) AS 'Cita',historial.Fecha, hatenprenatal.HijoNo,FCFetal,Temp,
                    historial.CvePac,aepi1.EdadGest,TensioAi,TensioA,FreC, aepi1.AlturaFeta, historial.Talla,
                    historial.Peso,EnfAct,FrecR,Pc FROM aepi1 INNER JOIN historial ON aepi1.NumCita = historial.NAI 
                INNER JOIN
                    PyPAfiliado ON PyPAfiliado.IdentificacionPaciente = historial.CvePac 
                INNER JOIN hatenprenatal ON PyPAfiliado.CodigoIns = hatenprenatal.NoFicha WHERE (historial.Fecha BETWEEN
                    FUM AND fpp) AND PyPAfiliado.Codigo = '08' AND aepi1.EdadGest <= 50 AND
                    -- hatenprenatal.Identificacion = '1124042536' AND HijoNo = '1' ORDER BY
                    hatenprenatal.Identificacion = ? AND HijoNo = ? ORDER BY
                    historial.Fecha DESC";

        return $this->db->query($sql, array($NAI, $numHijo))->row();
    }

}?>