<?php 

	include_once('../dao/ConsultaDAO.class.php');
	include_once('../model/Consulta.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

	$dao = new ConsultaDAO();
	$dao->deletaConsulta($id);

	header('Location: ../template/consulta.php');
 ?>