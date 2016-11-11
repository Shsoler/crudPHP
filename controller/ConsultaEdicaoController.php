<?php 

	include_once('../dao/ConsultaDAO.class.php');
	include_once('../model/Consulta.class.php');

	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$datacon = filter_input(INPUT_POST, 'datacon', FILTER_SANITIZE_STRING);
	$medico = filter_input(INPUT_POST, 'medico', FILTER_SANITIZE_STRING);
	$paciente = filter_input(INPUT_POST, 'paciente', FILTER_SANITIZE_STRING);


	$consulta = new Consulta();

	$consulta->setId($id);
	$consulta->setDatacon($datacon);
	$consulta->getMedico()->setId($medico);
	$consulta->getPaciente()->setId($paciente);
		

	$dao = new ConsultaDAO();
	$dao->editaConsulta($consulta);

	header('Location: ../template/consulta.php');
 ?>