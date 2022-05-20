<?php
	session_start();
	include ("connect.php");

	$id_pet = $_GET['idpet'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$sexo = $_POST['sexo'];
	$tipo = $_POST['tipo'];
	$idade = $_POST['idade'];
	$peso = $_POST['peso'];
	$raca = $_POST['raca'];
	$deficiencia = intval($_POST['deficiencia']);	
	$obs_deficiencia = $_POST['obs_deficiencia'];

	$nome = ucfirst($nome);
	$sobrenome = ucfirst($sobrenome);

	if(isset($_FILES['pic']))
 {
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = $nome.$id_pet . $ext; //Definindo um novo nome para o arquivo
    $dir = 'img/fotosperfil/'; //Diretório para uploads
 
    $foto = $dir.$new_name;
    move_uploaded_file($_FILES['pic']['tmp_name'], $foto);

 } 


if($ext!=".jpg" && $ext!=".png"){
$sql = "update pets set nome = '$nome', sobrenome = '$sobrenome', sexo = '$sexo',idade = '$idade', tipo = '$tipo', peso = '$peso', raca = '$raca', deficiencia = '$deficiencia',
	obs_deficiencia = '$obs_deficiencia' where id = $id_pet";
}
else{
$sql = "update pets set nome = '$nome', sobrenome = '$sobrenome', sexo = '$sexo',idade = '$idade', tipo = '$tipo',
	img = '$foto', peso = '$peso', raca = '$raca', deficiencia = '$deficiencia',
	obs_deficiencia = '$obs_deficiencia' where id = $id_pet";
}

	mysqli_query($connect, $sql);
	header("Location: editarpet.php?idpet=$id_pet");
?>