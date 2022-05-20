<?php
include("connect.php");
include("checklogin.php");
include("checklogout.php");
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SuperAdmin</title>
    <link rel="shortcut icon" type="img/png" href="img/logopetshop-icon2.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar_mobile.css">
    <script src="https://kit.fontawesome.com/9d12be487b.js" crossorigin="anonymous"></script>
    <style type="text/css">
@media print{
        nav{display:none}
        #divespaco{display:none !important;}
        select{display: none !important;}
        i{display:none !important;}
        button{display:none !important;}
        input{display:none !important;}
        #barra-mobile{display: none !important;}
        .footer{display:none}
        .footer1{display:none}
        .footer2{display:none}
        @page {
            size: 25cm 35.7cm;
            margin: 5mm 5mm 5mm 5mm;
            }
    }

    </style>
</head>
<body id="body" class="overblock">
        <!-- Navegação Mobile -->

    <script type="text/javascript">

        function handleClick() {    
        
            let checkBar = document.getElementById("checksidebar");

            if (checkBar.checked) {
                checkBar.checked = false;
            }
            else{
                checkBar.checked = true;
            }
        }

    </script>

        <nav class="navbar d-flex p-0 nav-mobile" id="barra-mobile">
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
                                            
                                            <li>
                                                <a href="index.php">
                                                    <i class="fas fa-home font-size-16"></i>
                                                    <span class="font-size-16">Início</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fas fa-store font-size-16"></i>
                                                    <span class="menu-text">Info Empresa</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="funcionarios.php">
                                                    <i class="fas fa-users"></i>
                                                    <span class="menu-text font-size-16">Funcionários</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="pets.php">
                                                    <i class="fas fa-paw"></i>
                                                    <span class="menu-text font-size-16">Pets</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="agendamentos.php">                      
                                                    <i class="fas fa-calendar-alt font-size-16"></i>
                                                    <span class="menu-text font-size-16">Agendamentos</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fas fa-database"></i>
                                                    <span class="menu-text">Dados Cadastrais</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="../logout.php">
                                                    <i class="fas fa-globe"></i>
                                                    <span class="menu-text">Site Principal</span>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="logout.php">
                                                    <i class="fas fa-sign-out"></i>
                                                    <span class="menu-text">Sair</span>
                                                </a>
                                            </li>                 
                                            
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