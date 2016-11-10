<?php 


include_once('../Conexao.class.php');
include_once('../model/Consulta.class.php');


/**
* Classe responsável pelo CRUD de Consulta de produto
*/
class ConsultaDAO{
	
	public function insereConsulta(Consulta $consulta){
		
		try{
			$pdo = Conexao::getConexao();
			
			$query = "INSERT INTO Consulta (id, datacon, medico, paciente) VALUES (:id, :datacon, :medico, :paciente)";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $consulta->getId());
			$stmt->bindValue(':datacon', $consulta->getDatacon());
			$stmt->bindValue(':medico', $consulta->getMedico());
			$stmt->bindValue(':paciente', $consulta->getPaciente());

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}
	}

	public function deletaConsulta($idConsulta){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "DELETE FROM Consulta WHERE id = :id";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $idConsulta);

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaConsulta(){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT id, datacon, medico, paciente FROM Consulta";

			$stmt = $pdo->prepare($query);

			$stmt->execute();

			$resultado = new ArrayObject();
			

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$consulta = new Consulta();

				$consulta->setId($row['id']);
				$consulta->setDatacon($row['datacon']);
				$consulta->setMedico($row['medico']);
				$consulta->setPaciente($row['paciente']);

				$resultado->append($consulta);
			}

			return $resultado;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function editaConsulta(Consulta $consulta){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "UPDATE Consulta SET datacon = :datacon, medico = :medico, paciente = :paciente WHERE id = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':datacon', $consulta->getDatacon());
			$stmt->bindValue(':medico', $consulta->getMedico());
			$stmt->bindValue(':paciente', $consulta->getPaciente());
			$stmt->bindValue(':id', $consulta->getId());
			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaConsultaPorId($idConsulta){
		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT id, datacon, medico, paciente FROM Consulta WHERE id = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':id', $idConsulta);

			$stmt->execute();

			$consulta = new Consulta();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


				$consulta->setId($row['id']);
				$consulta->setDatacon($row['datacon']);
				$consulta->setMedico($row['medico']);
				$consulta->setPaciente($row['paciente']);

			}

			return $consulta;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}

	}
}


 ?>