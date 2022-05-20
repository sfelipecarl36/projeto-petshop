<?php
	session_start();
	include ("connect.php");

	$id_consulta = $_GET['idcon'];
	$sql = "delete from consultas where id = $id_consulta";

	mysqli_query($connect, $sql);
	header("Location: agendamentos.php");
