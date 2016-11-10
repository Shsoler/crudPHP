<?php 

	include_once('../dao/PacienteDAO.class.php');
	include_once('../model/Paciente.class.php');

	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
	$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
	$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING);


	$paciente = new Paciente();

	$paciente->setId($id);
	$paciente->setNome($nome);
	$paciente->setTel($tel);
	$paciente->setSexo($sexo);
	$paciente->setIdade($idade);	

	$dao = new PacienteDAO();
	$dao->editaPaciente($paciente);

	header('Location: ../template/paciente.php');
 ?>