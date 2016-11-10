<?php 


include_once('../Conexao.class.php');
include_once('../model/Paciente.class.php');


/**
* Classe responsável pelo CRUD de Paciente de produto
*/
class PacienteDAO{
	
	public function inserePaciente(Paciente $paciente){
		
		try{
			$pdo = Conexao::getConexao();
			
			$query = "INSERT INTO Paciente (id, nome, tel, sexo, idade) VALUES (:id, :nome, :tel, :sexo, :idade)";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $paciente->getId());
			$stmt->bindValue(':nome', $paciente->getNome());
			$stmt->bindValue(':tel', $paciente->getTel());
			$stmt->bindValue(':sexo', $paciente->getSexo());
			$stmt->bindValue(':idade', $paciente->getIdade());

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}
	}

	public function deletaPaciente($idPaciente){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "DELETE FROM Paciente WHERE id = :id";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $idPaciente);

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaPacientees(){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT id, nome, tel, sexo, idade FROM Paciente";

			$stmt = $pdo->prepare($query);

			$stmt->execute();

			$resultado = new ArrayObject();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$paciente = new Paciente();

				$paciente->setId($row['id']);
				$paciente->setNome($row['nome']);
				$paciente->setTel($row['tel']);
				$paciente->setSexo($row['sexo']);
				$paciente->setIdade($row['idade']);

				$resultado->append($paciente);
			}

			return $resultado;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function editaPaciente(Paciente $paciente){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "UPDATE Paciente SET nome = :nome, tel = :tel, sexo = :sexo, idade = :idade  WHERE id = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':nome', $paciente->getNome());
			$stmt->bindValue(':tel', $paciente->getTel());
			$stmt->bindValue(':sexo', $paciente->getSexo());
			$stmt->bindValue(':idade', $paciente->getIdade());
			$stmt->bindValue(':id', $paciente->getId());
			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaPacientePorId($idPaciente){
		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT id, nome, tel, sexo, idade FROM Paciente WHERE id = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':id', $idPaciente);

			$stmt->execute();

			$paciente = new Paciente();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


				$paciente->setId($row['id']);
				$paciente->setNome($row['nome']);
				$paciente->setTel($row['tel']);
				$paciente->setSexo($row['sexo']);
				$paciente->setIdade($row['idade']);
			}

			return $paciente;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}

	}
}


 ?>