</main>
<footer class="footer">
	<div class="container">
		<div class="row m-0">
			<div class="col-lg-6 d-none d-lg-block">
				<?php if (isset($config->phone) && !empty($config->phone)): ?>
				<a href="tel:+55<?php echo preg_replace('/\D/', '', $config->phone); ?>" class="no-effect">
					<?php endif ?>
					<img class="footer-image" src="<?php echo base_url('assets/img/footer-image.png'); ?>"
						 alt="Encom Energia" title="Encom Energia"/>
					<?php if (isset($config->phone) && !empty($config->phone)): ?>
				</a>
			<?php endif ?>
			</div>
			<div class="col-lg-6 col-12">
				<div class="footer-links-container">
					<div class="footer-links-content">
						<span class="footer-links-title">EMPRESA</span>
						<ul class="footer-links">
							<li><a href="<?php echo base_url(); ?>">HOME</a></li>
							<li><a href="<?php echo site_url('quem-somos'); ?>">QUEM SOMOS</a></li>
							<li><a href="<?php echo site_url('onde-atuamos'); ?>">ONDE ATUAMOS</a></li>
							<li><a href="<?php echo site_url('servicos'); ?>">SERVIÇOS DE ENGENHARIA</a></li>
							<li><a href="<?php echo site_url('noticias'); ?>">NOTÍCIAS</a></li>
							<li><a href="<?php echo site_url('portfolio'); ?>">PORTFÓLIO</a></li>
							<li><a href="<?php echo site_url('compliance'); ?>">COMPLIANCE</a></li>
							<li><a href="<?php echo site_url('contato'); ?>">CONTATO</a></li>
						</ul>
					</div>
					<?php if (isset($services) && count($services)): ?>
						<div class="footer-links-content">
							<span class="footer-links-title">SERVIÇOS</span>
							<ul class="footer-links">
								<?php foreach ($services as $service): ?>
									<li>
										<a href="<?php echo site_url('servicos') . '#' . $service->slug; ?>"><?php echo mb_strtoupper($service->title); ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if (isset($config->whatsapp) && !empty($config->whatsapp)): ?>
			<div class="row">
				<div class="col-12">
					<div class="text-right">
						<a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/\D/', '', $config->whatsapp); ?>">
							<img src="<?php echo base_url('assets/img/whatsapp-logo.svg'); ?>" alt="Whatsapp" width="50"
								 class="mt-3 mb-3 mr-3">
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</footer>
