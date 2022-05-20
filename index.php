<?php
session_start();
include("header.php");
?>
<script type="text/javascript">
	
	var timer = setInterval(rightImgHome,12500);

	function timerStop() {
		clearInterval(timer);
		timer = null;
	}

	function timerStart() {
		timerStop();
		timer = setInterval(rightImgHome,12500);
	}

	function rightImgHome() {
		let imgHome = document.getElementById('imghome');
		let imgHomeUrl = imgHome.style.backgroundImage;
		let indice = imgHomeUrl.substring(16,17);
		
		indice = parseInt(indice);
		indice+=1;
		
		if (indice>3) {
			indice=1;
		}
		indice = indice.toString();
		imgHome.style.backgroundImage="url(img/homeimg"+indice+".jpg)";
		timerStart();
	}

	function leftImgHome() {
		let imgHome = document.getElementById('imghome');
		let imgHomeUrl = imgHome.style.backgroundImage;
		let indice = imgHomeUrl.substring(16,17);
		
		indice = parseInt(indice);
		indice-=1;
		
		
		if (indice<1) {
			indice=3;
		}
		indice = indice.toString();
		imgHome.style.backgroundImage="url(img/homeimg"+indice+".jpg)";
		timerStart();
	}

</script>

			<main id="main" class="flexcolumn justify-center">
				<div class="imghome flexrow justify-between p-4" id="imghome" style="background:rgba(0, 0, 0, 0.1) url('img/homeimg2.jpg');">	

					<div class="buttonImgHome flexcolumn p-4 justify-center" onclick="leftImgHome()">
						<i class="fas fa-angle-left seta p-2 white"></i>
					</div>

					<div class="buttonImgHome flexcolumn p-4 justify-center" onclick="rightImgHome()">
						<i class="fas fa-angle-right seta p-2 white"></i>
					</div>

					<!--<h1 class="px-5" style="transform: translateY(+100px);">Espaço Patinhas Site</h1>-->
				</div>	

				<h2 class="py-5" id="quemsomos">Quem Somos?</h2>

				<p class="px-5">Somos um grupo multidisciplinar, e que no entanto tem uma paixão em comum: trabalhar com pets! Desde quando nossos clientes de patas entram pela porta, adoramos interagir com eles e conhecê-los profundamente – o que nos dá a oportunidade de oferecer soluções certeiras para que todos tenham uma vida mais feliz. Somos, também, apaixonados por um atendimento carinhoso e atencioso de nossos clientes humanos, que passam a fazer parte da família Espaço Patinhas.</p>

				<h2 class="py-5" id="localizacao">Como nos Encontrar?</h2>

				<iframe class="w-75" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15954.329548731921!2d-48.469912!3d-1.426165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x376be1e884433204!2sEspa%C3%A7o%20Patinhas!5e0!3m2!1spt-BR!2sbr!4v1647863443589!5m2!1spt-BR!2sbr" width="768" height="480" style="border:1;" allowfullscreen="" loading="lazy"></iframe>

				<h2 class="py-5" id="redesociais">Redes Sociais</h2>

				<div class="container">
			<div class="row justify-content-center">
			<div class="card col-12 col-md-6 col-lg-3 p-3">
				<a href="https://www.facebook.com/EspacoPatinhas" target="_blank" class="">
                <div class="card-ico align-left pb-4 flexcolumn justify-center">
					<i class="fab fa-facebook-f px-2 white footer display-3 rosa"></i>
				</div>
				<div class="card-box flexcolumn justify-center">
					<p class="display-6">
						/EspacoPatinhas</p>
				</div>
                </a>
			</div>

			<div class="card col-12 col-md-6 col-lg-3 p-3">
				<a href="https://www.instagram.com/espacopatinhas/" target="_blank" class=""><div class="card-ico align-left pb-4 flexcolumn justify-center">
					<i class="fab fa-instagram px-2 white footer display-3 rosa"></i>
				</div>
				<div class="card-box flexcolumn justify-center">
					<p class="display-6">
						@espacopatinhas</p>
				</div></a>
			</div>

			<div class="card col-12 col-md-6 col-lg-3 p-3">
				<a onclick="goog_report_conversion ('https://wa.me/5591984280382')" href="https://wa.me/5591984280382" target="_blank" class=""><div class="card-ico align-left pb-4 flexcolumn justify-center">
					<i class="fab fa-whatsapp px-2 white footer display-3 rosa"></i>
				</div>
				<div class="card-box flexcolumn justify-center">
					<p class="display-6">
						(91) 98428-0382</p>
				</div></a>
			</div>

			
			</div>
		</div>

				<h2 class="py-5" id="galeria">GALERIA</h2>				

				<div class="table-responsive row w-75 flexcolumn">
				<table align="center" class="table">	
					
					<tr>
						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image: url('https://static1.patasdacasa.com.br/articles/8/10/38/@/4864-o-cachorro-inteligente-mostra-essa-carac-opengraph_1200-1.jpg');">	
							</div></a>
						</td>

						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image:url('https://www.dicaspetz.com.br/wp-content/uploads/2017/04/comportamento-dos-gatos-1.jpg');">
							</div></a>
						</td>
						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image:url('https://static.nationalgeographicbrasil.com/files/styles/image_3200/public/01-cat-questions-nationalgeographic_1228126.jpg?w=1600&h=900');">	
							</div></a>
						</td>							
					</tr>
					<tr>
						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image: url('https://super.abril.com.br/wp-content/uploads/2018/05/filhotes-de-cachorro-alcanc3a7am-o-c3a1pice-de-fofura-com-8-semanas1.png');">	
							</div></a>
						</td>

						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image:url('https://www.petz.com.br/blog/wp-content/uploads/2021/03/piercing-para-cachorro-2.jpg');">
							</div></a>
						</td>
						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image:url('https://ogimg.infoglobo.com.br/in/24649523-8a0-224/FT1086A/88249115.jpg');">						
							</div></a>
						</td>							
					</tr>
					<tr>
						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image: url('https://www.araraquara.sp.gov.br/noticias/2020/maio-1/19/santuario-dos-gatos-recebe-doacao-de-150-doses-da-vacina-v4/gatos.jpg/@@images/ad7dfaac-5fd3-4ce9-8492-fe6e1aa2a1fe.jpeg');">	
							</div></a>
						</td>

						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image:url('https://www.rbsdirect.com.br/imagesrc/25393328.jpg?w=700');">
							</div></a>
						</td>
						<td class="p-4">
							<a href="javascript:;"><div class="galeria" style="background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSw8DaGzh0zrautsXH1Q3xwDb89PPB6rLAM0ZwaxnOo5zzVf6xEm6kxy18HSLpoXXFkt-g&usqp=CAU');">						
							</div></a>
						</td>							
					</tr>
					
				</table></div>
				<br>
			</main>

<?php
include("footer.php");
?>