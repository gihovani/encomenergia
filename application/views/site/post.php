<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
		src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0&appId=956629498038980&autoLogAppEvents=1"></script>
<main>
	<div class="container">
		<hr>
		<div class="row">
			<section class="col-lg-9 col-md-12" itemscope itemtype="http://schema.org/NewsArticle">
				<?php if (isset($title) && !empty($title)): ?>
					<h3><?php echo $title; ?></h3>
				<?php endif; ?>
				<?php if (isset($description) && !empty($description)): ?>
					<h2 class="text-encom mt-3"><?php echo $description; ?></h2>
				<?php endif; ?>
				<div class="d-none d-lg-block text-right mt-3">
					<a href="whatsapp://send?text=<?php echo site_url($slug); ?>"
					   data-action="share/whatsapp/share"><img src="<?php echo base_url('assets/img/whatsapp.png'); ?>"
															   alt="whatsapp"/></a>
					<a href="https://facebook.com/sharer.php?u=<?php echo site_url($slug); ?>"><img
							src="<?php echo base_url('assets/img/facebook.png'); ?>" alt="facebook"/></a>
					<a href="mailto:?subject=<?php echo urlencode($title); ?>&body=<?php echo urlencode(site_url($slug)); ?>"><img
							src="<?php echo base_url('assets/img/email.png'); ?>" alt="e-mail"/></a>
					<a href="javascript:void(0)" onclick="window.print()"><img
							src="<?php echo base_url('assets/img/imprimir.png'); ?>" alt="imprimir"/></a>
				</div>
				<?php if (isset($created_at) && !empty($created_at) || isset($author) && !empty($author)): ?>
					<p>
						<?php if (isset($author) && !empty($author)): ?>
							FONTE: <?php echo $author; ?>
							<span itemprop="author" itemscope itemtype="https://schema.org/Person"> <meta
									itemprop="name" content="<?php echo $author; ?>"> </span>
						<?php endif; ?>
						<?php if (isset($created_at) && !empty($created_at)): ?>
							<time itemprop="datePublished" datetime="<?php echo $created_at; ?>">
								em <?php echo date('d/m/Y', strtotime($created_at)); ?> </time>
						<?php endif; ?>
					</p>
				<?php endif; ?>
				<?php if (isset($image) && !empty($image)): ?>
					<span itemprop="image" itemscope itemtype="http://schema.org/ImageObject"> <meta itemprop="url"
																									 content="<?php echo $image; ?>"></span>
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"
						 class="rounded mx-auto d-block img-responsive img-thumbnail">
				<?php endif; ?>
				<?php if (isset($content) && !empty($content)): ?>
					<article class="mt-3 content" itemprop="articleBody">
						<?php echo $content; ?>
					</article>
				<?php endif; ?>
			</section>
			<section class="col-lg-3 d-none d-lg-block">
				<?php if (isset($posts) && count($posts)): ?>
					<h3 class="text-encom">Últimas Notícias</h3>
					<?php foreach ($posts as $post): ?>
						<div class="post mb-3">
							<a class="news-content text-decoration-none" href="<?php echo site_url($post->slug); ?>">
								<span class="news-categories"><?php echo $post->title; ?></span>
								<img class="news-image" src="<?php echo $post->getImageUrl(); ?>"
									 alt="<?php echo $post->title; ?>" title="<?php echo $post->title; ?>">
								<span class="news-title"><?php echo $post->description; ?></span>
							</a>
						</div>
					<?php endforeach; ?>
					<hr>
				<?php endif; ?>
				<?php if (isset($services) && count($services)): ?>
					<?php foreach ($services as $service): ?>
						<div class="service">
							<a href="<?php echo site_url('servicos') . '#' . $service->slug; ?>">
								<img class="news-image"
									 src="<?php echo base_url('assets/img/services/' . $service->slug . '.png'); ?>"
									 alt="<?php echo $service->title; ?>"/>
							</a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</section>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="fb-comments" data-href="<?php echo site_url($slug); ?>" data-width="100%"
					 data-numposts="20"></div>
			</div>
		</div>
		<hr>
	</div>
</main>
