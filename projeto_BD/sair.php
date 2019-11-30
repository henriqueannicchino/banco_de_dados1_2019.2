<?php
session_start();
include_once("conection.php");

if($_SESSION['tipo']=="admin"){
	$sql = "UPDATE admin SET logado = 0 WHERE adminid = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $_SESSION['id']);
	$stmt->execute();
}
else if($_SESSION['tipo']=="enfermeiro"){
	$sql = "UPDATE enfermeiro SET logado = 0 WHERE enfermeiroid = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $_SESSION['id']);
	$stmt->execute();
}
else if($_SESSION['tipo']=="medico"){
	$sql = "UPDATE medico SET logado = 0 WHERE medicoid = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $_SESSION['id']);
	$stmt->execute();
}
else if($_SESSION['tipo']=="recepcionista"){
	$sql = "UPDATE recepcionista SET logado = 0 WHERE recepcionistaid = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $_SESSION['id']);
	$stmt->execute();
}
//echo $_SESSION['id'];
//echo $_SESSION['tipo'];
unset($_SESSION['id'], $_SESSION['tipo']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: login.php");
?>