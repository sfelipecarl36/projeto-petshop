<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login SuperAdmin</title>
    <link rel="shortcut icon" type="img/png" href="img/logopetshop-icon2.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">

	*{padding: 0;margin: 0;font-family: Calibri;}

	div.main{
		display: flex;
		flex-direction: row-reverse;
		width: 100vw;
		height: 100vh;
	}

	img.main{
		width: 100%;
		height: 100%;
		box-shadow: 0px 0px 1px 0px black;
	}

	h2{font-weight: 400;color: #494949;padding-bottom: 20px;font-size:24px}
	h3{color:white;text-align:center;font-weight:300;font-size:18px;transform: translateY(-1px) }
	h4{color: #090909;padding-left: 2px;padding-bottom: 5px;font-size: 17px;font-weight:500}

	body{
		background: white;
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
		outline: none;border: 0;border-radius: 18px; background-color: #0073e6;color: white;
		width: 90px; height: 40px; font-size: 20px;transform: translateX(165%);transition: 190ms;
	}
	#submeter:hover{
		box-shadow: 0px 0px 8px 0px #0073e6;background-color: white;color: #0073e6;transition: 190ms;
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
		box-shadow: 0px 0px 0px 0px #595959;
		display: flex;
		width: 100vw;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		padding: 40px;
	}
	
	#imglogin{width:125px;}
	
	
@media only screen and (orientation: portrait) {
    
    *{font-family:Arial;}
    h2{font-size:37px}
    h3{font-size:29px;}
    h4{font-size:29px;}
    input.texto{width:500px;height:95px;font-size:30px;border-color: black;}
    body{background-size:cover;background-repeat: no-repeat;background-position: center}
    main{height: 90vh;}
    img.main{display: none;}
    #divlogin{width: 100%;height:auto;}
    #diverror{height:40px;width:432px;}
    #submeter{transform: translateX(105%);width:160px;height:88px;font-size:33px;}
    #imglogin{width:300px;}
    
}

	</style>

</head>
<body>
<script type="text/javascript">
	function mudaFoto() {
		let imgHome = document.getElementById('imghome');
		let indice = 0;
		
		while(indice==0 | indice>3){
		indice = Math.floor(Math.random() * 4);
		}

		indice = indice.toString();
		imgHome.src="img/homeimg"+indice+".jpg";
	}
</script>
<main><div class="main">
	<div id="divlogin"><br><br>
	    <a href="logando.php"><img src="img/logopetshop2.png" id="imglogin"></a><br>
	    <h2>Área Admin</h2>
		<?php
	    if (isset($_SESSION['usernot'])):
	    ?>
		<div id="diverror"><h3><?= $_SESSION['usernot'] ?></h3></div><br>
		<?php session_destroy(); endif  ?>

		<?php
	    if (isset($_GET['signup'])):
	    	if($_GET['signup']=="success"):
	    ?>

		<div id="divsuccess"><h3>Registro Concluído</h3></div><br>
		<?php endif; endif;  ?>
			<form method="POST" action="logando.php">
				<h4>Email:</h4>
				<input class="texto" type="email"
				name="email" placeholder="E-mail de usuário" required>
				<br><br>
				<h4>Senha:</h4>
				<input class="texto" type="password"
                placeholder="Senha" name="senha" required>
				<br><br><br>
				<input type="submit" name="submeter" id="submeter" value="Entrar">
				<i class="fa-solid fa-right-to-bracket"></i>
			</form>
	<br><br>
	<h5><?php $ano_atual = date("Y");echo $ano_atual;?> © Brasil.</h5>
</div>
<img class="main img-fluid" id="imghome" src="img/homeimg1.jpg">
<script type="text/javascript">
	mudaFoto();
</script>
</div>
</main>	
</body>
</html>