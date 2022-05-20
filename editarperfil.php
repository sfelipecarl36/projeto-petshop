<?php
session_start();
include("connect.php");
include("checklogin.php");
include("assocSession.php");
include("header.php");

$sql = "select * from pets where id_cliente = ".$id.";";
$result = mysqli_query($connect, $sql);
$rows = mysqli_num_rows($result);
?>

			<main id="main" class="flexcolumn justify-center">
				<br><br>
				<h2 class="py-5" id="localizacao">Meu Perfil</h2>
				<div class="col flexcolumn w-90 p-4 divperfil">
					<br>
					<img src="img/profileVector1.png" class="imgperfil">
					<br>
					<h4><?= $nome." ".$sobrenome ?></h4>
					<br><hr>
					<ul class="list-group" style="align-self: center;">
						<li class="flexrow p-1">
							<i class="fas fa-paw px-2 white"></i><h4>Quant. Pets: <?=$rows?></h4>
						</li>
						<li class="flexrow p-1">
							<i class="fas fa-envelope px-2 white"></i><h4>E-mail: <?=$email?></h4>
						</li>						
						<li class="flexrow p-1">
							<i class="fas fa-city px-2 white"></i><h4>Município: <?=$cidade?></h4>
						</li>
						<li class="flexrow p-1">
							<i class="fas fa-building px-2 white"></i><h4>Bairro: <?=$bairro?></h4>
						</li>
						<br>
						<a href="editar_cliente.php" style="align-self:center;"><input type="button" class="btn btn-light" name="editaperfil" value="Editar Perfil"></a>
					</ul>
					<br>

								</div><br>
			</main>

<?php
include("footer.php");
?>