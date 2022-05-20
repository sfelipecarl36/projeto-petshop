<?php
session_start();
include("connect.php");
include("checklogin.php");
include("assocPet.php");
include("header.php");
?>

  <main id="main" class="flexcolumn justify-center p-2">
    <br>
    <h5 class="p-5">Editar Pet<i class="fa-solid fa-bone px-2"></i></h5>
     <div class="cadastro flexcolumn justify-center w-75">
        <form action="editando_pet.php?idpet=<?=$id_pet?>" method="POST" enctype="multipart/form-data">   

            <div class="row p-5">
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Nome<input class="form-control" type="text" pattern="[A-Za-z]+$"
                    minlength="2" maxlength="15" name="nome" value="<?=$nome_pet?>" required>                    
                </div>
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Sobrenome<input class="form-control" type="text" pattern="[A-Za-z]+$"
                    minlength="2" maxlength="15"name="sobrenome" value="<?=$sobrenome_pet?>">
                </div>
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Sexo<select class="form-control" name="sexo" required>
                        <?php                                        
                        if ($sexo_pet=="M"){
                        echo '<option selected>Masculino</option>';
                        echo '<option>Feminino</option>';
                        }
                        else if($sexo_pet=="F"){
                        echo '<option>Masculino</option>';
                        echo '<option selected>Feminino</option>';
                        }
                        ?>  
                    </select>
                </div>
                <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    Tipo<select class="form-control" name="tipo" required>
                        <?php 
                        if ($tipo_pet=="Cachorro"){
                        echo '<option selected>Cachorro</option>';
                        echo '<option>Gato</option>';
                        }       
                        else if($tipo_pet=="Gato"){
                        echo '<option>Cachorro</option>';
                        echo '<option selected>Gato</option>';
                        }

                        ?>  
                    </select>
                </div> 
                <div class="py-2 col-lg-1 col-md-1 col-sm-12">
                    Idade<input class="form-control" type="text" pattern="[0-9]+$" minlength="1" maxlength="3" name="idade" required value="<?=$idade?>">
                </div> 
                <div class="py-2 col-lg-1 col-md-1 col-sm-12">
                    Peso(Kg)<input class="form-control" type="text" pattern="[0-9]+$" minlength="1" maxlength="6" name="peso" value="<?php echo number_format($peso, 0);?>">
                </div>         
                <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    Raça<select class="form-control" name="raca">
                        <option>Siamês</option>
                        <option>Pudo</option>
                    </select>
                </div> 
                <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    <?php
                    if($deficiencia==0){
                        echo 'Sem Deficiência<input class="form-check-input" type="radio" checked name="deficiencia" value="0">';
                        echo 'Com Deficiência<input class="form-check-input" type="radio" name="deficiencia" value="1">';
                    }                    
                    else if($deficiencia==1){
                        echo 'Sem Deficiência<input class="form-check-input" type="radio" name="deficiencia" value="0">';
                        echo 'Com Deficiência<input class="form-check-input" type="radio" checked name="deficiencia" value="1">';
                    }      
                    ?>
                </div>                                
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    (Obs de Deficiência)<textarea class="form-control" rows="2" cols="40" maxlength="100" name="obs_deficiencia"><?=$obs_deficiencia?></textarea>
                </div>
                <div class="py-2 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    Foto do Perfil<input class="form-control" type="file" accept="image/*" name="pic">
                </div>                  
                <div class="pt-5 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    <input class="btn btn-primary" type="submit" value="Salvar Alterações" name="enviar" required>
                </div>
                <div class="pt-3 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    <a href="deletando_pet.php?idpet=<?=$id_pet?>"><input class="btn btn-secondary" type="button" value="Apagar Pet" name="deletar" ></a>
                </div>
            </div>            
        </form>

    </div>

    </main>
<?php
include("footer.php");
?>
