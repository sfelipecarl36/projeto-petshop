<?php
	session_start();
	include ("connect.php");
	include ("assocSession.php");

	$sql = "delete from consultas where cliente_fk = $id;";
	mysqli_query($connect, $sql);

	$sql2 = "delete from pets where id_cliente = $id;";
	mysqli_query($connect, $sql2);

	$sql3 = "delete from clientes where id = $id;";
	mysqli_query($connect, $sql3);

	session_destroy();
	header("Location: index.php");