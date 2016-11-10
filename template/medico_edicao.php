<?php 
	
	include_once('../dao/MedicoDAO.class.php');
	include_once('../model/Medico.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

	if(isset($id) && !empty($id) && is_integer($id)){

		$dao = new MedicoDAO();

		$medico = $dao->selecionaMedicoPorId($id);
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Editar Tipo</h1>

	<form action="../controller/MedicoEdicaoController.php" method="post" accept-charset="utf-8">
		<input type="text" name="id" value="<?= $medico->getId(); ?>" required>
		<input type="text" name="nome" value="<?= $medico->getNome(); ?>" required>
		<input type="text" name="tel" value="<?= $medico->getTel(); ?>" required>
		<input type="text" name="especialidade" value="<?= $medico->getEspecialidade(); ?>" required>
		
		<input type="submit" name="cadastrar" value="Editar">
	</form>
</body>
</html>