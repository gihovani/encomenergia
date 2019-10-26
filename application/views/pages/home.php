<!-- Header -->
<header>
	<div class="header-topbar-container">
		<div class="container">
			<div class="header-topbar">
				<div class="row justify-content-end">
					<form class="topbar-form form-inline mb-0 mr-4">
						<div class="form-group m-0">
							<label for="buscar" class="sr-only">Buscar</label>
							<input type="text" class="form-control  mr-2" id="buscar" placeholder="Buscar">
						</div>
						<button type="submit" class="btn btn-primary ml-2"></button>
					</form>
					<ul class="topbar-social mr-4">
						<li><a href="#"><i class="topbar-social-icon topbar-social-icon-facebook"></i></a></li>
						<li><a href="#"><i class="topbar-social-icon topbar-social-icon-instagram"></i></a></li>
						<li><a href="#"><i class="topbar-social-icon topbar-social-icon-youtube"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="header-top mt-3 mb-2">
		<div class="container">
			<div class="row">
				<div class="col-md-4 d-none d-md-block">
					<div class="header-top-content">
						<img src="<?php echo base_url('assets/img/header-title.png');?>" alt="Encom Energia" title="Encom Energia" />
					</div>
				</div>
				<div class="col-md-4 col-12">
					<a href="<?php echo base_url();?>">
						<img class="header-top-logo" src="<?php echo base_url('assets/img/logo.jpg');?>" alt="Encom Energia" title="Encom Energia"/>
					</a>
				</div>
				<div class="col-md-4 d-none d-md-block">
					<div class="header-top-content">
						<h3><a href="tel:+556132340202"><span>(61)</span> 3234 0202</a></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg static-top">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
					aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle Navigation">
				<span>MENU</span>
			</button>
			<div id="navbarResponsive" class="collapse navbar-collapse">
				<ul class="navbar-nav m-auto">
					<li class="nav-item active">
						<a class="nav-link active" href="#">Quem somos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Onde atuamos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Serviços de engenharia</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Energia fotovoltaica</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Portfólio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Compliance</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contato</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<div class="page">
	<!-- Banner -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="slick-default slick-banner">
						<?php for($i=1;$i<5;$i++):?>
						<div>
							<a href="./">
								<img src="<?php echo base_url('assets/img/banner.png');?>" alt="Encom Energia" title="Encom Energia">
							</a>
						</div>
						<?php endfor;?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services -->
	<section class="section pb-0">
		<div class="container">
			<h2 class="section-title section-title-services ml-1">Serviços</h2>
			<div class="row justify-content-center">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-lg-3">
					<div class="p-2">
						<div class="service-content">
							<a href="#">
								<picture>
									<!-- IMG MOBILE ('source') -->
									<source srcset="<?php echo base_url('assets/img/services/engenharia-civil-mob.png');?>'" media="(max-width: 576px)"/>
									<!-- IMG DESKTOP ('img') -->
									<img class="service-image" src="<?php echo base_url('assets/img/services/engenharia-civil.png');?>" alt="ENGENHARIA CIVIL" title="ENGENHARIA CIVIL"/>
								</picture>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="p-2">
						<div class="service-content">
							<a href="#">
								<picture>
									<!-- IMG MOBILE ('source') -->
									<source srcset="<?php echo base_url('assets/img/services/engenharia-auto-mob.png');?>" media="(max-width: 576px)"/>
									<!-- IMG DESKTOP ('img') -->
									<img class="service-image" src="<?php echo base_url('assets/img/services/engenharia-auto.png');?>" alt="ENGENHARIA DE AUTOMAÇÃO" title="ENGENHARIA DE AUTOMAÇÃO"/>
								</picture>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="p-2">
						<div class="service-content">
							<a href="#">
								<picture>
									<!-- IMG MOBILE ('source') -->
									<source srcset="<?php echo base_url('assets/img/services/engenharia-energia-mob.png');?>" media="(max-width: 576px)"/>
									<!-- IMG DESKTOP ('img') -->
									<img class="service-image" src="<?php echo base_url('assets/img/services/engenharia-energia.png');?>" alt="ENGENHARIA DE ENERGIA" title="ENGENHARIA DE ENERGIA"/>
								</picture>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="p-2">
						<div class="service-content">
							<a href="#">
								<picture>
									<!-- IMG MOBILE ('source') -->
									<source srcset="<?php echo base_url('assets/img/services/engenharia-fotovoltaica-mob.png');?>" media="(max-width: 576px)"/>
									<!-- IMG DESKTOP ('img') -->
									<img class="service-image" src="<?php echo base_url('assets/img/services/engenharia-fotovoltaica.png');?>" alt="ENERGIA FOTOVOLTAICA" title="ENERGIA FOTOVOLTAICA"/>
								</picture>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="p-2">
						<div class="service-content">
							<a href="#">
								<picture>
									<!-- IMG MOBILE ('source') -->
									<source srcset="<?php echo base_url('assets/img/services/engenharia-manutencao-mob.png');?>'" media="(max-width: 576px)"/>
									<!-- IMG DESKTOP ('img') -->
									<img class="service-image" src="<?php echo base_url('assets/img/services/engenharia-manutencao.png');?>" alt="ENGENHARIA DE MANUTENÇÃO" title="ENGENHARIA DE MANUTENÇÃO"/>
								</picture>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="p-2">
						<div class="service-content">
							<a href="#">
								<picture>
									<!-- IMG MOBILE ('source') -->
									<source srcset="<?php echo base_url('assets/img/services/engenharia-telecomunic-mob.png');?>" media="(max-width: 576px)"/>
									<!-- IMG DESKTOP ('img') -->
									<img class="service-image" src="<?php echo base_url('assets/img/services/engenharia-telecomunic.png');?>" alt="ENGENHARIA DE TELECOMUNICAÇÕES" title="ENGENHARIA DE TELECOMUNICAÇÕES"/>
								</picture>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="p-2">
						<div class="service-content">
							<a href="#">
								<picture>
									<!-- IMG MOBILE ('source') -->
									<source srcset="<?php echo base_url('assets/img/services/engenharia-eletrica-mob.png');?>" media="(max-width: 576px)"/>
									<!-- IMG DESKTOP ('img') -->
									<img class="service-image" src="<?php echo base_url('assets/img/services/engenharia-eletrica.png');?>" alt="ENGENHARIA ELÉTRICA" title="ENGENHARIA ELÉTRICA"/>
								</picture>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="p-2">
						<div class="service-content">
							<a href="#">
								<picture>
									<!-- IMG MOBILE ('source') -->
									<source srcset="<?php echo base_url('assets/img/services/engenharia-mecanica-mob.png');?>" media="(max-width: 576px)"/>
									<!-- IMG DESKTOP ('img') -->
									<img class="service-image" src="<?php echo base_url('assets/img/services/engenharia-mecanica.png');?>" alt="ENGENHARIA MECÂNICA" title="ENGENHARIA MECÂNICA"/>
								</picture>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- News -->
	<section class="section pb-0">
		<div class="container">
			<h2 class="section-title section-title-news ml-1">Encom<span>News</span></h2>
			<div class="row">
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="p-2">
						<a class="news-content text-decoration-none" href="#">
							<span class="news-categories">Aneel</span>
							<img class="news-image" src="<?php echo base_url('assets/img/news/news-1.png');?>" alt="Aneel" title="Aneel">
							<span class="news-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet quis velit nec vulputate.</span>
						</a>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="p-2">
						<a class="news-content text-decoration-none" href="#">
							<span class="news-categories">Geradores Turbogeradores</span>
							<img class="news-image" src="<?php echo base_url('assets/img/news/news-1.png');?>" alt="Geradores Turbogeradores" title="Geradores Turbogeradores">
							<span class="news-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet quis velit nec vulputate.</span>
						</a>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="p-2">
						<a class="news-content text-decoration-none" href="#">
							<span class="news-categories">Fovoltaica</span>
							<img class="news-image" src="<?php echo base_url('assets/img/news/news-1.png');?>" alt="Fovoltaica" title="Fovoltaica">
							<span class="news-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet quis velit nec vulputate.</span>
						</a>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="p-2">
						<a class="news-content text-decoration-none" href="#">
							<span class="news-categories">Seu Dinheiro</span>
							<img class="news-image" src="<?php echo base_url('assets/img/news/news-1.png');?>" alt="Seu Dinheiro" title="Seu Dinheiro">
							<span class="news-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet quis velit nec vulputate.</span>
						</a>
					</div>
				</div>
			</div>
			<div class="news-more">
				<a class="news-more-link" href="#">+ Encom<span>News</span></a>
			</div>
		</div>
	</section>
</div>
<!-- Footer -->
<footer class="footer">
	<div class="container">
		<div class="row m-0">
			<div class="col-lg-6 d-none d-lg-block">
				<img class="footer-image" src="<?php echo base_url('assets/img/footer-image.png');?>" alt="Encom Energia" title="Encom Energia" />
			</div>
			<div class="col-lg-6 col-12">
				<div class="footer-links-container">
					<div class="footer-links-content">
						<span class="footer-links-title">EMPRESA</span>
						<ul class="footer-links">
							<li><a href="#">HOME</a></li>
							<li><a href="#">QUEM SOMOS</a></li>
							<li><a href="#">ONDE ATUAMOS</a></li>
							<li><a href="#">SERVIÇOS DE ENGENHARIA</a></li>
							<li><a href="#">ENERGIA FOTOVOLTAICA</a></li>
							<li><a href="#">PORTFÓLIO</a></li>
							<li><a href="#">COMPLIANCE</a></li>
							<li><a href="#">CONTATO</a></li>
						</ul>
					</div>
					<div class="footer-links-content">
						<span class="footer-links-title">SERVIÇOS</span>
						<ul class="footer-links">
							<li><a href="#">ENGENHARIA CIVIL</a></li>
							<li><a href="#">ENGENHARIA DE AUTOMOÇÃO</a></li>
							<li><a href="#">ENGENHARIA DE ENERGIA</a></li>
							<li><a href="#">ENGENHARIA FOTOVOLTAICA</a></li>
							<li><a href="#">ENERGIA DE MANUTENÇÃO</a></li>
							<li><a href="#">ENGENHARIA DE TELECOMUNICAÇÕES</a></li>
							<li><a href="#">ENGENHARIA ELÉTRICA</a></li>
							<li><a href="#">ENGENHARIA MECÂNICA</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
