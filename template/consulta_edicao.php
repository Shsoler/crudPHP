<?php

include_once('../dao/ConsultaDAO.class.php');
include_once('../dao/MedicoDAO.class.php');
include_once('../dao/PacienteDAO.class.php');

$idConsulta = filter_input(INPUT_GET, 'idConsulta', FILTER_SANITIZE_STRING);


$daoMedico = new MedicoDAO();
$daoPaciente = new PacienteDAO();
$dao = new ConsultaDAO();

$medicos = $daoMedico->selecionaMedicoes();
$pacientes = $daoPaciente->selecionaPacientees();

$consulta = $dao->selecionaConsultaPorId($idConsulta);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Consultas</title>
</head>
<body>
	<h1>Cadastro de Consultas</h1>
	<form action="../controller/ConsultaEdicaoController.php" method="post">
		<label>ID: </label>
		<input type="text" name="id" value="<?= $consulta->getId(); ?>" required>
		<label>Data: </label>
		<input type="datetime-local" name="datacon"  value="<?php 
    		$value = strftime('%Y-%m-%dT%H:%M:%S', strtotime($consulta->getDatacon()));
    		echo $value;
     ?>">

		<label>Medico: </label>
		<Select name="medico"  required>
			<?php 
			foreach ($medicos as $medico) {
				if($medico->getId() == $consulta->getMedico()->getId()){
					echo "<option value= \"".$medico->getId()." \" selected>".$medico->getNome() ."</option>";
				}
				else{
				 echo "<option value= \"".$medico->getId()." \">".$medico->getNome() ."</option>";
				}
			}
			?>
		</Select>
<label>Paciente: </label>
		<Select name="paciente"  required>
			<?php 
			foreach ($pacientes as $paciente) {
				if($paciente->getId() == $consulta->getPaciente()->getId()){
					echo "<option value= \"".$paciente->getId()." \" selected>".$paciente->getNome() ."</option>";
				}
				else{
				 echo "<option value= \"".$paciente->getId()." \">".$paciente->getNome() ."</option>";
				}
			}
			?>
		</Select>
		<input type="submit" name="cadastrar" value="Editar">
	</form>
</body>
</html>