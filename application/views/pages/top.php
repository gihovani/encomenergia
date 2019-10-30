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
						<?php if(isset($config->facebook) && !empty($config->facebook)):?>
						<li><a href="<?php echo $config->facebook;?>"><i class="topbar-social-icon topbar-social-icon-facebook"></i></a></li>
						<?php endif;?>
						<?php if(isset($config->instagram) && !empty($config->instagram)):?>
						<li><a href="<?php echo $config->instagram;?>"><i class="topbar-social-icon topbar-social-icon-instagram"></i></a></li>
						<?php endif;?>
						<?php if(isset($config->youtube) && !empty($config->youtube)):?>
						<li><a href="<?php echo $config->youtube;?>"><i class="topbar-social-icon topbar-social-icon-youtube"></i></a></li>
						<?php endif;?>
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
						<h3>
							<?php if(isset($config->phone) && !empty($config->phone)):?>
							<a href="tel:+55<?php echo preg_replace('/\D/', '', $config->phone);?>">
								<?php echo $config->phone;?>
							</a>
							<?php endif;?>
						</h3>
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
					<li class="nav-item">
						<a class="nav-link<?php echo ($slug === 'home') ? ' active' : '' ;?>" href="<?php echo base_url();?>">HOME</a>
					</li>
					<li class="nav-item">
						<a class="nav-link<?php echo ($slug === 'quem-somos') ? ' active' : '' ;?>" href="<?php echo site_url('quem-somos');?>">QUEM SOMOS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link<?php echo ($slug === 'onde-atuamos') ? ' active' : '' ;?>" href="<?php echo site_url('onde-atuamos');?>">ONDE ATUAMOS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link<?php echo ($slug === 'servicos') ? ' active' : '' ;?>" href="<?php echo site_url('servicos');?>">SERVIÇOS DE ENGENHARIA</a>
					</li>
					<li class="nav-item">
						<a class="nav-link<?php echo ($slug === 'noticias') ? ' active' : '' ;?>" href="<?php echo site_url('noticias');?>">NOTÍCIAS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link<?php echo ($slug === 'portfolio') ? ' active' : '' ;?>" href="<?php echo site_url('portfolio');?>">PORTFÓLIO</a>
					</li>
					<li class="nav-item">
						<a class="nav-link<?php echo ($slug === 'compliance') ? ' active' : '' ;?>" href="<?php echo site_url('compliance');?>">COMPLIANCE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link<?php echo ($slug === 'contato') ? ' active' : '' ;?>" href="<?php echo site_url('contato');?>">CONTATO</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<main class="page">
