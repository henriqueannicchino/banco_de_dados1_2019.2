<?php
session_start();
if(!empty($_SESSION['id'])){
	$temp=$_SESSION['id'];
	//echo "Ciao ".$_SESSION['nome'].", benvenuto <br>";
	//echo "<a href='sair.php'>Sair</a>";
}else{
	//3 - vai printar "É preciso está logado"
	$_SESSION['msg'] = "É preciso está logado <br>";
	header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="styleMedicoMain.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
</head>
<body>
	<nav>
		<ul id="ul-principal">
			<?php //echo"<p class='cardValor fl-right' style='font-size:30px; color:#e53935'> $date_last </p>"?>
			<?php echo"<p class='login_d'> $temp </p>";?>
			<li class="li-p"><a href="">HOME</a></li>
			<li class="li-p">
				<a href="javascript://" class="bt1">
					Preescrição
					<img src="../image/seta_branca.png" width="20">
				</a>
				<ul class="ul-noticias">
					<li><a href="">Nova</a></li>
				</ul>
			</li>
			<li class="li-p">
				<a href="javascript://" class="bt2">
					Pacientes
					<img src="../image/seta_branca.png" width="20">
				</a>
				<ul class="ul-entret">
					<li><a href="../pacientes/medico.php">Meus</a></li>
					<li><a href="../pacientes/list.php">Todos</a></li>
				</ul>
			</li>
			<li class="li-p">
				<a href="javascript://" class="bt3">
					Medicamentos
					<img src="../image/seta_branca.png" width="20">
				</a>
				<ul class="ul-fale-c">
					<li><a href="../medicamentos/list.php">Listar</a></li>
				</ul>
			</li>
			<li class="li-p"><a href="../sair.php">SAIR</a></li>
		</ul>
	</nav>
</body>
</html>