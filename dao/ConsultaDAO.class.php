<?php 
	include_once '../Conexao.class.php';
	include_once '../model/Consulta.class.php';
	include_once '../model/Medico.class.php';
	include_once '../model/Paciente.class.php';


	class ConsultaDAO{
		
		public function insereConsulta(Consulta $consulta){
				$pdo = Conexao::getConexao();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = "INSERT INTO Consulta (datacon,medico_id,paciente_id) VALUES ( :datacon,:medico, :paciente)";

				$stmt = $pdo->prepare($query);
				#$stmt->bindValue(':datacon', $consulta->getDatacon());#$consulta->getDatacon());
				#$stmt->bindValue(':datacon',Datetime::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d h:i:s'));
				$stmt->bindParam(':datacon',$consulta->getDatacon());
				$stmt->bindValue(':medico', $consulta->getMedico()->getId());
				$stmt->bindValue(':paciente', $consulta->getPaciente()->getId());

				$stmt->execute();

		}

		public function selecionaConsulta(){
			

				$pdo = Conexao::getConexao();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query ="SELECT Consulta.id conid,Consulta.datacon data,Medico.id medid,Medico.nome mednome,Medico.tel medtel, Medico.especialidade medespec,Paciente.id pacid, Paciente.nome pacnome, Paciente.tel pactel, Paciente.sexo pacsex, Paciente.idade pacidade FROM Consulta INNER JOIN Medico ON Consulta.medico_id=Medico.id INNER JOIN Paciente ON Consulta.paciente_id=Paciente.id;";
#				$query = "select p.id, p.datacon, t.id AS Tid, f.NOME AS FNOME, f.id AS Fid  from consulta p inner join medico t on (p.medico_id = t.id) inner join paciente f on (p.Paciente = f.id)";

				$stmt = $pdo->prepare($query);

				$stmt->execute();

				$resultado = new ArrayObject();

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$consulta = new Consulta();
					$consulta->setId($row['conid']);
					$consulta->setDatacon($row['data']);
					$medico = new Medico();
					$medico->setId($row['medid']);
					$medico->setNome($row['mednome']);
					$medico->setTel($row['medtel']);
					$medico->setEspecialidade($row['medespec']);
					
					$consulta->setMedico($medico);
					$paciente = new Paciente();
					$paciente->setId($row['pacid']);
					$paciente->setNome($row['pacnome']);
					$paciente->setTel($row['pactel']);
					$paciente->setSexo($row['pacsex']);
					$paciente->setIdade($row['pacidade']);

					$consulta->setPaciente($paciente);

					$resultado->append($consulta);
				}
				print_r($row);

				return $resultado;
		}

		public function deletaConsulta($idConsulta){

				$pdo = Conexao::getConexao();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = "DELETE FROM Consulta WHERE id = :id";

				$stmt = $pdo->prepare($query);

				$stmt->bindValue(':id', $idConsulta);


				$stmt->execute();


		}

		public function selecionaConsultaPorId($idConsulta){


				$pdo = Conexao::getConexao();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query ="SELECT Consulta.id conid,Consulta.datacon data,Medico.id medid,Medico.nome mednome,Medico.tel medtel, Medico.especialidade medespec,Paciente.id pacid, Paciente.nome pacnome, Paciente.tel pactel, Paciente.sexo pacsex, Paciente.idade pacidade FROM Consulta INNER JOIN Medico ON Consulta.medico_id=Medico.id INNER JOIN Paciente ON Consulta.paciente_id=Paciente.id WHERE Consulta.id = :idConsulta;";
				#$query = "select p.id, p.NOME, p.VALOR, p.VALidADE, t.DESCRICAO, t.id AS Tid, f.NOME AS FNOME, f.id AS Fid  from consulta p inner join medico t on (p.medico_id = t.id) inner join paciente f on (p.Paciente = f.id) where p.id = :idConsulta and t.id = :idMedico and f.id = :idPaciente";

				$stmt = $pdo->prepare($query);
				$stmt->bindValue(':idConsulta', $idConsulta);

				$stmt->execute();

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$consulta = new Consulta();
					$consulta->setId($row['conid']);
					$consulta->setDatacon($row['data']);
					$medico = new Medico();
					$medico->setId($row['medid']);
					$medico->setNome($row['mednome']);
					$medico->setTel($row['medtel']);
					$medico->setEspecialidade($row['medespec']);
					
					$consulta->setMedico($medico);
					$paciente = new Paciente();
					$paciente->setId($row['pacid']);
					$paciente->setNome($row['pacnome']);
					$paciente->setTel($row['pactel']);
					$paciente->setSexo($row['pacsex']);
					$paciente->setIdade($row['pacidade']);

					$consulta->setPaciente($paciente);

				}

				return $consulta;

		}

		public function editaConsulta(Consulta $consulta){
				$pdo = Conexao::getConexao();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = "UPDATE Consulta SET datacon = :datacon, medico_id=:medico,paciente_id=:paciente WHERE id = :id;";

				$stmt = $pdo->prepare($query);
				#$stmt->bindValue(':datacon', $consulta->getDatacon());#$consulta->getDatacon());
				#$stmt->bindValue(':datacon',Datetime::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d h:i:s'));
				$stmt->bindParam(':id',$consulta->getId());
				$stmt->bindParam(':datacon',$consulta->getDatacon());
				$stmt->bindValue(':medico', $consulta->getMedico()->getId());
				$stmt->bindValue(':paciente', $consulta->getPaciente()->getId());

				$stmt->execute();
		}
	}


 ?>

