<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
    <link rel="shortcut icon" type="img/png" href="img/logopetshop-icon.png">
	<style type="text/css">

	*{padding: 0;margin: 0;font-family: Calibri;}

	h2{font-weight: 400;color: #494949;padding-bottom: 20px;font-size:24px}
	h3{color:white;text-align:center;font-weight:300;font-size:18px;transform: translateY(-1px) }
	h4{color: #090909;padding-left: 2px;padding-bottom: 5px;font-size: 17px;font-weight:500}

	body{
		background-image:
		url(http://images2.fanpop.com/image/photos/13600000/Dog-wallpaper-dogs-13632654-1280-800.jpg);
		background-size:cover;background-repeat: no-repeat;
	}
	main{
		height: 100vh;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;

	}	

	input.texto{
		width: 380px;height: 40px;background:none ;
		border-radius: 12px;border: 1px solid #c9c9c9;outline: 0;
		padding-left: 10px;font-size: 18px;color: #4d4d4d;
	}
	input.texto:hover{
		border: 1px solid #b3b3b3
	}
	input.texto:focus{
		border: 1px solid #a1a1a1
	}

	#submeter{
		outline: none;border: 0;border-radius: 18px; background-color: #b30059;color: white;
		width: 90px; height: 40px; font-size: 20px;transform: translateX(165%);transition: 190ms;
	}
	#submeter:hover{
		box-shadow: 0px 0px 8px 0px #b30059;background-color: white;color: #b30059;transition: 190ms;
	}

    
    #diverror{
		width: 342px;height: 32px;background-color:#ff4d4d ;
		border-radius: 5px;border: 1px solid #d9d9d9;outline: 0;
		display:flex;flex-direction:column;
		font-size: 17px;align-items:center;justify-content:center;
	}

	#divsuccess{
		width: 342px;height: 32px;background-color:#009933 ;
		border-radius: 5px;border: 1px solid #d9d9d9;outline: 0;
		display:flex;flex-direction:column;
		font-size: 17px;align-items:center;justify-content:center;
	}

	#divlogin{
		background-color: rgba(255,255,255,0.92);width: 520px;height: auto;
		border-radius:40px;
		box-shadow: 0px 0px 15px 0px #595959;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
	
	#imglogin{width:125px;}
	
	
@media only screen and (orientation: portrait) {
    
    *{font-family:Arial;}
    h2{font-size:37px}
    h3{font-size:25px;}
    h4{font-size:25px;}
    input.texto{width:430px;height:65px;font-size:26px}
    body{background-size:cover;background-repeat: no-repeat;background-position: center}
    main{height: 90vh;}
    #divlogin{width:600px;height:auto;}
    #diverror{height:40px;width:432px;}
    #submeter{transform: translateX(135%);width:120px;height:68px;font-size:26px;}
    #imglogin{width:180px;}
    
}

	</style>

</head>
<body>
<main>
	<div id="divlogin"><br><br>
	    <a href="index.php"><img src="img/logopetshop2.png" id="imglogin"></a><br>
		<?php
	    if (isset($_SESSION['usernot'])):
	    ?>
		<div id="diverror"><h3><?= $_SESSION['usernot'] ?>, <a href="cadastro_cliente.php" style="text-decoration: none; color: white;"><u>Registre-se</u></a></h3></div><br>
		<?php session_destroy(); endif  ?>

		<?php
	    if (isset($_GET['signup'])):
	    	if($_GET['signup']=="success"):
	    ?>

		<div id="divsuccess"><h3>Registro Concluído</h3></div><br>
		<?php endif; endif;  ?>
			<form method="POST" action="logando.php">
				<h4>Email:</h4>
				<input class="texto" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
				name="email" placeholder="E-mail de usuário" required>
				<br><br>
				<h4>Senha:</h4>
				<input class="texto" type="password" Pattern="^.{6,10}$"
                title="A senha deve conter no mínimo 6 caracteres e máximo 10" placeholder="Senha" name="senha" required>
				<br><br><br>
				<input type="submit" name="submeter" id="submeter" value="Entrar">
				<i class="fa-solid fa-right-to-bracket"></i>
			</form>
	<br><br></div>
</main>	
</body>
</html>