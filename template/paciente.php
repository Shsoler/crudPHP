<?php 
	
	include_once('../dao/PacienteDAO.class.php');

	$daoPaciente = new PacienteDAO();

	$pacientes = $daoPaciente->selecionaPacientees();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Pacientes</title>
	<link rel="stylesheet" href="">
</head>
<body>


	<h1>Cadastro de Pacientes</h1>

	<form action="../controller/PacienteInsercaoController.php" method="post" accept-charset="utf-8">
		<table>
			<tr>
			<td><label>Nome: </label>
			<td><input type="text" name="nome" value="" required></td>
			</tr>
			<tr>	
			<td><label>Telefone: </label></td>
			<td><input type="text" name="tel" value="" required pattern="([0-9]){10,11}" title="Verfique se a quantidade de digitos é entre 10 e 11" ></td>
			</tr>
			<tr>	
			<td><label>Sexo: </label></td>
			<td><Select name="sexo"  required>
				<option value="F">Feminino</option>
				<option value="M">Masculino</option>
			</Select></td>
			</tr>
			<tr>
			<td><label>Idade: </label></td>
			<td><input type="number" name="idade" value="" required></td>
			</tr>
			<tr><td><input type="submit" name="cadastrar" value="Cadastrar"></td></tr>
		</table>
		</form>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Sexo</th>
				<th>Idade</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pacientes as $paciente): ?>
			<tr>
				<td><?= $paciente->getId(); ?></td>
				<td><?= $paciente->getNome(); ?></td>
				<td><?= $paciente->getTel(); ?></td>
				<td><?= $paciente->getSexo(); ?></td>
				<td><?= $paciente->getIdade(); ?></td>
				<td><a href="../template/paciente_edicao.php?id=<?= $paciente->getId(); ?>">Editar</a></td>
				<td><a href="../controller/PacienteExclusaoController.php?id=<?= $paciente->getId(); ?>">Excluir</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>