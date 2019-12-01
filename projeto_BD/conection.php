<?php
	function getConnection(){
	$user = 'postgres';
	$pass = 'root';
	$host = 'localhost';
	$dbtype = 'pgsql';
	$dbname = 'clinic_system';
	

	try{
		$pdo = new PDO("$dbtype:host=$host;dbname=$dbname", $user, $pass);
		return $pdo;
	}catch(PDOException $ex){
		echo 'Erro: '.$ex->getMessage();
		var_dump($ex);
	}catch(\Exception $ex){
		echo 'Erro: '.$ex->getMessage();
		var_dump($ex);
	}
}

$con = getConnection();

?>