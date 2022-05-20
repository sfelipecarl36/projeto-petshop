<?php
	include ("connect.php");
	include ("f_formatarcpf.php");
	include ("f_formatarnumero.php");

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$sexo = $_POST['sexo'];
	$cpf = $_POST['cpf'];
	$numero = $_POST['numero'];
	$horainicial = $_POST['horainicial'];
	$horafinal = $_POST['horafinal'];
	$servico = 0;

	$nome = ucfirst($nome);
	$sobrenome = ucfirst($sobrenome);
	$horainicial = intval($horainicial);
	$horafinal = intval($horafinal);

	$cpf = formatar_cpf($cpf);
	$numero = formatar_numero($numero);
	
	$sql = "insert into funcionarios (nome, sobrenome, sexo, numero, email, senha, cpf) values ('$nome', '$sobrenome', '$sexo', '$numero', '$email', '$senha', '$cpf');";

	$sql2= "select * from funcionarios where email='$email';";
	$sql3= "select * from funcionarios where cpf='$cpf';";
	$sql4= "select * from funcionarios where numero='$numero';";

	$result2 = mysqli_query($connect, $sql2);
	$result3 = mysqli_query($connect, $sql3);
	$result4 = mysqli_query($connect, $sql4);

	$rows2 = mysqli_num_rows($result2);
	$rows3 = mysqli_num_rows($result3);
	$rows4 = mysqli_num_rows($result4);

	//$rows2;
	//$rows3;
	//$rows4;

	if ($rows2==0 && $rows3==0 && $rows4==0){
		if($horainicial < $horafinal){
	mysqli_query($connect, $sql);

	$sqlEmail = 'select id from funcionarios where email = "'.$email.'";';
	$resultEmail = mysqli_query($connect, $sqlEmail);
	$assocEmail = mysqli_fetch_assoc($resultEmail);

		if(isset($_POST['diasemana'])){
		$diasemana = $_POST['diasemana'];
	}

	if($diasemana!=null){
		for ($i=0; $i < count($diasemana); $i++) { 
		$sqlDias = 'insert into dias_funcionario (dia, veterinario_fk) values ("'.$diasemana[$i].'", '.$assocEmail['id'].');';
		mysqli_query($connect, $sqlDias);
		}
		
	}

	if(isset($_POST['funcao'])){
		$funcao = $_POST['funcao'];
	}

	if($funcao!=null){
		for ($i=0; $i < count($funcao); $i++) {
		if($funcao[$i]=="Atendimento Veterinário"){
		$servico = 2;
		}
		if($funcao[$i]=="Banho e Tosa"){
		$servico = 1;
		}	
		$sqlFuncao = 'insert into funcao (nome, funcionario_fk, servico_fk) values ("'.$funcao[$i].'", '.$assocEmail['id'].', '.$servico.');';
		mysqli_query($connect, $sqlFuncao);
		}
		
	}

	while($horainicial < $horafinal){
		$horaini = strval($horainicial);
		$horaini .=":00";
		$sqlHora = 'insert into horarios_veterinario (hora, veterinario_fk) values ("'.$horaini.'", '.$assocEmail['id'].')';
		mysqli_query($connect, $sqlHora);
		$horainicial+=2;
	}


		header("Location: funcionarios.php?signup=success");
	}
}

	else{
		header("Location: cadastro_funcionario.php");
	}
?>