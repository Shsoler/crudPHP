<?php 

	include_once('../dao/PacienteDAO.class.php');
	include_once('../model/Paciente.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

	$dao = new PacienteDAO();
	$dao->deletaPaciente($id);

	header('Location: ../template/paciente.php');
 ?>