<?php
	session_start();
	include ("connect.php");

	$paciente = $_POST['paciente'];
	$veterinario = $_POST['veterinario'];
	$data_consulta = $_POST['data_consulta'];
	$horario = intval($_POST['horario']);
	$tipo = 1;
	$status = 1;

	$sqlId = "select * from clientes where email='".$_SESSION["email"]."';";
	$result = mysqli_query($connect, $sqlId);
	$assoc = mysqli_fetch_assoc($result);

	$id = $assoc['id'];

	$sql = "insert into consultas (cliente_fk, paciente_fk, funcionario_fk, tipo_fk, data_abertura, horario_consulta, status_fk) values ($id, $paciente, $veterinario, $tipo, '$data_consulta', $horario, $status);";

	if(mysqli_query($connect, $sql)){
	
		header("Location: agendamentos.php");
	}

	else {
		header("Location: consulta_pet.php");
	}
?>