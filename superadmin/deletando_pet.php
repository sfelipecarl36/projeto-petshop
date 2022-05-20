<?php
	session_start();
	include ("connect.php");
	include ("assocPet.php");

	$sqlDelPetConsul = 'delete from consultas where paciente_fk = '.$id_pet;
	$deletaPetConsul = mysqli_query($connect, $sqlDelPetConsul);

	$sqlDelPet = 'delete from pets where id = '.$id_pet;
	$deletaPet = mysqli_query($connect, $sqlDelPet);

	if($deletaPet){
		header("Location: pets.php?petDeletado=success");
	}

	else{
		header("Location: pets.php?petDeletado=failed");
	}

?>