<?php
session_start();
include_once("../conection.php");
$idrecp=$_SESSION['id'];
$sql = "SELECT logado FROM recepcionista WHERE recepcionistaid=$idrecp";
$stmt = $con->prepare($sql);
$stmt->execute();
$linha=$stmt->fetchAll(PDO::FETCH_ASSOC);
if($linha[0]['logado']==0){
	header("Location: ../login.php");
}

$sql = "SELECT primeironome FROM recepcionista 
		INNER JOIN funcionario ON funcionario.funcid=recepcionista.funcid
		INNER JOIN pessoa ON pessoa.pessoaid=funcionario.pessoaid WHERE recepcionista.recepcionistaid=$idrecp";
$stmt = $con->prepare($sql);
$stmt->execute();
$linha=$stmt->fetchAll(PDO::FETCH_ASSOC);
$temp=$linha[0]['primeironome'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="styleRecepcionistaMain">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
</head>
<body>
	<nav>
		<ul id="ul-principal">
			<?php //echo"<p class='cardValor fl-right' style='font-size:30px; color:#e53935'> $date_last </p>"?>
			<?php echo"<p class='login_d'> $temp<br>recepcionista </p>";?>
			<li class="li-p"><a href="">HOME</a></li>
			<li class="li-p">
				<button id="btn_vender" class="btn_menu">vender_medicamento</button>
			</li>
			<li class="li-p">
				<button id="btn_paci" class="btn_menu">cadastrar_paciente</button>
			</li>
			<li class="li-p">
				<button id="btn_menu" class="btn_menu">visualizar_pacientes</button>
			</li>
			<li class="li-p"><a href="../sair.php">SAIR</a></li>
		</ul>
	</nav>
</body>
</html>