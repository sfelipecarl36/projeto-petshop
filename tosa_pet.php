<?php
session_start();
include("connect.php");
include("checklogin.php");
include("assocSession.php");
include("header.php");
?>

<script type="text/javascript">
    function ativaHoraDisp() {
        let button = document.getElementById('btnHoraDisp');
        button.click();
    }

</script>

   <script type="text/javascript">
    function envioConsulta() {
        form = document.getElementById("formEnvio");
        option = document.getElementById("optionHora");
        if(option!=null){
        if (option.value!='optionNo'){
        form.action = "tosando_pet.php";
        ativaHoraDisp();
        }
        else{
            window.alert("Horário não é válido");
        }
    }
    else{
        form.action = "tosando_pet.php";
        ativaHoraDisp();
    }
    }
    </script>

 <main id="main" class="flexcolumn justify-center p-2">
    <br>
    <h5 class="p-5">Marcar Banho & Tosa</h5>
     <div class="cadastro flexcolumn justify-center w-90">
        <form action="" id="formEnvio" method="POST">

            <div class="row p-5">
                <div class="py-2 col-lg-12 col-md-12 col-sm-12">
                    Paciente<select class="form-control" name="paciente" required>
                        <?php
                            $sqlId = "select * from clientes where email='".$_SESSION["email"]."';";
                            $resultId = mysqli_query($connect, $sqlId);
                            $assocId = mysqli_fetch_assoc($resultId);
                            $id = $assocId['id'];

                            $sql = "select * from pets where id_cliente = ".$id.";";
                            $result = mysqli_query($connect, $sql);
                            $rows = mysqli_num_rows($result);
                            if($rows>0){
                    while ($assocPet = mysqli_fetch_assoc($result)) {
                        if (isset($_POST['paciente'])) {
                            if ($assocPet['id']==$_POST['paciente']){
                        echo '<option value="'.$assocPet['id'].'" selected>'.$assocPet['nome'].' '.$assocPet['sobrenome'].'</option>';
                        } 
                        else{
                            echo '<option value="'.$assocPet['id'].'">'.$assocPet['nome'].' '.$assocPet['sobrenome'].'</option>';
                        }
                    } else{
                        echo '<option value="'.$assocPet['id'].'">'.$assocPet['nome'].' '.$assocPet['sobrenome'].'</option>';
                    }
                        } 
                    }

                    else{
                        echo'<option>Poxa, parece que você não cadastrou seu Pet, Clique para Cadastrar</option>';
                        echo'</select>';
                        echo'<a href="cadastro_pet.php"><input type="button" class="btn btn-primary" value="CADASTRAR PET"></a>
                            <img src="img/petsVector1.png" style="width:250px">';
                    }
                        ?>                    
                    </select>
                </div>

                <div class="py-2 col-lg-12 col-md-12 col-sm-12">
                    
                    Veterinário<select class="form-control" name="veterinario" id="selectVet" onchange="ativaHoraDisp()" required>
                        <?php
                            $sql = "select * from funcionarios where funcao_fk = 2;";
                            $result = mysqli_query($connect, $sql);
                            $rows = mysqli_num_rows($result);
                            if($rows>0){
                    while ($assocVet = mysqli_fetch_assoc($result)) {
                        if (isset($_POST['veterinario'])) {
                            if ($assocVet['id']==$_POST['veterinario']){
                        echo '<option value="'.$assocVet['id'].'" selected>'.$assocVet['nome'].' '.$assocVet['sobrenome'].'</option>';
                        } 
                        else{
                            echo '<option value="'.$assocVet['id'].'">'.$assocVet['nome'].' '.$assocVet['sobrenome'].'</option>';
                        }
                    } else{
                        echo '<option value="'.$assocVet['id'].'">'.$assocVet['nome'].' '.$assocVet['sobrenome'].'</option>';
                    }
                }
            }

                    else{
                        echo'<option>Não Há Veterinários disponíveis no momento</option>';
                    }
                        ?>
                    </select>                    

                </div> 
                <div class="py-2 col-lg-3 col-md-3 col-sm-12">

                   <?php

                    $data_atual = date("Y-m-d");
                    //$data_atual = date("2022-05-15");
                    $hora_atual = date("07:00");
                    if (isset($_POST['data_consulta'])) {
                        echo 'Data Consulta<input class="form-control daysOfWeekDisabled" style="min-width: 200px;" type="date" name="data_consulta" id="calendario" value="'.$_POST['data_consulta'].'" min="'.$data_atual.'" onchange="ativaHoraDisp()" required>';
                        } 
                        else{
                            echo 'Data Consulta<input class="form-control" style="min-width: 200px;" type="date" name="data_consulta" value="'.$data_atual.'" min="'.$data_atual.'" onchange="ativaHoraDisp()" required>';
                        }

                    ?>
                    
                </div> 
                <button name="enviavet" style="display:block;" id="btnHoraDisp">VER HORÁRIOS DISP</button>
                <div class="py-2 col-lg-12 col-md-12 col-sm-12">
                    Horário<select class="form-control" name="horario" required>
                        <?php
                        
                            $sqlVet = "select * from funcionarios where funcao_fk = 2;";
                            $resultVet = mysqli_query($connect, $sql);
                            $assocVet = mysqli_fetch_assoc($resultVet);

                            $sqlDisp = "select horarios_consulta from consultas where funcionario_fk = ".$assocVet['id'].";";
                            $resultHoraDisp = mysqli_query($connect, $sqlDisp);

                            $sqlConsul = "select * from consultas";
                            $resultConsul = mysqli_query($connect, $sqlConsul);
                            $rows3 = mysqli_num_rows($resultConsul);

                            if ($rows3>0){
                                if(isset($_POST['data_consulta'])){
                            $sql = "select distinct horarios_veterinario.hora, horarios_veterinario.id from horarios_veterinario 
                                    inner join funcionarios
                                    on horarios_veterinario.veterinario_fk = funcionarios.id
                                    inner join consultas
                                    where funcionarios.id = ".$_POST['veterinario']."
                                    and horarios_veterinario.hora not in 
                                    (SELECT horarios_veterinario.hora FROM horarios_veterinario
                                    inner join consultas
                                    on consultas.horario_consulta = horarios_veterinario.id
                                    where consultas.data_abertura = '".$_POST['data_consulta']."' and consultas.funcionario_fk= ".$_POST['veterinario']." and consultas.status_fk = 1  order by horarios_veterinario.hora)";
                            }
                            else{
                                $sql = "select distinct horarios_veterinario.hora, horarios_veterinario.id from horarios_veterinario 
                                    inner join funcionarios
                                    on horarios_veterinario.veterinario_fk = funcionarios.id
                                    inner join consultas
                                    where funcionarios.id = ".$_POST['veterinario']."
                                    and horarios_veterinario.hora not in 
                                    (SELECT horarios_veterinario.hora FROM horarios_veterinario
                                    inner join consultas
                                    on consultas.horario_consulta = horarios_veterinario.id
                                    where consultas.data_abertura = '".$data_atual."' and consultas.funcionario_fk= ".$_POST['veterinario']." and consultas.status_fk = 1  order by horarios_veterinario.hora)";
                            }
                            }
                            else{
                                $sql = "select horarios_veterinario.id, horarios_veterinario.hora from horarios_veterinario 
                            inner join funcionarios
                            on horarios_veterinario.veterinario_fk = funcionarios.id
                            where funcionarios.id = ".$_POST['veterinario'].";";
                            }
                            $result = mysqli_query($connect, $sql);
                            $rows = mysqli_num_rows($result);     

                            if($rows>0){
                    while ($assocHora = mysqli_fetch_assoc($result)) {
                        if(isset($_POST['veterinario']))
                            if($assocHora['hora']>$hora_atual | $_POST['data_consulta']!=$data_atual){
                        echo '<option value="'.$assocHora['id'].'">'.$assocHora['hora'].'</option>';
                    }
                        }   
                    }

                    else{
                        echo '<option id="optionHora" value="optionNo">Não há horários disponíveis</option>';
                    }
                        ?>
                    </select>
                    <script type="text/javascript">
                        calendario = document.getElementById('calendario');
                        calendario.datepicker(daysOfWeekDisabled: "0,6"); 
                    </script>
                </div>
                <div class="pt-5 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    <input class="btn btn-primary" type="button" value="Marcar Consulta" name="enviar" onclick="envioConsulta()" required>
                </div>

            </div>            
        </form>

    </div><br><br>

 	</main>
<?php
include("footer.php");
?>
