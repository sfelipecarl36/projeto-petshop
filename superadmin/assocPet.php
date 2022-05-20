<?php
$sqlId = "select * from pets where id='".$_GET["idpet"]."';";
$resultId = mysqli_query($connect, $sqlId);
$assocId_pet = mysqli_fetch_assoc($resultId);
$id_pet = $assocId_pet['id'];
$nome_pet = $assocId_pet['nome'];
$sobrenome_pet = $assocId_pet['sobrenome'];
$sexo_pet = $assocId_pet['sexo'];
$img = $assocId_pet['img'];
$idade = $assocId_pet['idade'];
$tipo_pet = $assocId_pet['tipo'];
$peso = $assocId_pet['peso'];
$raca = $assocId_pet['raca'];
$deficiencia = $assocId_pet['deficiencia'];
$obs_deficiencia = $assocId_pet['obs_deficiencia'];
$dono = $assocId_pet['id_cliente'];
?>