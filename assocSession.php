<?php
$sqlId = "select * from clientes where email='".$_SESSION["email"]."';";
$resultId = mysqli_query($connect, $sqlId);
$assocId = mysqli_fetch_assoc($resultId);
$id = $assocId['id'];
$nome = $assocId['nome'];
$sobrenome = $assocId['sobrenome'];
$email = $assocId['email'];
$cidade = $assocId['cidade'];
$bairro = $assocId['bairro'];
$cpf = $assocId['cpf'];
$sexo = $assocId['sexo'];
$numero = $assocId['numero'];
$endereco = $assocId['endereco'];	
$numero_endereco = $assocId['numero_endereco'];
$cep = $assocId['cep'];
$complemento = $assocId['complemento_endereco'];
?>