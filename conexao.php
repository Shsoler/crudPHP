<?php 

define("USUARIO", 'root');
define("SENHA", '');

class Conexao{

	public static function getConexao(){

		$pdo = new PDO('mysql:host=localhost;dbname=Consultorio', USUARIO, SENHA);

		return $pdo;
	}
}

 ?>