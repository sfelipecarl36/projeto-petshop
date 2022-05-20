<?php
include("assocSession.php");
		$sqlCheckCon = "select * from consultas where status_fk = 1 and cliente_fk ='".$id."';";
        $resultCheckCon = mysqli_query($connect, $sqlCheckCon);
        $rowsCheckCon = mysqli_num_rows($resultCheckCon);
        
        if($rowsCheckCon>=3){
        	$_SESSION['maxConsultas'] = "Você atingiu o limite de Agendamentos Ativos";
        	header('Location: agendamentos.php');
        }
?>