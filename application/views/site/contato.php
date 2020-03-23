<main>
	<div class="container">
		<hr>
		<div class="row">
			<section class="col-lg-9 col-md-12">
				<?php if (isset($title) && !empty($title)): ?>
					<h1 class="text-encom mb-3"><?php echo $title; ?></h1>
				<?php endif; ?>
				<?php if (isset($image) && !empty($image)): ?>
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"
						 class="rounded mx-auto d-block img-responsive img-thumbnail">
				<?php endif; ?>
				<?php if (isset($content) && !empty($content)): ?>
					<div class="mt-3 content">
						<?php echo $content; ?>
					</div>
				<?php endif; ?>
				<div class="mt-3 content">

					<form role="form" method="post" action="<?php echo site_url('site/submit'); ?>">
						<div class="form-group">
							<label for="name">NOME</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Digite o seu Nome" required>
						</div>

						<div class="form-group">
							<label for="phone">TELEFONE</label>
							<input type="text" class="form-control" name="phone" id="phone" placeholder="(dd) Telefone">
						</div>

						<div class="form-group">
							<label for="email">E-MAIL</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Digite o seu E-mail">
						</div>

						<div class="form-group">
							<label for="message">MENSAGEM:</label>
							<textarea class="form-control" name="message" id="message" rows="5" placeholder="Digite a mensagem." required></textarea>
						</div>

						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
					</form>
				</div>
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
		<hr>
	</div>


</main>
