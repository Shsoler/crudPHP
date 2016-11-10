<?php 

	include_once('../model/Medico.class.php');
	include_once('../dao/MedicoDAO.class.php');

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
	$especialidade = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING);


	$medico = new Medico();

	$medico->setNome($nome);
	$medico->setTel($tel);
	$medico->setEspecialidade($especialidade);	

	$dao = new MedicoDAO();

	$dao->insereMedico($medico);

	header('Location: ../template/medico.php');


 ?>