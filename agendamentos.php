<?php
session_start();
include("connect.php");
include("checklogin.php");
include("header.php");
?>

<script type="text/javascript">
    function orderbyStatus() {
        let select = document.getElementById('selectStatus').value;
        window.location.href = "agendamentos.php?status="+select;
        
    }
    function orderbyServicos() {
        let select = document.getElementById('selectServicos').value;
        window.location.href = "agendamentos.php?servicos="+select;
    }

</script>


			<main id="main" class="flexcolumn justify-center">
				<br><br>
				<h2 class="py-5" id="localizacao">Agendamentos<i class="fas fa-calendar-alt px-3 font-size-16"></i></h2>
				<?php
				if(isset($_SESSION['maxConsultas'])){
					echo '
					<div class="diverror"><h6 class="px-2">'.$_SESSION['maxConsultas'].'</h6></div><br>';
					$_SESSION['maxConsultas'] = null;
				}
				if(isset($_SESSION['agendamentoSuccess'])){
					echo '
					<div class="divsuccess"><h6 class="px-2">'.$_SESSION['agendamentoSuccess'].'</h6></div><br>';
					$_SESSION['agendamentoSuccess'] = null;
				}

				?>
                <?php
					$sqlId = "select * from clientes where email='".$_SESSION["email"]."';";
					$resultId = mysqli_query($connect, $sqlId);
					$assocId = mysqli_fetch_assoc($resultId);
					$id = $assocId['id'];
					if(!isset($_GET['status']) && !isset($_GET['servicos'])){
					$sqlConsulta = "select consultas.id as idconsulta, tipo_consultas.nome as tipoconsulta, tipo_consultas.valor as valorconsulta, pets.nome as petnome,pets.sobrenome as petsobrenome, horarios_veterinario.hora as horario, funcionarios.nome as profissionalnome, funcionarios.sobrenome as profissionalsobrenome, consultas.data_abertura as data_ab, consultas.horario_consulta as hora, status_consultas.nome as status from consultas inner join tipo_consultas on consultas.tipo_fk = tipo_consultas.id inner join funcionarios on consultas.funcionario_fk = funcionarios.id inner join pets on consultas.paciente_fk = pets.id inner join status_consultas on consultas.status_fk = status_consultas.id inner join horarios_veterinario on consultas.horario_consulta = horarios_veterinario.id where cliente_fk = ".$id." order by consultas.id desc;";
					}
					else{
						if (isset($_GET['status'])) {
							$sqlConsulta = "select consultas.id as idconsulta, tipo_consultas.nome as tipoconsulta, tipo_consultas.valor as valorconsulta, pets.nome as petnome,pets.sobrenome as petsobrenome, horarios_veterinario.hora as horario, funcionarios.nome as profissionalnome, funcionarios.sobrenome as profissionalsobrenome, consultas.data_abertura as data_ab, consultas.horario_consulta as hora, status_consultas.nome as status from consultas inner join tipo_consultas on consultas.tipo_fk = tipo_consultas.id inner join funcionarios on consultas.funcionario_fk = funcionarios.id inner join pets on consultas.paciente_fk = pets.id inner join status_consultas on consultas.status_fk = status_consultas.id inner join horarios_veterinario on consultas.horario_consulta = horarios_veterinario.id where cliente_fk = ".$id." and status_consultas.id = ".$_GET['status']." order by consultas.id desc;";
						}
						else if (isset($_GET['servicos'])) {
							$sqlConsulta = "select consultas.id as idconsulta, tipo_consultas.nome as tipoconsulta, tipo_consultas.valor as valorconsulta, pets.nome as petnome,pets.sobrenome as petsobrenome, horarios_veterinario.hora as horario, funcionarios.nome as profissionalnome, funcionarios.sobrenome as profissionalsobrenome, consultas.data_abertura as data_ab, consultas.horario_consulta as hora, status_consultas.nome as status from consultas inner join tipo_consultas on consultas.tipo_fk = tipo_consultas.id inner join funcionarios on consultas.funcionario_fk = funcionarios.id inner join pets on consultas.paciente_fk = pets.id inner join status_consultas on consultas.status_fk = status_consultas.id inner join horarios_veterinario on consultas.horario_consulta = horarios_veterinario.id where cliente_fk = ".$id." and tipo_consultas.id = ".$_GET['servicos']." order by consultas.id desc;";
						}
					}

					$sql = "select * from consultas where cliente_fk = ".$id.";";
					$result = mysqli_query($connect, $sqlConsulta);
					$result2 = mysqli_query($connect, $sql);
					$rows = mysqli_num_rows($result2);

					if($rows>0){
						echo '
						<div class="flexrow px-3">
						<p class="px-2 d-none d-md-inline-flex">Status Consulta</p>
						<select class="form-control" onchange="orderbyStatus()" id="selectStatus" name="selectStatus">';

						if(!isset($_GET['status'])){

						echo'
						<option value="0"';
								echo'selected';						
						echo '>Status</option>';}

						echo'
						<option value="1"';
						if(isset($_GET['status'])){
							if ($_GET['status']==1) {
								echo'selected';
							}						
						}
						echo '>Em aberto</option>';

						echo'
						<option value="2"';
						if(isset($_GET['status'])){
							if ($_GET['status']==2) {
								echo'selected';
							}						
						}
						echo '>Atendido</option>';

						echo'
						<option value="3"';
						if(isset($_GET['status'])){
							if ($_GET['status']==3) {
								echo'selected';
							}						
						}
						echo '>Cancelado</option>';

						echo '
						</select>
						<div class="px-2"></div>
						<p class="px-2 d-none d-md-inline-flex">Serviços</p>
						<select class="form-control" onchange="orderbyServicos()" id="selectServicos" name="selectServicos">';
						
						if(!isset($_GET['servicos'])){

						echo'
						<option value="0"';
								echo'selected';						
						echo '>Serviço</option>';}


						echo'
						<option value="1"';
						if(isset($_GET['servicos'])){
							if ($_GET['servicos']==1) {
								echo'selected';
							}						
						}
						echo '>Banho e Tosa</option>';

						echo'
						<option value="2"';
						if(isset($_GET['servicos'])){
							if ($_GET['servicos']==2) {
								echo'selected';
							}						
						}
						echo '>Atendimento Veterinário</option>';

						echo '</select>
						<div class="px-2"></div>
						<a href="agendamentos.php"><input type="button" class="btn btn-secondary" value="RESETAR FILTROS"></a>
						</div><br>
						';
						echo '<div class="row w-90 flexcolumn" style="overflow-x:auto"><table class="table table-striped table-responsive" border="1">
						<thread>

						<tr>
							<th>Pet</th>
							<th>Serviço</th>
							<th>Profissional</th>
							<th>Data</th>
							<th>Horário</th>
							<th>Valor</th>
							<th>Status</th>
						</tr>
						</thread>
						';

					while ($assoc = mysqli_fetch_assoc($result)) {
						echo '
							<tr>
							<td>'.$assoc['petnome'].' '.$assoc['petsobrenome'].'</td>
							<td>'.$assoc['tipoconsulta'].'</td>
							<td>'.$assoc['profissionalnome'].' '.$assoc['profissionalsobrenome'].'</td>
							<td>'.date("d/m/Y", strtotime($assoc['data_ab'])).'</td>
							<td>'.$assoc['horario'].'</td>
							<td>R$'.$assoc['valorconsulta'].'</td>
							<td class="flexrow justify-between"><p class="pe-2">'.$assoc['status']."</p>";
							if ($assoc['status']=="Em aberto"){
							echo '<input type="button" onclick="confirmaCancel('.$assoc['idconsulta'].', `'.$assoc['petnome'].'`)" class="btn btn-danger" value="X">';
						}
							echo '
							</td>							
							</tr>
							  ';
						} 
						echo '</thread>';
						echo '</table>
						
						</div>
						<hr><a href="consulta_pet.php"><input type="button" class="btn btn-primary" value="AGENDAR NOVO SERVIÇO"></a><br><br>
						';
					}

					else{
						echo '<div class="row flexcolumn text-center w-90 p-4">';
						echo'Você ainda não possui serviços agendados.<br>
							Clique para Agendar Um<hr><a href="consulta_pet.php"><input type="button" class="btn btn-primary" value="AGENDAR SERVIÇO"></a>
							<img src="https://img.freepik.com/vetores-gratis/veterinario-com-o-cao-engracado-dos-desenhos-animados-e-ilustracao-do-vetor-personagens-isolados_1196-293.jpg" style="width:250px">';
						echo '</div>';							
					}
				?>                                        	             				

								</div>						
			</main>

<script type="text/javascript">
	function confirmaCancel(idconP, nomepetP) {
		let idcon = idconP.toString();
		let nomepet = nomepetP.toString();
		let confirma = window.confirm("Deseja cancelar o agendamento de "+nomepet+"?");		
		if (confirma) {
			window.location.href = "cancelaconsulta.php?idcon="+idcon;
					  }
	}
</script>

<?php
include("footer.php");
?>