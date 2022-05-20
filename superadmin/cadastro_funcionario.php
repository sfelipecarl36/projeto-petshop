<?php
session_start();
include("header.php");
?>

 <main id="main" class="flexcolumn justify-center p-2">
    <br>
    <h5 class="p-5">Cadastro de Funcionário</h5>
     <div class="cadastro flexcolumn justify-center w-90">
        <form action="cadastrando_funcionario.php" class="flexcolumn justify-center" method="POST">

            <div class="row p-5 justify-center w-90">
                <div class="py-2 col-lg-3 col-md-4 col-sm-12">
                    Nome<input class="form-control" type="text" pattern="[A-Za-z]+$"
                    minlength="2" maxlength="15" name="nome" required>                    
                </div>
                <div class="py-2 col-lg-3 col-md-4 col-sm-12">
                    Sobrenome<input class="form-control" type="text" pattern="[A-Za-z]+$"
                    minlength="2" maxlength="15"name="sobrenome" required>
                </div>
                <div class="py-2 col-lg-3 col-md-4 col-sm-12">
                    Sexo<select class="form-control" name="sexo" required>
                        <option>Masculino</option>
                        <option>Feminino</option>                
                    </select>
                </div>
                <div class="py-2 col-lg-3 col-md-3 col-sm-12">
                    CPF<input class="form-control" type="text" maxlength="14" minlength="11" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" name="cpf" required>
                </div>
                <div class="py-2 col-lg-4 col-md-5 col-sm-12">
                    E-mail<input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" required>                    
                </div>
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Senha<input class="form-control" type="password" Pattern="^.{6,10}$"
                    title="A senha deve conter no mínimo 6 caracteres e máximo 10" name="senha" required>
                </div> 
                <div class="py-2 col-lg-4 col-md-6 col-sm-12">
                    Celular/Telefone (Sem DDD)<input class="form-control" type="text" maxlength="9" minlength="9"
                    pattern="[0-9]+$" name="numero" required>
                </div>
                <div class="py-2 col-lg-6 col-md-6 col-sm-12">
                    Horário Inicial<input class="form-control" type="time" maxlength="5" minlength="5" pattern="^\d{2}:\d{2}$" name="horainicial" required>
                </div>
                <div class="py-2 col-lg-6 col-md-6 col-sm-12">
                    Horário Final<input class="form-control" type="time" maxlength="5" minlength="5" pattern="^\d{2}:\d{2}$" name="horafinal" required>
                </div>
                <div class="p-2 col-lg-12 col-md-12 col-sm-12 flexrow">
                    <strong class="mx-auto">Dias de Trabalho</strong>
                </div>
                    <div class="p-2 col-lg-6 col-md-6 col-sm-12 flexrow">
                    Segunda<input type="checkbox" name="diasemana[]" class="form-check mx-auto" value="segunda">
                    </div>
                    <div class="p-2 col-lg-6 col-md-6 col-sm-12 flexrow">
                    Terça<input type="checkbox" name="diasemana[]" class="form-check mx-auto" value="terça">
                    </div>
                    <div class="p-2 col-lg-6 col-md-6 col-sm-12 flexrow">
                    Quarta<input type="checkbox" name="diasemana[]" class="form-check mx-auto" value="quarta">
                    </div>
                    <div class="p-2 col-lg-6 col-md-6 col-sm-12 flexrow">
                    Quinta<input type="checkbox" name="diasemana[]" class="form-check mx-auto" value="quinta">
                    </div>
                    <div class="p-2 col-lg-6 col-md-6 col-sm-12 flexrow">
                    Sexta<input type="checkbox" name="diasemana[]" class="form-check mx-auto" value="sexta">
                    </div>
                    <div class="p-2 col-lg-6 col-md-6 col-sm-12 flexrow">
                    Sábado<input type="checkbox" name="diasemana[]" class="form-check mx-auto" value="sábado">
                </div>
                
                <?php 

                $sqlFuncao = "select distinctrow nome from tipo_consultas;";
                $result = mysqli_query($connect, $sqlFuncao);
                $rowsFuncao = mysqli_num_rows($result);

                while ($assocFuncao = mysqli_fetch_assoc($result)) {
                echo '<div class="pt-5 col-lg-'. 12/$rowsFuncao. ' col-md-'. 12/$rowsFuncao. ' col-sm-12 flexcolumn">
                    '.$assocFuncao['nome'].'<input type="checkbox" name="funcao[]" class="form-check" value="'.$assocFuncao['nome'].'">
                </div>';
                }
                ?>
                <div class="pt-5 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    <input class="btn btn-primary" type="submit" value="CADASTRAR" name="enviar" required>
                </div>
            </div>            
        </form>
    </div>

    <div class="p-4"></div>

 	</main>
<?php
include("footer.php");
?>
