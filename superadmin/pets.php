<?php
session_start();
include("connect.php");
include("checklogin.php");
include("header.php");
?>

			<main id="main" class="flexcolumn justify-center">
				<br><br>
				<h2 class="py-5" id="localizacao">Pets Cadastrados</h2>
                <?php

					$sql = "select * from pets;";
					$result = mysqli_query($connect, $sql);
					$rows = mysqli_num_rows($result);

					if($rows>0){
						echo '<div class="row w-90 p-4">';
					while ($assoc = mysqli_fetch_assoc($result)) {
						echo '							
							  <div class="col-lg-4 col-md-6 col-sm-12 flexcolumn py-4">
							  <a href="editarpet.php?idpet='.$assoc['id'].'">
							  <div class="divpet" style="background-image:url(../'.$assoc['img'].');"></div></a>
	                          <h5 class="py-3">'.$assoc['nome'].'</h5></div>';
						} 
						echo '</div>';
						echo'<a href="cadastro_pet.php"><input type="button" class="btn btn-primary" value="CADASTRAR PET"></a><br>';
					}


					else{
						echo '<div class="row flexcolumn text-center w-90 p-4">';
						echo'Poxa, parece que você não cadastrou seu Pet<br>
							Clique para Cadastrar<hr><a href="cadastro_pet.php"><input type="button" class="btn btn-primary" value="CADASTRAR PET"></a>
							<img src="img/petsVector1.png" style="width:250px">';
						echo '</div>';							
					}
				?>                                        	             				

								</div><br>
			</main>
<?php
include("footer.php");
?>