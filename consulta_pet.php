<?php
session_start();
include("connect.php");
include("checklogin.php");
include("assocSession.php");
include("checkconsulta.php");
include("header.php");

?>

<script type="text/javascript">
    function ativaHoraDisp() {
        let button = document.getElementById('btnHoraDisp');
        button.click();
    }
</script>

<?php if (isset($_POST['servico'])) {

echo '<script type="text/javascript">
    function changeServico() {
        window.location.assign("consulta_pet.php");
    }
</script>';

}
else{

    echo'<script type="text/javascript">
    function changeServico() {
        let button = document.getElementById("btnHoraDisp");
        button.click();
    }
</script>';

}

 ?>

   <script type="text/javascript">
    function envioConsulta() {
        form = document.getElementById("formEnvio");
        option = document.getElementById("optionHora");
        if(option!=null && option!="0" && option!=0){
        if (option.value!='optionNo'){
        form.action = "consultando_pet.php";
        ativaHoraDisp();
        }
        else{
            window.alert("Preencha os dados corretamente");
        }
    }
    else{
        form.action = "consultando_pet.php";
        ativaHoraDisp();
    }
    }
    </script>

    <script type="text/javascript">
        function confirmaCon() {
            confirmaConsulta = window.confirm("Deseja confirmar o agendamento do serviço?");
        if (confirmaConsulta){
            envioConsulta();
    }
        }
    
</script>

 <main id="main" class="flexcolumn justify-center p-2">
    <br>
    <h2 class="p-5">Agendamento Pet<i class="fas fa-calendar-plus px-3 font-size-16"></i></h2>
     <div class="cadastro flexcolumn justify-center w-90">
        <form action="" id="formEnvio" method="POST">

            <div class="row p-5">
                <div class="py-2 col-lg-12 col-md-12 col-sm-12">
                    <p class="">Caro cliente, você pode ter até 3 agendamentos em aberto no nosso sistema, fique a vontade para agendar o melhor para seus Pets!<br>
        Se houver imprevistos por parte do Profissional solicitado, seu agendamento pode ser cancelado sem aviso prévio.<br>
        Ao ter problemas para comparecer ao PetShop, você pode cancelar seu agendamento na aba Agendamentos do seu Perfil.</p>
                </div>
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
                    Serviço<select class="form-control" name="servico" onchange="changeServico()" required>
                        <?php

                            $sql = "select * from tipo_consultas;";
                            $result = mysqli_query($connect, $sql);
                            $rows = mysqli_num_rows($result);
                            if($rows>0){
                                if(!isset($_POST['servico'])){
                                    echo '<option>Escolha seu serviço</option>';
                                }
                    while ($assocSer = mysqli_fetch_assoc($result)) {
                        if (isset($_POST['servico'])) {
                            if ($assocSer['id']==$_POST['servico']){
                        echo '<option value="'.$assocSer['id'].'" selected>'.$assocSer['nome'].'</option>';
                        } 
                        else{
                            echo '<option value="'.$assocSer['id'].'">'.$assocSer['nome'].'</option>';
                        }
                    } else{
                        echo '<option value="'.$assocSer['id'].'">'.$assocSer['nome'].'</option>';
                    }
                    $valorConsulta = $assocSer['valor'];
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
                    
                    Profissional<select class="form-control" name="veterinario" id="selectVet" onchange="ativaHoraDisp()">
                        <?php
                            $sql = "select funcionarios.id as idVet, funcionarios.nome as nomeVet, funcionarios.sobrenome as sobrenomeVet from funcionarios inner join funcao on funcao.funcionario_fk=funcionarios.id inner join tipo_consultas on tipo_consultas.id = funcao.servico_fk where funcao.servico_fk = ".$_POST['servico'].";";
                            $result = mysqli_query($connect, $sql);
                            $rows = mysqli_num_rows($result);
                            if(!isset($_POST['veterinario']) && !isset($_POST['servico'])){
                                    echo '<option value="0">Escolha quem irá lhe atender</option>';
                                }
                            else if(!isset($_POST['veterinario']) && isset($_POST['servico'])){
                                    echo '<option value="0">Escolha quem irá lhe atender</option>';
                                }
                            if($rows>0){
                                if ($_POST['veterinario']==0) {
                                    echo'<option value="0">Escolha quem irá lhe atender</option>';
                                }
                    while ($assocVet = mysqli_fetch_assoc($result)) {
                        if (isset($_POST['veterinario'])) {
                            if ($assocVet['idVet']==$_POST['veterinario']){
                        echo '<option value="'.$assocVet['idVet'].'" selected>'.$assocVet['nomeVet'].' '.$assocVet['sobrenomeVet'].'</option>';
                        } 
                        else{
                            echo '<option value="'.$assocVet['idVet'].'">'.$assocVet['nomeVet'].' '.$assocVet['sobrenomeVet'].'</option>';
                        }
                    } 
                }
            }

                    else{
                        if (isset($_POST['veterinario'])) {
                        echo'<option value="0">Escolha quem irá lhe atender</option>';
                    }
                    }
                        ?>
                    </select>                    

                </div> 
                <div class="py-2 col-lg-3 col-md-3 col-sm-12">

                   <?php

                    $data_atual = date("Y-m-d");
                    //$data_atual = date("2022-05-17");
                    $hora_atual = date("H:m");
                    /*if (isset($_POST['data_consulta'])) {
                        echo 'Data Consulta<input class="form-control daysOfWeekDisabled" style="min-width: 200px;" type="date" name="data_consulta" id="calendario" value="'.$_POST['data_consulta'].'" min="'.$data_atual.'" onchange="ativaHoraDisp()" required>';
                        } 
                        else{
                            echo 'Data Consulta<input class="form-control" style="min-width: 200px;" type="date" name="data_consulta" value="'.$data_atual.'" min="'.$data_atual.'" onchange="ativaHoraDisp()" required>';
                        }*/

                    ?>
                    Data Consulta
                    <select class="form-control" onchange="ativaHoraDisp()" name="data_consulta">
                    <?php
                        $sqlVet = "select funcionarios.id as idVet, funcionarios.nome as nomeVet, funcionarios.sobrenome as sobrenomeVet from funcionarios inner join funcao on funcao.funcionario_fk=funcionarios.id inner join tipo_consultas on tipo_consultas.id = funcao.servico_fk where funcao.servico_fk = ".$_POST['servico'].";";
                        $resultVet = mysqli_query($connect, $sql);
                        $assocVet = mysqli_fetch_assoc($resultVet);
                        

                        for($i = 0; $i<17; $i++){
                            
                            if(isset($_POST['veterinario'])){

                        $sql = "select date_add(date(now()), interval ".$i." day) as 'dataoption' where dayname(date_add(date(now()), interval ".$i." day)) in (select dias_funcionario.dia from dias_funcionario inner join funcionarios on dias_funcionario.veterinario_fk = funcionarios.id where funcionarios.id = ".$_POST['veterinario'].");";
                            }  
                        else{
                        $sql = "select date_add(date(now()), interval ".$i." day) as 'dataoption' where dayname(date_add(date(now()), interval ".$i." day)) in (select dias_funcionario.dia from dias_funcionario inner join funcionarios on dias_funcionario.veterinario_fk = funcionarios.id where funcionarios.id = ".$assocVet['idVet'].");";
                        }


                        $result = mysqli_query($connect, $sql);                        
                        $rowsData = mysqli_num_rows($result);
                                

                        if($rowsData>0){
                         while ($assocData = mysqli_fetch_assoc($result)) {
                            if (isset($_POST['data_consulta'])){
                            if ($assocData['dataoption']==$_POST['data_consulta'] && $_POST['dataoption']!=="0"){
                        echo '<option value="'.$assocData['dataoption'].'" selected>'.date("d/m/Y", strtotime($assocData['dataoption'])).'</option>'; 
                            } 
                        else{
                            echo '<option value="'.$assocData['dataoption'].'">'.date("d/m/Y", strtotime($assocData['dataoption'])).'</option>'; 
                            }
                        }
                    }
                                           
                    }
                    
                    }

                    if($_POST['data_consulta']=="0" || !isset($_POST['data_consulta'])){
                            echo '<option value="0" selected>Escolha uma data de prefência</option>';   
                    }

                        ?>
                    </select>
                    
                </div> 

                <div class="py-2 col-lg-12 col-md-12 col-sm-12">
                    Horário<select class="form-control" name="horario">
                        <?php
                        
                            $sqlVet = "select * from funcionarios where funcao_fk = ".$_POST['servico'].";";
                            $resultVet = mysqli_query($connect, $sql);
                            $assocVet = mysqli_fetch_assoc($resultVet);

                            $sqlDisp = "select horarios_consulta from consultas where funcionario_fk = ".$assocVet['id'].";";
                            $resultHoraDisp = mysqli_query($connect, $sqlDisp);

                            $sqlConsul = "select * from consultas";
                            $resultConsul = mysqli_query($connect, $sqlConsul);
                            $rows3 = mysqli_num_rows($resultConsul);

                            if ($rows3>0){
                                if(isset($_POST['data_consulta']) && $_POST['data_consulta']!="0"){
                            $sql = "select distinct horarios_veterinario.hora, horarios_veterinario.id from horarios_veterinario 
                                    inner join funcionarios
                                    on horarios_veterinario.veterinario_fk = funcionarios.id
                                    inner join consultas
                                    where funcionarios.id = ".$_POST['veterinario']."
                                    and horarios_veterinario.hora not in 
                                    (SELECT horarios_veterinario.hora FROM horarios_veterinario
                                    inner join consultas
                                    on consultas.horario_consulta = horarios_veterinario.id
                                    where consultas.data_abertura = '".$_POST['data_consulta']."' and consultas.funcionario_fk= ".$_POST['veterinario']." and consultas.status_fk = 1 order by horarios_veterinario.hora)";
                            }
                            /*else{
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
                            }*/
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
                            if(intval($assocHora['hora'])>intval($hora_atual) | $_POST['data_consulta']!=$data_atual){
                                if($_POST['data_consulta']!="0"){
                        echo '<option value="'.$assocHora['id'].'">'.$assocHora['hora'].'</option>';
                        }

                    }
                    else{ echo'echo <option id="optionHora" value="optionNo">Não há horários disponíveis</option>';}
                        }
                        if ($_POST['data_consulta']=="0") {
                               echo '<option id="optionHora" value="optionNo">Não há horários disponíveis</option>';
                           }   
                    }

                    else{
                        echo '<option id="optionHora" value="optionNo">Não há horários disponíveis</option>';
                    }
                        ?>
                    </select>
                    <button name="enviavet" style="display:none;" class="p-2" id="btnHoraDisp">VER HORÁRIOS</button>
                </div>
                <div class="pt-5 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                <?php if(isset($_POST['servico'])){
                    $sqlVal = "select tipo_consultas.valor as valor from funcao inner join tipo_consultas on funcao.servico_fk = tipo_consultas.id where tipo_consultas.id = ".$_POST['servico'].";";
                            $resultVal = mysqli_query($connect, $sqlVal);
                            $assocVal = mysqli_fetch_assoc($resultVal);
                    echo '<div class"divperfil"><h5>Valor: R$'.$assocVal['valor'].'</h5></div>';
                    echo '<div class"divperfil"><h5>Hora: '.$hora_atual.'</h5></div>';

                }


                ?>
                </div>
                <div class="pt-5 col-lg-12 col-md-12 col-sm-12 flexcolumn">
                    <input class="btn btn-primary" type="button" value="Marcar Serviço" name="enviar" onclick="confirmaCon()" required>
                </div>
            </div>    
            
        </form>

    </div><br><br><br>

 	</main>
<?php
include("footer.php");
?>
