<?php 
	
	include_once('../dao/PacienteDAO.class.php');
	include_once('../model/Paciente.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

	if(isset($id) && !empty($id) && is_integer($id)){

		$dao = new PacienteDAO();

		$paciente = $dao->selecionaPacientePorId($id);
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

	<form action="../controller/PacienteEdicaoController.php" method="post" accept-charset="utf-8">
		<input type="text" name="id" value="<?= $paciente->getId(); ?>">
		<input type="text" name="nome" value="<?= $paciente->getNome(); ?>">
		<input type="text" name="tel" value="<?= $paciente->getTel(); ?>">
		<select name="sexo">
			<?php
			if($paciente->getSexo == "F"){
			 	echo "<option value=\"F\" selected >Feminino</option>";
			 	echo "<option value=\"M\" >Masculino</option>";
			 }
			else{
				echo "<option value=\"F\" >Feminino</option>";
				echo "<option value=\"M\" selected >Masculino</option>";
			}
			?>
		</select>
		<input type="number" name="idade" value="<?= $paciente->getIdade(); ?>" >
		
		<input type="submit" name="cadastrar" value="Editar">
	</form>
</body>
</html>