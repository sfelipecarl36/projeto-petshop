<?php
session_start();
include("header.php");
?>

			<main id="main" class="flexcolumn justify-center">
				<br><br>
				<h2 class="py-5" id="localizacao">Funcionários da Instituição</h2>			
                <?php
					$sqlId = "select * from superadmins where email='".$_SESSION["email"]."';";
					$resultId = mysqli_query($connect, $sqlId);
					$assocId = mysqli_fetch_assoc($resultId);
					$id = $assocId['id'];

					$sql = "select * from funcionarios;";
					$result = mysqli_query($connect, $sql);
					$rows = mysqli_num_rows($result);

					if($rows>0){
						echo '<div class="row w-90 p-4">';
					while ($assoc = mysqli_fetch_assoc($result)) {
						echo '							
							  <div class="col-lg-4 col-md-6 col-sm-12 flexcolumn py-4">
							  <a href="editarfuncionario.php?idfun='.$assoc['id'].'">
							  <div class="divpet" style="background-image:url(img/profileVector1.png);"></div></a>
	                          <h5 class="py-3">'.$assoc['nome'].'</h5></div>';
						} 
						echo '</div>';
						echo'<a href="cadastro_funcionario.php"><input type="button" class="btn btn-primary" value="CADASTRAR FUNCIONÁRIO"></a><br>';
					}


					else{
						echo '<div class="row flexcolumn text-center w-90 p-4">';
						echo'Não há funcionários cadastrados<br>
							Clique para Cadastrar<hr><a href="cadastro_funcionario.php"><input type="button" class="btn btn-primary" value="INSERIR FUNCIONÁRIO"></a>
							';
						echo '</div>';							
					}
				?>                                        	             				

								</div><br>
			</main>
<?php
include("footer.php");
?>