<!-- Banner -->
<?php if (isset($banners) && count($banners)): ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="slick-default slick-banner">
						<?php foreach ($banners as $banner): ?>
							<div>
								<a href="<?php echo $banner->link; ?>">
									<img src="<?php echo $banner->getImageUrl(); ?>" alt="<?php echo $banner->title; ?>"
										 title="<?php echo $banner->title; ?>"/>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- Services -->
<?php if (isset($services) && count($services)): ?>
	<section class="section pb-0">
		<div class="container">
			<h2 class="section-title section-title-services ml-1">Serviços</h2>
			<div class="row justify-content-center">
				<?php foreach ($services as $service): ?>
					<div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-lg-3">
						<div class="p-2">
							<div class="service-content">
								<a href="<?php echo site_url('servicos') . '#' . $service->slug; ?>">
									<img class="service-image" src="<?php echo $service->getImageUrl(); ?>"
										 alt="<?php echo $service->title; ?>" title="<?php echo $service->title; ?>"/>
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- News -->
<?php if (isset($posts) && count($posts)): ?>
	<section class="section pb-0">
		<div class="container">
			<h2 class="section-title section-title-news ml-1">Encom<span>News</span></h2>
			<div class="row">
				<?php foreach ($posts as $post): ?>
					<div class="col-12 col-sm-6 col-lg-3">
						<div class="p-2">
							<a class="news-content text-decoration-none" href="<?php echo site_url($post->slug); ?>">
								<span class="news-categories"><?php echo $post->title; ?></span>
								<img class="news-image" src="<?php echo $post->getImageUrl(); ?>"
									 alt="<?php echo $post->title; ?>" title="<?php echo $post->title; ?>">
								<span class="news-title"><?php echo $post->description; ?></span>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="news-more">
				<a class="news-more-link" href="<?php echo site_url('noticias'); ?>">+ Encom<span>News</span></a>
			</div>
		</div>
	</section>
<?php endif; ?>
