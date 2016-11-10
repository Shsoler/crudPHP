<?php 

	include_once('../model/Paciente.class.php');
	include_once('../dao/PacienteDAO.class.php');

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
	$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
	$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING);

	$paciente = new Paciente();

	$paciente->setNome($nome);
	$paciente->setTel($tel);
	$paciente->setSexo($sexo);
	$paciente->setIdade($idade);	

	$dao = new PacienteDAO();

	$dao->inserePaciente($paciente);

	header('Location: ../template/paciente.php');


 ?>