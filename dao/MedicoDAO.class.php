<?php 


include_once('../Conexao.class.php');
include_once('../model/Medico.class.php');


/**
* Classe responsável pelo CRUD de Medico de produto
*/
class MedicoDAO{
	
	public function insereMedico(Medico $medico){
		
		try{
			$pdo = Conexao::getConexao();
			
			$query = "INSERT INTO Medico (id, nome, tel, especialidade) VALUES (:id, :nome, :tel, :especialidade)";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $medico->getId());
			$stmt->bindValue(':nome', $medico->getNome());
			$stmt->bindValue(':tel', $medico->getTel());
			$stmt->bindValue(':especialidade', $medico->getEspecialidade());


			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}
	}

	public function deletaMedico($idMedico){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "DELETE FROM Medico WHERE id = :id";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $idMedico);

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaMedicoes(){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT id, nome, tel, especialidade FROM Medico";

			$stmt = $pdo->prepare($query);

			$stmt->execute();

			$resultado = new ArrayObject();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$medico = new Medico();

				$medico->setId($row['id']);
				$medico->setNome($row['nome']);
				$medico->setTel($row['tel']);
				$medico->setEspecialidade($row['especialidade']);

				$resultado->append($medico);
			}

			return $resultado;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function editaMedico(Medico $medico){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "UPDATE Medico SET nome = :nome, tel = :tel, especialidade = :especialidade  WHERE id = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':nome', $medico->getNome());
			$stmt->bindValue(':tel', $medico->getTel());
			$stmt->bindValue(':especialidade', $medico->getEspecialidade());
			$stmt->bindValue(':id', $medico->getId());
			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaMedicoPorId($idMedico){
		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT id, nome, tel, especialidade FROM Medico WHERE id = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':id', $idMedico);

			$stmt->execute();

			$medico = new Medico();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


				$medico->setId($row['id']);
				$medico->setNome($row['nome']);
				$medico->setTel($row['tel']);
				$medico->setEspecialidade($row['especialidade']);
			}

			return $medico;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}

	}
}


 ?>