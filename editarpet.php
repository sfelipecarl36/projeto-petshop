<?php
session_start();
include("connect.php");
include("checklogin.php");
include("assocSession.php");
include("assocPet.php");
include("header.php");

?>

			<main id="main" class="flexcolumn justify-center">
				<br><br>
				<h2 class="py-5" id="localizacao">Meu Pet</h2>
				<div class="col flexcolumn w-90 p-4" style="border-radius: 20px; background-color: #e60073;">
					<br>
					<img src="<?=$img?>" class="imgperfil">
					<br>
					<h4><?= $nome_pet." ".$sobrenome_pet ?></h4>
					<br><hr>
					<ul class="list-group" style="align-self: center;">
						<li class="flexrow p-1">
							<i class="fa-solid fa-cake-candles px-2 white"></i><h4>Idade: <?=$idade?></h4>
						</li>
						<li class="flexrow p-1">
							<i class="fas fa-paw px-2 white"></i><h4>Tipo: <?=$tipo_pet?></h4>
						</li>
                        <li class="flexrow p-1">
							<i class="fas fa-venus-mars px-2 white"></i><h4>Sexo: <?=$sexo_pet?></h4>
						</li>
						<li class="flexrow p-1">
							<i class="fas fa-dog px-2 white"></i><h4>Raça: <?=$raca?></h4>
						</li>
                        <li class="flexrow p-1">
							<i class="fas fa-weight px-2 white"></i><h4>Peso: <?=$peso?>Kg</h4>
						</li>									
						<br>
						<a href="editar_pet.php?idpet=<?=$id_pet?>" style="align-self:center;"><input type="button" class="btn btn-light" name="editapet" value="Editar Pet"></a>
					</ul>
					<br>

								</div><br>
			</main>

<?php
include("footer.php");
?>