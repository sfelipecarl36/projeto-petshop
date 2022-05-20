<?php
	include ("connect.php");

	$nome = "";
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	$sql = "select * from clientes where email='$email' and senha='$senha';";

	$result = mysqli_query($connect, $sql);
	$rows = mysqli_num_rows($result);
	$assoc = mysqli_fetch_assoc($result);

	if($rows>0) {
		session_start();
		$_SESSION['nome'] = $assoc['nome'];
		$_SESSION['email'] = $email;

		header('location:index.php');
	}
	else {
		session_start();
		unset ($_SESSION['email']);
		unset ($_SESSION['senha']);
		$_SESSION['usernot'] = "Conta inexistente";
		header('location:login.php');
		exit();
		}
?>