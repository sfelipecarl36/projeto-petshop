<?php
	session_start();
	include ("connect.php");
	include ("f_formatarcpf.php");
	include ("f_formatarcep.php");
	include ("f_formatarnumero.php");
	include ("assocSession.php");

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$senha = $_POST['senha'];
	$sexo = $_POST['sexo'];
	$numero = $_POST['numero'];
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
	
	//Senha Setada

	$sql = "update clientes set nome = '$nome', sobrenome = '$sobrenome', sexo = '$sexo', numero = '$numero', senha = '$senha', cidade = '$cidade', endereco = '$endereco', bairro = '$bairro', numero_endereco = '$numero_endereco', cep = '$cep', complemento_endereco = '$complemento' where id = $id;";

	//Senha em branco

	$sql2 = "update clientes set nome = '$nome', sobrenome = '$sobrenome', sexo = '$sexo', numero = '$numero', cidade = '$cidade', endereco = '$endereco', bairro = '$bairro', numero_endereco = '$numero_endereco', cep = '$cep', complemento_endereco = '$complemento' where id = $id;";

	if($senha==null){

	mysqli_query($connect, $sql2);

}
else{mysqli_query($connect, $sql);}

	header("Location: editarperfil.php");
?>