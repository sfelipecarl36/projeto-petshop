<?php
include("header.php");
?>

 <main id="main" class="flexcolumn justify-center p-2">
    <br>
    <h5 class="p-5">Cadastro de Usuário</h5>
     <div class="cadastro flexcolumn justify-center w-90">
        <form action="cadastrando_cliente.php" method="POST">

            <div class="row p-5">
                <div class="py-2 col-lg-6 col-md-6 col-sm-12">
                    Nome<input class="form-control" type="text" pattern="[A-Za-z]+$"
                    minlength="2" maxlength="15" name="nome" required>                    
                </div>
                <div class="py-2 col-lg-6 col-md-6 col-sm-12">
                    Sobrenome<input class="form-control" type="text" pattern="[A-Za-z]+$"
                    minlength="2" maxlength="15"name="sobrenome" required>
                </div>
                <div class="py-2 col-lg-6 col-md-6 col-sm-12">
                    E-mail<input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" required>                    
                </div>
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Senha<input class="form-control" type="password" Pattern="^.{6,10}$"
                    title="A senha deve conter no mínimo 6 caracteres e máximo 10" name="senha" required>
                </div>
                <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    Sexo<select class="form-control" name="sexo" required>
                        <option>Masculino</option>
                        <option>Feminino</option>                
                    </select>
                </div> 
                <div class="py-2 col-lg-3 col-md-3 col-sm-12">
                    Celular/Telefone (Sem DDD)<input class="form-control" type="text" maxlength="9" minlength="9"
                    pattern="[0-9]+$" name="numero" required>
                </div> 
                <div class="py-2 col-lg-3 col-md-3 col-sm-12">
                    CPF<input class="form-control" type="text" maxlength="14" minlength="11" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" name="cpf" required>
                </div>         
                <div class="py-2 col-lg-4 col-md-4 col-sm-12">
                    Endereço<input class="form-control" type="text" pattern="[A-Za-z\s]+$" minlength="3" maxlength="30" title="O Endereço deve conter somente letras" name="endereco" required>
                </div> 
                <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    Município<select class="form-control" name="cidade" required>
                        <option>Belém</option>
                        <option>Ananindeua</option>
                        <option>Marituba</option>
                        <option>Santarém</option>
                        <option>Marabá</option>
                    </select>
                </div> 
                <div class="py-2 col-lg-3 col-md-3 col-sm-12">
                    Bairro<select class="form-control" name="bairro" required>
                        <option>Pedreira</option>
                        <option>Sacramenta</option>
                        <option>Cremação</option>
                        <option>Barreiro</option>
                        <option>Aurá</option>
                        <option>Batista Campos</option>
                        <option>Farol</option>
                        <option>Nazaré</option>
                        <option>Curió-Utinga</option>
                        <option>Cruzeiro</option>
                        <option>Montese (Terra Firme)</option>
                        <option>Umarizal</option>
                        <option>Val-de-Cães</option>
                        <option>Guamá</option>
                        <option>Jurunas</option>
                        <option>Carananduba</option>
                        <option>Miramar</option>
                        <option>Fátima</option>
                        <option>Canudos</option>
                        <option>Marco</option>
                        <option>Marambaia</option>
                        <option>Condor</option>
                        <option>Cidade Velha</option>
                        <option>Chapéu-Virado</option>
                        <option>Cabanagem</option>
                        <option>Benguí</option>
                        <option>Parque Verde</option>
                        <option>Souza</option>
                        <option>Tapanã</option>
                        <option>Telégrafo</option>
                        <option>São Brás</option>
                    </select>
                </div> 
                <div class="py-2 col-lg-3 col-md-3 col-sm-12">
                    Complemento<input class="form-control" type="text"
                    pattern="[A-Za-z\s]+$" minlength="3" maxlength="30" title="O Complemento deve conter somente letras" name="complemento">
                </div> 
                <div class="py-2 col-lg-1 col-md-1 col-sm-12">
                    Número<input class="form-control" type="text" maxlength="8" minlength="1"
                    pattern="[0-9]+$" name="numero_endereco" required>
                </div> 
                 <div class="py-2 col-lg-2 col-md-2 col-sm-12">
                    CEP<input class="form-control" type="text" maxlength="8" minlength="8"
                    pattern="[0-9]+$" name="cep" required>
                </div>
                <div class="pt-5 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    <input class="btn btn-primary" type="submit" value="CADASTRAR" name="enviar" required>
                </div>
            </div>            
        </form>

    </div>

 	</main>
<?php
include("footer.php");
?>
