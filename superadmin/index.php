<?php
session_start();
include("header.php");
?>

<?php 

$sqlDash = 'select
  (select count(*) from clientes) as clientes,
  (select count(*) from pets) as pets,
  (select count(*) from funcionarios) as funcionarios,
  (select count(*) from consultas) as consultas,
  (select count(*) from consultas where status_fk = 1) as abertos,
  (select count(*) from consultas where status_fk = 2) as atendidos,
  (select count(*) from consultas where status_fk = 3) as cancelados;';
$resultDash = mysqli_query($connect, $sqlDash);
$assocDash = mysqli_fetch_assoc($resultDash);

 ?>

			<main id="main" class="flexcolumn justify-center">
				<div class="p-4">	

				</div>	

				<h2 class="py-5" id="textDashboard">Dashboard</h2>

				<div class="row" style="width: 60%;">
					<div class="col-lg-3 col-md-4 col-sm-6 mx-auto mb-4 dashboard">
						<div class="flexrow">
						<div class="icondashboard"><i class="fas fa-user icondashboard"></i></div>				
						<h5 class="px-3 black">Clientes Ativos</h5>
						</div>	
						<h5 class="black"><?=$assocDash['clientes']?></h5>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 mx-auto mb-4 dashboard">
						<a href="pets.php"><div class="flexrow">
						<div class="icondashboard"><i class="fas fa-paw icondashboard"></i></div>				
						<h5 class="px-3 black">Pets</h5>
						</div></a>
						<h5 class="black"><?=$assocDash['pets']?></h5>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 mx-auto mb-4 dashboard">
						<a href="funcionarios.php"><div class="flexrow">
						<div class="icondashboard"><i class="fas fa-users icondashboard"></i></div>				
						<h5 class="px-3 black">Funcionários</h5>
						</div></a>	
						<h5 class="black"><?=$assocDash['funcionarios']?></h5>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 mx-auto mb-4 dashboard">
						<a href="agendamentos.php"><div class="flexrow">
						<div class="icondashboard"><i class="fas fa-calendar-alt icondashboard"></i></div>				
						<h5 class="px-3 black">Agendamentos</h5>
						</div></a>
						<h5 class="black"><?=$assocDash['consultas']?></h5>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6 mx-auto mb-4 dashboard">
						<a href="agendamentos.php?status=2"><div class="flexrow">
						<div class="icondashboard"><i class="fas fa-check-circle icondashboard"></i></div>				
						<h5 class="px-3 black">Atendidos</h5>
						</div></a>
						<h5 class="black"><?=$assocDash['atendidos']?></h5>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 mx-auto mb-4 dashboard">
						<a href="agendamentos.php?status=3"><div class="flexrow">
						<div class="icondashboard"><i class="fas fa-times icondashboard"></i></div>				
						<h5 class="px-3 black">Cancelados</h5>
						</div></a>
						<h5 class="black"><?=$assocDash['cancelados']?></h5>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 mx-auto mb-4 dashboard">
						<a href="agendamentos.php?status=1"><div class="flexrow">
						<div class="icondashboard"><i class="fas fa-arrow-down icondashboard"></i></div>				
						<h5 class="px-3 black">Abertos</h5>
						</div></a>
						<h5 class="black"><?=$assocDash['abertos']?></h5>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 mx-auto mb-4 dashboard">
						<div class="flexrow">
						<div class="icondashboard"><i class="fas fa-user-plus icondashboard"></i></div>				
						<h5 class="px-3 black">Novos Clientes</h5>
						</div>	
						<h5 class="black">1</h5>
					</div>


				</div>

				<div class="p-4"></div>

				<img class="w-50" src="img/petshopvisita.jpeg">

				<div class="p-4"></div>
				
				<br>
			</main>

<?php
include("footer.php");
?>