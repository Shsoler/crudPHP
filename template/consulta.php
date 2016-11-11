<?php 

include_once('../dao/ConsultaDAO.class.php');
include_once('../dao/MedicoDAO.class.php');
include_once('../dao/PacienteDAO.class.php');

$daoConsulta = new ConsultaDAO();
$daoMedico = new MedicoDAO();
$daoPaciente = new PacienteDAO();

$consultas = $daoConsulta->selecionaConsulta();
$medicos = $daoMedico->selecionaMedicoes();
$pacientes = $daoPaciente->selecionaPacientees();
$pac;
$med;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Consultas</title>
	<link rel="stylesheet" href="">
</head>
<body>


	<h1>Cadastro de Consultas</h1>

	<form action="../controller/ConsultaInsercaoController.php" method="post" accept-charset="utf-8">
		<table>	
			<tr>
				<td><label>Data: </label></td>
				<td><input  type="datetime-local" name="datacon" required></td>
				<tr>
				</tr>
				<td><label>Médico: </label></td>
				<td><Select name="medico"  required>
					<?php 
					foreach ($medicos as $medico) {
						echo "<option value= \"".$medico->getId()." \">".$medico->getNome() ."</option>";
					}
					?>
				</Select></td>
			</tr>
			<tr>
				<td><label>Paciente: </label></td>
				<td><Select name="paciente"  required>
					<?php 
					foreach ($pacientes as $paciente) {
						echo "<option value= \"".$paciente->getId()." \">".$paciente->getNome() ."</option>";
					}
					?>
				</Select></td>
			</tr>
			<tr>
				<td><input type="submit" name="cadastrar" value="Cadastrar"></td>
			</tr>
		</table>
	</form>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Data</th>
				<th>Medico</th>
				<th>Paciente</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($consultas as $consulta): ?>
			<tr>
				<td><?= $consulta->getId(); ?></td>
				<td><?= $consulta->getDatacon(); ?></td>
				<td><?= $consulta->getMedico()->getNome(); ?></td>
				<td><?= $consulta->getPaciente()->getNome(); ?></td>
				<td><a href="../template/consulta_edicao.php?idConsulta=<?= $consulta->getId(); ?>">Editar</a></td>
				<td><a href="../controller/ConsultaExclusaoController.php?id=<?= $consulta->getId(); ?>">Excluir</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>