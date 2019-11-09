<main>
	<div class="container">
		<hr>
		<div class="row">
			<section class="col-12">
				<?php if (isset($title) && !empty($title)): ?>
					<h1 class="text-encom mb-3"><?php echo $title; ?></h1>
				<?php endif; ?>
				<?php if (isset($image) && !empty($image)): ?>
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"
						 class="rounded mx-auto d-block img-responsive img-thumbnail">
				<?php endif; ?>
				<?php if (isset($content) && !empty($content)): ?>
					<div class="mt-3">
						<?php echo $content;?>
					</div>
				<?php endif; ?>
			</section>
		</div>
		<?php if (isset($posts) && count($posts)): ?>
			<?php foreach ($posts as $post): ?>
				<div class="row">
					<div class="col-12">
						<h3><?php echo $post->title; ?></h3>
						<?php if ($post->image): ?>
							<a href="<?php echo site_url($post->slug); ?>"><img
									src="<?php echo $post->getImageUrl(); ?>" alt="<?php echo $post->title; ?>"
									class="float-left img-responsive m-1 img-thumbnail" style="max-width: 200px"></a>
						<?php endif; ?>
						<article><a
								href="<?php echo site_url($post->slug); ?>"><?php echo ellipsize(strip_tags(html_entity_decode($post->content)), 500); ?></a>
						</article>
					</div>
				</div>
				<hr/>
			<?php endforeach; ?>
			<?php if (isset($pagination) && !empty($pagination)): ?>
				<div class="row">
					<div class="col-12">
						<?php echo $pagination->create_links(); ?>
					</div>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<div class="alert alert-warning">
				<h5>Atenção! Nenhum item Encontrado.</h5>
				<p class="text-encom mb-0">Tente pesquisar por uma palavra de maior amplitude.</p>
			</div>
		<?php endif; ?>
	</div>
</main>
