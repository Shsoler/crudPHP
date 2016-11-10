<?php 

/**
* Classe responsável por manipular dados do medico
*/
class Medico{
	private $id;
	private $nome;
	private $tel;
	private $especialidade;
	private $idade;	 

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTel(){
		return $this->tel;
	}

	public function setTel($tel){
		$this->tel = $tel;
	}

	public function getEspecialidade(){
		return $this->especialidade;
	}

	public function setEspecialidade($especialidade){
		$this->especialidade = $especialidade;
	}
}

 ?>