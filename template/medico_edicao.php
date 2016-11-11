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
	<h1>Editar Médico</h1>

	<form action="../controller/MedicoEdicaoController.php" method="post" accept-charset="utf-8">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="id" value="<?= $medico->getId(); ?>" required readonly="readonly"></td>
			</tr>
			<tr>	
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?= $medico->getNome(); ?>" required></td>
			</tr>
			<tr>
				<td>Tel:</td>
				<td><input type="text" name="tel" value="<?= $medico->getTel(); ?>" required pattern="([0-9]){10,11}" title="Verfique se a quantidade de digitos é entre 10 e 11" ></td>
			</tr>
			<tr>
				<td>Espec:</td>	
				<td><input type="text" name="especialidade" value="<?= $medico->getEspecialidade(); ?>" required></td>
			</tr>
			</table>
		<input type="submit" name="cadastrar" value="Editar">
	</form>
</body>
</html>