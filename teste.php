<?php 
	include_once '../Conexao.class.php';
	include_once '../model/Consulta.class.php';
	include_once '../model/Medico.class.php';
	include_once '../model/Paciente.class.php';
				$pdo = Conexao::getConexao();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query ="SELECT * FROM Consulta INNER JOIN Medico ON Consulta.medico_id=Medico.id INNER JOIN Paciente ON Consulta.paciente_id=Paciente.id;";

#				$query = "select p.id, p.datacon, t.id AS Tid, f.NOME AS FNOME, f.id AS Fid  from consulta p inner join medico t on (p.medico_id = t.id) inner join paciente f on (p.Paciente = f.id)";

				$stmt = $pdo->prepare($query);

				$stmt->execute();

				$resultado = new ArrayObject();

				print_r($row);

?>