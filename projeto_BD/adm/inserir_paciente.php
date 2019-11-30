<?php
session_start();
include_once("../conection.php");
$btn_cadastrar = filter_input(INPUT_POST, 'btn_cadastrar', FILTER_SANITIZE_STRING);
if($btn_cadastrar){
	$primeiroNome = "'".filter_input(INPUT_POST, 'primeiroNome', FILTER_SANITIZE_STRING)."'";
	$ultimoNome = "'".filter_input(INPUT_POST, 'ultimoNome', FILTER_SANITIZE_STRING)."'";
	$endereco = "'".filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING)."'";
	$cidade = "'".filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING)."'";
	$estado = "'".filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING)."'";
	$cep = "'".filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING)."'";
	$data_nasc = "'".filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING)."'";
	$cpf= "'".filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING)."'";
	$telefone = "'".filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING)."'";
	$data_reg = "'".filter_input(INPUT_POST, 'dataReg', FILTER_SANITIZE_STRING)."'";
	
	//colocar o resto no if ainda
	if((!empty($primeiroNome))){
		$con->query("INSERT INTO pessoa (primeiroNome,ultimoNome,endereco,cidade,estado,cep,
		data_nasc,cpf,telefone) VALUES ($primeiroNome,$ultimoNome,$endereco,$cidade,$estado,
		$cep,$data_nasc,$cpf,$telefone)");
		//echo $con->errorCode();*/
		//echo '<br>';
		//var_dump($con->errorInfo());
		$sql = "SELECT * FROM pessoa ORDER BY pessoaId desc limit 1";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$linha=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$pessoaId = $linha[0]['pessoaid'];			
		$con->query("INSERT INTO paciente (dataReg,pessoaId) VALUES ($data_reg,$pessoaId)");
	}
}

header("Location: admMain.php");
?>