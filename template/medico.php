<?php 
	
	include_once('../dao/MedicoDAO.class.php');

	$daoMedico = new MedicoDAO();

	$medicos = $daoMedico->selecionaMedicoes();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Medicos</title>
	<link rel="stylesheet" href="">
</head>
<body>


	<h1>Cadastro de Médicos</h1>

	<form action="../controller/MedicoInsercaoController.php" method="post" accept-charset="utf-8">
		<table>
			<tr>
				<td><label>Nome: </label></td>
				<td><input type="text" name="nome" value="" required></td>
			</tr>
			<tr>
				<td><label>Telefone: </label></td>
				<td><input type="text" name="tel" pattern="([0-9]){11}" title="Verfique se a quantidade de digitos é 11" required></td>
			</tr>
			<tr>
				<td><label>Especialidade: </label></td>
				<td><input type="text" name="especialidade" value="" required></td>
			</tr>
		</table>
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
				<th>Telefone</th>
				<th>Especialidade</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($medicos as $medico): ?>
			<tr>
				<td><?= $medico->getId(); ?></td>
				<td><?= $medico->getNome(); ?></td>
				<td><?= $medico->getTel(); ?></td>
				<td><?= $medico->getEspecialidade(); ?></td>
				<td><a href="../template/medico_edicao.php?id=<?= $medico->getId(); ?>">Editar</a></td>
				<td><a href="../controller/MedicoExclusaoController.php?id=<?= $medico->getId(); ?>">Excluir</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>