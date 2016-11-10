<?php 

	include_once('../dao/MedicoDAO.class.php');
	include_once('../model/Medico.class.php');

	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
	$especialidade = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING);


	$medico = new Medico();

	$medico->setId($id);
	$medico->setNome($nome);
	$medico->setTel($tel);
	$medico->setEspecialidade($especialidade);

	$dao = new MedicoDAO();
	$dao->editaMedico($medico);

	header('Location: ../template/medico.php');
 ?>