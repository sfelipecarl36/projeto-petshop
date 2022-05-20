<?php
	include ("connect.php");
	include ("f_formatarcpf.php");
	include ("f_formatarcep.php");
	include ("f_formatarnumero.php");

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$sexo = $_POST['sexo'];
	$numero = $_POST['numero'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$complemento = $_POST['complemento'];
	$numero_endereco = $_POST['numero_endereco'];
	$cep = $_POST['cep'];

	$nome = ucfirst($nome);
	$sobrenome = ucfirst($sobrenome);
	$endereco = ucwords($endereco);
	$complemento = ucwords($complemento);

	$cpf = formatar_cpf($cpf);
	$cep = formatar_cep($cep);
	$numero = formatar_numero($numero);
	
	$sql = "insert into clientes (nome, sobrenome, sexo, numero, email, senha, cpf, cidade, endereco, bairro, numero_endereco, cep, complemento_endereco) values ('$nome', '$sobrenome', '$sexo', '$numero', '$email', '$senha', '$cpf', '$cidade', '$endereco', '$bairro', '$numero_endereco', '$cep', '$complemento');";

	$sql2= "select * from clientes where email='$email';";
	$sql3= "select * from clientes where cpf='$cpf';";
	$sql4= "select * from clientes where numero='$numero';";

	$result2 = mysqli_query($connect, $sql2);
	$result3 = mysqli_query($connect, $sql3);
	$result4 = mysqli_query($connect, $sql4);

	$rows2 = mysqli_num_rows($result2);
	$rows3 = mysqli_num_rows($result3);
	$rows4 = mysqli_num_rows($result4);

	//echo $rows2;
	//echo $rows3;
	//echo $rows4;

	if ($rows2==0 && $rows3==0 && $rows4==0){

	mysqli_query($connect, $sql);
		header("Location: login.php?signup=success");
	}

	else{
		header("Location: cadastro_cliente.php");
	}
?>