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
		<table>
			<tr>
				<td>ID: </td>
				<td><input type="text" name="id" value="<?= $paciente->getId(); ?> " readonly="readonly"></td>
			</tr>
			<tr>
				<td>Nome: </td>	
				<td><input type="text" name="nome" value="<?= $paciente->getNome(); ?>"></td>
			</tr>
			<tr>
				<td>Tel: </td>	
				<td><input type="text" name="tel" value="<?= $paciente->getTel(); ?>" pattern="([0-9]){10,11}" title="Verfique se a quantidade de digitos é entre 10 e 11"  ></td>
			</tr>
			<tr>
				<td>Sexo: </td>
				<td><select name="sexo">
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
				</select></td>
			</tr>
			<tr>
				<td>Idade: </td>
				<td><input type="number" name="idade" value="<?= $paciente->getIdade(); ?>" ></td>
			</tr>
			<tr>
				<td><input type="submit" name="cadastrar" value="Editar"></td>
		</tr>
	</table>
</form>
</body>
</html>