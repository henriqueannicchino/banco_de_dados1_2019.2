<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="styleLogin.css">
	</head>
	<body>
		<form method="POST" action="validate.php">
			<div class="container">
				<label for="">Login</label>
				<input type="text" name="usuario" placeholder="Usuario" value="">
				<input type="password" name="senha" placeholder="Password" value="">
				<div class="selectBox">
					<select name="tipo_acesso">
					<option>ADMIN</option>
					<option>ENFERMEIRO</option>
					<option>MEDICO</option>
					<option>RECEPCIONISTA</option>
					</select>	
				</div>
				<input type="submit" class="btnLogin" name="btnLogin" value="Acessar">
			</div>
		</form>
		
		<?php
			if(isset($_SESSION['msg'])){
				if($_SESSION['msg']==1){
					?>
					<div class="warning">
						Login e senha incorretos!
					</div>
					<?php
				}
				else if($_SESSION['msg']==2){
					?>
					<div class="warning">
						Página não encotrada
					</div>
					<?php
				}
				else if($_SESSION['msg']==3){
					?>
					<div class="warning">
						Página não encotrada
					</div>
					<?php
				}
			}
		?>
		
	</body>
</html>






