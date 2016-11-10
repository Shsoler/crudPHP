<?php 

	include_once('../dao/MedicoDAO.class.php');
	include_once('../model/Medico.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

	$dao = new MedicoDAO();
	$dao->deletaMedico($id);

	header('Location: ../template/medico.php');
 ?>