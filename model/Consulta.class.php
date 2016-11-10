<?php 

/**
* Classe responsável por manipular dados do paciente
*/
class Consulta{
	private $id;
	private $datacon;
	private $medico;
	private $paciente;

	public function getDatacon(){
		return $this->datacon;
	}

	public function setDatacon($datacon){
		$this->datacon = $datacon;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getMedico(){
		return $this->medico;
	}

	public function setMedico($medico){
		$this->medico = $medico;
	}

	public function getPaciente(){
		return $this->paciente;
	}

	public function setPaciente($paciente){
		$this->paciente = $paciente;
	}

}

 ?>