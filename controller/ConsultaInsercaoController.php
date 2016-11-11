<?php 

	include_once('../model/Consulta.class.php');
	include_once('../dao/ConsultaDAO.class.php');
	$datacon = filter_input(INPUT_POST, 'datacon', FILTER_SANITIZE_STRING);
	$medico = filter_input(INPUT_POST, 'medico', FILTER_SANITIZE_STRING);
	$paciente = filter_input(INPUT_POST, 'paciente', FILTER_SANITIZE_STRING);

	$consulta = new Consulta();
	$consulta->setDatacon($datacon);#setDatacon(date("dd/MM/yy HH:mm:ss",strtotime($datacon)));
	$consulta->getMedico()->setId($medico);
	$consulta->getPaciente()->setId($paciente);	
	$dao = new ConsultaDAO();


	$dao->insereConsulta($consulta);

	header('Location: ../template/consulta.php');


 ?>