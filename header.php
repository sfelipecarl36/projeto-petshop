<?php
include("checklogout.php");
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espaço Patinhas</title>
	<link rel="shortcut icon" type="img/png" href="img/logopetshop-icon.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar_mobile.css">
	<script src="https://kit.fontawesome.com/9d12be487b.js" crossorigin="anonymous"></script>
</head>
<body id="body" class="overblock">
		<header class="flexcolumn navbar-static-top d-none d-md-inline-flex">
			<nav class="navbar homenav flexrow p-4 justify-between">
				<a href="index.php"><img src="img/logopetshop2.png" class="px-4 py-1" id="logohome"></a>
				<ul class="flexrow px-4" id="lista-contato">
					<?php 
						if(isset($_SESSION['email'])){
							echo '<li class="flexrow px-2"><a href="editarperfil.php"><h5><i class="far fa-user px-2 rosa"></i>Olá, '.$_SESSION["nome"].'</h5></a></li>';
							echo '<li class="flexrow px-2"><a href="logout.php"><h5>Sair</h5></a></li>';
						}
						else{
							echo '<li class="flexrow px-2"><a href="cadastro_cliente.php"><h5>CADASTRAR-SE</h5></a></li>
					<li class="flexrow px-2"><a href="login.php"><h5>ENTRAR</h5></a></li>';
						}
					?>
					<li class="px-2"></li>
					<li class="flexrow px-2"><p>Contate-Nos:</p></li>								
					<li class="flexrow px-2"><i class="fas fa-phone-square px-2"></i><p>Telefone: (91) 98428-0382</p></li>
					<li class="flexrow px-2"><i class="fab fa-whatsapp px-2"></i><a href="https://wa.me/5591984280382"><p>Whatsapp: (91) 98428-0382</p></a></li>					
					
				</ul>
			</nav>
			<nav class="navbar homenav2 navbar-expand-md navbar-dark bg-maisescuro navbar-static-top d-none d-md-block">
				<div class="container">
					<div class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto menu">

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle menuItem" href="index.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-home px-2 white"></i>INÍCIO</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="http://localhost/projeto-petshop/index.php#quemsomos">QUEM SOMOS</a>
							<a class="dropdown-item" href="http://localhost/projeto-petshop/index.php#localizacao">ONDE ESTAMOS</a>
							<a class="dropdown-item" href="http://localhost/projeto-petshop/index.php#redesociais">REDES SOCIAIS</a>
							<a class="dropdown-item" href="http://localhost/projeto-petshop/index.php#galeria">GALERIA</a>
						</div>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle menuItem" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-bone px-2 white"></i>CATEGORIAS</a>
						
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">RACOES</a>				
							<a class="dropdown-item" href="clinicaveterinaria.php">CLÍNICA VETERINÁRIA<i class="fas fa-angle-right seta p-2"></i></a>
							<div class="dropright">
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">AGENDAR CONSULTA</a>
									<a class="dropdown-item" href="#">SOBRE NOSSA CLÍNICA</a>
								</div>
							</div>						
							<a class="dropdown-item" href="#">RACOES 3</a>
						</div>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle menuItem" href="servicos.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-clock white px-2"></i>SERVIÇOS</a>
						
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">RACOES</a>				
							<a class="dropdown-item" href="clinicaveterinaria.php">CLÍNICA VETERINÁRIA<i class="fas fa-angle-right seta p-2"></i></a>
							<div class="dropright">
								<div class="dropdown-menu">
									<a class="dropdown-item" href="consulta_pet.php">AGENDAR CONSULTA</a>
									<a class="dropdown-item" href="#">SOBRE NOSSA CLÍNICA</a>
								</div>
							</div>						
							<a class="dropdown-item" href="banhotosa.php">BANHO E TOSA<i class="fas fa-angle-right seta p-2"></i></a>
							<div class="dropright">
								<div class="dropdown-menu">
									<a class="dropdown-item" href="consulta_pet.php">AGENDAR BANHO/TOSA</a>
								</div>
							</div>	
						</div>
					</li>			

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle menuItem" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-bone px-2 white"></i>CATEGORIAS</a>
						
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">RACOES</a>				
							<a class="dropdown-item" href="#">RACOES 2 e DESENVOLVIMENTO PET<i class="fas fa-angle-right seta p-2"></i></a>
							<div class="dropright">
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">LISTA DE CONTATO</a>
									<a class="dropdown-item" href="#">LISTA DE CONTATO 2</a>
								</div>
							</div>						
							<a class="dropdown-item" href="#">RACOES 3</a>
						</div>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle menuItem" href="editarperfil.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user px-2 white"></i>PERFIL</a>
						
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="meuspets.php">MEUS PETS</a>
							<a class="dropdown-item" href="agendamentos.php">AGENDAMENTOS</a>
							<a class="dropdown-item" href="cadastro_pet.php">CADASTRAR PET</a>
							<a class="dropdown-item" href="editarperfil.php">EDITAR PERFIL</a>
							<a class="dropdown-item" href="logout.php">SAIR</a>
						</div>
					</li>
					<li class="flexrow px-4">
						<p class="white px-2 d-none d-xl-block">Pesquisar:</p>
						<input type="text" name="pesquisa" id="inputpesquisa" class="form-control px-3 d-none d-xl-block">
					</li>			

				</ul>
				</div>
				</div>
			</nav>
			
		</header>

		<!-- Navegação Mobile -->

    <script type="text/javascript">

    	function handleClick() {    
    	
    		let checkBar = document.getElementById("checksidebar");
    		let checkBody = document.getElementById("body");
    		let checkSideBar = document.getElementById("sidebar");
    		let checkMain = document.getElementById("main");
    		let checkFooter = document.getElementById("footer");
    		let checkNavMobile = document.getElementById("nav-mobile");


	    	if (checkBar.checked) {
	    		checkBar.checked = false;
	    		checkBody.classList.remove("overhidden");	    		
	    		checkBody.classList.add("overblock");
	    		checkMain.classList.remove("transp");
	    		checkFooter.classList.remove("transp");
	    		checkNavMobile.classList.remove("transp");
	    	}
	    	else{
	    		checkBar.checked = true;
	    		checkBody.classList.add("overhidden");
	    		checkBody.classList.remove("overblock");	    		
	    		checkMain.classList.add("transp");
	    		checkFooter.classList.add("transp");
	    		checkNavMobile.classList.add("transp");
	    	}
    	}

    </script>

        <nav class="navbar d-flex d-md-none p-0 nav-mobile">
            <div class="line-red-bottom" style="height:50px" >
                <div class="row align-items-center" style="height: 50px">
                    <div class="d-inline-flex justify-content-center">
                        <div class="flexrow" style="width: 85vw;">
                            <h2 class="fas fa-bars p-3 bars-mobile inputpesquisar white" onClick="handleClick()">
                            </h2>                            
                            <input type="checkbox" onclick="handleClick()" id="checksidebar" style="display: none"/>                            
                            <div class="sidebar" id="sidebar">                            
                                <div class="sidebar-content">
                                    <div class=" sidebar-item sidebar-menu">
                                        <ul class="ulsidebar">
                                            <li>
                                                <div class="pesquisa">
                                                    <span class="inputsidebar"/>                                                    
                                                </div>
                                                <h2 class="fas fa-bars inputpesquisar bars-mobile2 white" onClick="handleClick()"></h2>
                                            </li>
                                            <hr/>
                                            <?php if(isset($_SESSION['email'])){
                                            echo '<li class="flexrow"><a href="editarperfil.php">
                                            	<i class="far fa-user white"></i><h5 class="white">Olá, '.$_SESSION["nome"].'</h5></a>
                                            </li>
                                            <hr/>';

                                        	}

                                        	else{
                                        		echo '<li class="flexrow px-2"><a href="login.php">
                                            	<h5 class="white">ENTRAR</h5></a>
                                            </li>
                                            <li class="flexrow px-2"><a href="cadastro_cliente.php">
                                            	<h5 class="white">CADASTRO</h5></a>
                                           	</li>
                                            <hr/>';
                                        	}
                                            
                                            ?>
                                            <li>
                                                <a href="index.php">
                                                    <i class="fas fa-home font-size-16"></i>
                                                    <span class="font-size-16">Página Inicial</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="http://localhost/projeto-petshop/index.php#quemsomos">
                                                    <i class="fas fa-paw"></i>
                                                    <span class="menu-text">Quem Somos</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-store font-size-16"></i>
                                                    <span class="menu-text font-size-16">Pet Shop</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="agendamentos.php">
                                                    <i class="fas fa-tree font-size-16"></i>
                                                    <span class="menu-text font-size-16">Agendamentos</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="meuspets.php">                      
                                                    <i class="fas fa-dog font-size-16"></i>
                                                    <span class="menu-text font-size-16">Meus Pets</span>
                                                </a>
                                            </li>

											<li>
                                                <a href="consulta_pet.php">
                                                    <i class="fas fa-calendar-plus font-size-16"></i>
                                                    <span class="menu-text">Marcar Serviço</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="servicos.php">
                                                    <i class="fas fa-calendar-alt font-size-16"></i>
                                                    <span class="menu-text">Serviços</span>
                                                </a>
                                            </li>
                                            <?php if(isset($_SESSION['email'])){
                                            echo '<li>
                                                <a href="logout.php">
                                                    <i class="fas fa-sign-out"></i>
                                                    <span class="menu-text">Sair</span>
                                                </a>
                                            </li>';
                                        	}    
                                        	?>                        
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-inline text-center p-0" >
                        		<a class="navbar-brand pt-0 m-0" href="#">
                            		<img class="img-fluid" src="img/logopetshop2.png" id='topo' alt='Logo | Página Inicial'/>
                        		</a>
                   			</div>
                        </div>
                    </div>                  
                </div>
            </div>
        </nav><div class='navbar d-flex d-md-none p-0' style="height:50px"><p></p></div>