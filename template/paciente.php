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
		<label>Nome: </label>
		<input type="text" name="nome" value="" required>
		<br>
		<br>
		<label>Telefone: </label>
		<input type="text" name="tel" value="" required>
		<br>
		<br>
		<label>Sexo: </label>
		<Select name="sexo"  required>
			<option value="F">Feminino</option>
			<option value="M">Masculino</option>
		</Select>
		<br>
		<br>
		<input type="number" name="idade" value="" required>

		<input type="submit" name="cadastrar" value="Cadastrar">
	</form>
	<br>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>CNPJ</th>
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