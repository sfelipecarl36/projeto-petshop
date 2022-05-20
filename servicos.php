<?php
session_start();
include("connect.php");
include("header.php");
?>

			<main id="main" class="flexcolumn justify-center">
				<hr><br><br>
				<h2 class="" id="tituloprincipal">Nossos Serviços</h2><br><br>		
					<div class="row p-3 justify-center w-75">
							<div class="flexrow justify-center servicos col-lg-4 col-md-4 col-sm-12 pt-2">
								<a href="clinicaveterinaria.php"><h5 class="px-3">Atendimento Veterinário</h5></a>
								<img src="img/veterinario.png" class="servicos img-fluid" style="margin-left: -34px;">
							</div>

							<div class="p-3 d-md-none d-lg-block d-sm-block" style="max-width: 60px;"></div>

							<div class="flexrow justify-center servicos col-lg-4 col-md-4 col-sm-12 pt-4">
								<img src="img/tosador.png" class="servicos img-fluid">
								<a href="banhotosa.php"><h5 class="px-3">Banho e Tosa</h5></a>
							</div>
						
					</div><br>

					<div class="flexrow w-75 justify-center">
						<div class="px-2 flexcolumn justify-center">
							<h1 style="padding-top: 0px;">Aqui seu pet recebe todo carinho e atenção que merece!</h1>
							<h2>Oferecemos banho e tosa, consulta veterinária, rações e acessórios diversos! Venha conferir!</h2>
						</div>
						
						<div class="flexcolumn justify-center p-5 d-none d-lg-block" style="border-radius: 30px 0px 00px 70px; background-color: #e60073;width: 500px;min-height: 200px;"><h4 style="font-size: 20px">Aqui o banho é quentinho e seu gatinho é bem vindo! Agende agora mesmo o banho do seu amiguinho e não deixe a higiene dele para depois!<h4></div>
					</div>

					<br><br><br>
					
					<div class="container">
		<div class="row justify-content-center">
			<div class="card col-12 col-md-6 col-lg-3 p-3">
				<a href="https://www.facebook.com/EspacoPatinhas" target="_blank" class="">
                <div class="card-ico align-left pb-4 flexcolumn justify-center">
					<i class="fab fa-facebook-f px-2 white footer display-3 rosa"></i>
				</div>
				<div class="card-box flexcolumn justify-center">
					<p class="display-6">
						/EspacoPatinhas</p>
				</div>
                </a>
			</div>

			<div class="card col-12 col-md-6 col-lg-3 p-3">
				<a href="https://www.instagram.com/espacopatinhas/" target="_blank" class=""><div class="card-ico align-left pb-4 flexcolumn justify-center">
					<i class="fab fa-instagram px-2 white footer display-3 rosa"></i>
				</div>
				<div class="card-box flexcolumn justify-center">
					<p class="display-6">
						@espacopatinhas</p>
				</div></a>
			</div>

			<div class="card col-12 col-md-6 col-lg-3 p-3">
				<a onclick="goog_report_conversion ('https://wa.me/5591984280382')" href="https://wa.me/5591984280382" target="_blank" class=""><div class="card-ico align-left pb-4 flexcolumn justify-center">
					<i class="fab fa-whatsapp px-2 white footer display-3 rosa"></i>
				</div>
				<div class="card-box flexcolumn justify-center">
					<p class="display-6">
						(91) 98428-0382</p>
				</div></a>
			</div>

			
			</div>
		</div>
		<br><br><br><br>

			</main>
<?php
include("footer.php");
?>