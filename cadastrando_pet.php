<?php
	session_start();
	include ("connect.php");

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
    $new_name = date("Y.m.d-H.m.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = 'img/fotosperfil/'; //Diretório para uploads
 
    $foto = $dir.$new_name;
    move_uploaded_file($_FILES['pic']['tmp_name'], $foto);
 } 

 if($ext!=".jpg" && $ext!=".png"){
 	$foto = "img/fotosperfil/".$tipo.".jpg";
 }
	$sqlId = "select * from clientes where email='".$_SESSION["email"]."';";

	$result = mysqli_query($connect, $sqlId);
	$assoc = mysqli_fetch_assoc($result);

	$id = $assoc['id'];

	$sql = "insert into pets (nome, sobrenome, sexo, idade, tipo, img, peso, raca, deficiencia, obs_deficiencia, id_cliente) values ('$nome','$sobrenome', '$sexo', '$idade', '$tipo', '$foto', '$peso','$raca','$deficiencia', '$obs_deficiencia', $id);";


	mysqli_query($connect, $sql);
	header("Location: meuspets.php");
?>