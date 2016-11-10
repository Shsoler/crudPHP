<?php 

/**
* Classe responsável por manipular dados do paciente
*/
class Paciente{
	private $id;
	private $nome;
	private $tel;
	private $sexo;
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

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getIdade(){
		return $this->idade;
	}

	public function setIdade($idade){
		$this->idade = $idade;
	}
}

 ?>