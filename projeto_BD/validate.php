<?php
session_start();
include_once("conection.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$tipo_acesso = filter_input(INPUT_POST, 'tipo_acesso', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografada
		//echo password_hash($senha, PASSWORD_DEFAULT);
		$sql = "SELECT * FROM arduino_data WHERE sended=0 ORDER BY id limit 40 ";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$linha=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$row_count = $stmt->rowCount();
		
		if($tipo_acesso=="ADMIN"){
			$sql = "SELECT * FROM admin WHERE usuario='$usuario' LIMIT 1";
			$stmt = $con->prepare($sql);
			$stmt->execute();
		}else if($tipo_acesso=="ENFERMEIRO"){
			$sql = "SELECT * FROM enfermeiro WHERE usuario='$usuario' LIMIT 1";
			$stmt = $con->prepare($sql);
			$stmt->execute();
		}else if($tipo_acesso=="MEDICO"){
			$sql = "SELECT * FROM MEDICO WHERE usuario='$usuario' LIMIT 1";
			$stmt = $con->prepare($sql);
			$stmt->execute();
		}else if($tipo_acesso=="RECEPCIONISTA"){
			$sql = "SELECT * FROM recepcionista WHERE usuario='$usuario' LIMIT 1";
			$stmt = $con->prepare($sql);
			$stmt->execute();
		}
		
		$linha=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$row_count = $stmt->rowCount();
		if($row_count>0){
			if($senha==$linha[0]['senha']){
				$_SESSION['nome'] = $linha[0]['usuario'];
				if($tipo_acesso=="ADMIN"){
					$sql = "UPDATE admin SET logado = 1 WHERE adminid = :id";
					$stmt = $con->prepare($sql);
					$stmt->bindParam(':id', $linha[0]['adminid']);
					$stmt->execute();
					$_SESSION['id'] = $linha[0]['adminid'];
					$_SESSION['tipo'] = "admin";
					header("Location: adm/admMain.php");
				}else if($tipo_acesso=="ENFERMEIRO"){
					$sql = "UPDATE enfermeiro SET logado = 1 WHERE enfermeiroid = :id";
					$stmt = $con->prepare($sql);
					$stmt->bindParam(':id', $linha[0]['enfermeiroid']);
					$stmt->execute();
					$_SESSION['id'] = $linha[0]['enfermeiroid'];
					$_SESSION['tipo'] = "enfermeiro";
					header("Location: enfermeiro/enfermeiroMain.php");
				}else if($tipo_acesso=="MEDICO"){
					$sql = "UPDATE medico SET logado = 1 WHERE medicoid = :id";
					$stmt = $con->prepare($sql);
					$stmt->bindParam(':id', $linha[0]['medicoid']);
					$stmt->execute();
					$_SESSION['id'] = $linha[0]['medicoid'];
					$_SESSION['tipo'] = "medico";
					header("Location: medico/MedicoMain.php");
				}else if($tipo_acesso=="RECEPCIONISTA"){
					$sql = "UPDATE recepcionista SET logado = 1 WHERE recepcionistaid = :id";
					$stmt = $con->prepare($sql);
					$stmt->bindParam(':id', $linha[0]['recepcionistaid']);
					$stmt->execute();
					$_SESSION['id'] = $linha[0]['recepcionistaid'];
					$_SESSION['tipo'] = "recepcionista";
					header("Location: recepcionista/RecepcionistaMain.php");
				}
			}else{
				//1 - vai printar "Login e senha incorretos!"
				$_SESSION['msg'] = 1;
				echo $usuario,$linha[0]['senha'];
				//header("Location: login.php");
			}	
		}else{
			$_SESSION['msg'] = 1;
			header("Location: login.php");
		}
	}else{
		$_SESSION['msg'] = 1;
		header("Location: login.php");
	}
}else{
	//2 - vai printar "Página não encotrada"
	$_SESSION['msg'] = 2;
	header("Location: login.php");
}