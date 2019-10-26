</main>
<footer class="footer">
	<div class="container">
		<div class="row m-0">
			<div class="col-lg-6 d-none d-lg-block">
				<a href="tel:+556132340202" class="no-effect">
					<img class="footer-image" src="<?php echo base_url('assets/img/footer-image.png');?>" alt="Encom Energia" title="Encom Energia" />
				</a>
			</div>
			<div class="col-lg-6 col-12">
				<div class="footer-links-container">
					<div class="footer-links-content">
						<span class="footer-links-title">EMPRESA</span>
						<ul class="footer-links">
							<li><a href="<?php echo base_url();?>">HOME</a></li>
							<li><a href="<?php echo site_url('quem-somos');?>">QUEM SOMOS</a></li>
							<li><a href="<?php echo site_url('onde-atuamos');?>">ONDE ATUAMOS</a></li>
							<li><a href="<?php echo site_url('services');?>">SERVIÇOS DE ENGENHARIA</a></li>
							<li><a href="<?php echo site_url('posts');?>">NOTÍCIAS</a></li>
							<li><a href="<?php echo site_url('portfolio');?>">PORTFÓLIO</a></li>
							<li><a href="<?php echo site_url('compliance');?>">COMPLIANCE</a></li>
							<li><a href="<?php echo site_url('contato');?>">CONTATO</a></li>
						</ul>
					</div>
					<?php if(isset($services) && count($services)):?>
						<div class="footer-links-content">
							<span class="footer-links-title">SERVIÇOS</span>
							<ul class="footer-links">
								<?php foreach ($services as $service):?>
									<li><a href="<?php echo site_url($service->slug);?>"><?php echo mb_strtoupper($service->title);?></a></li>
								<?php endforeach;?>
							</ul>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</footer>
