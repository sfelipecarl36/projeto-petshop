<?php
session_start();
include("checklogin.php");
include("header.php");
?>

 <main id="main" class="flexcolumn justify-center p-2">
    <br>
    <h5 class="p-5">Cadastro de Pet<i class="fa-solid fa-bone px-2 rosa"></i></h5>
     <div class="cadastro flexcolumn justify-center w-90">
        <form action="cadastrando_pet.php" method="POST" enctype="multipart/form-data">   

            <div class="row p-5">
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Nome<input class="form-control" type="text" pattern="[A-Za-z]+$"
                    minlength="2" maxlength="15" name="nome" required>                    
                </div>
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Sobrenome<input class="form-control" type="text" pattern="[A-Za-z]+$"
                    minlength="2" maxlength="15"name="sobrenome">
                </div>
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Sexo<select class="form-control" name="sexo" required>
                        <option>Masculino</option>
                        <option>Feminino</option>                
                    </select>
                </div>
                <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    Tipo<select class="form-control" name="tipo" required>
                        <option>Cachorro</option>
                        <option>Gato</option>                
                    </select>
                </div> 
                <div class="py-2 col-lg-1 col-md-1 col-sm-12">
                    Idade<input class="form-control" type="text" pattern="[0-9]+$" minlength="1" maxlength="3" name="idade" required>
                </div> 
                <div class="py-2 col-lg-1 col-md-1 col-sm-12">
                    Peso (em Kg)<input class="form-control" type="text" pattern="[0-9]+$" minlength="1" maxlength="6" name="peso">
                </div>         
                <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    Raça<select class="form-control" name="raca">
                        <option>Siamês</option>
                        <option>Pudo</option>
                    </select>
                </div> 
                <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    Sem Deficiência<input class="form-check-input" type="radio" checked name="deficiencia" value="0">
                    Com Deficiência<input class="form-check-input" type="radio" name="deficiencia" value="1">
                </div>                                
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    (Obs de Deficiência)<textarea class="form-control" rows="2" cols="40" maxlength="100" name="obs_deficiencia"></textarea>
                </div>
                <div class="py-2 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    Foto do Perfil<input class="form-control" type="file" accept="image/*" name="pic">
                </div>                  
                <div class="pt-5 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    <input class="btn btn-primary" type="submit" value="CADASTRAR PET" name="enviar" required>
                </div>
            </div>            
        </form>

    </div>

    </main>
<?php
include("footer.php");
?>
