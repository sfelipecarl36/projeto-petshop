<?php
	session_start();
	include ("connect.php");

	$id_consulta = $_GET['idcon'];
	$sql = "update consultas set status_fk = 3 where id = $id_consulta";

	mysqli_query($connect, $sql);
	header("Location: agendamentos.php");
