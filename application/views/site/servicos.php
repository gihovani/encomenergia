<main>
	<div class="container">
		<hr>
		<div class="row">
			<section class="col-12">
				<?php if (isset($title) && !empty($title)): ?>
					<h1><?php echo $title; ?></h1>
				<?php endif; ?>
				<?php if (isset($image) && !empty($image)): ?>
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-responsive my-3">
				<?php endif; ?>
				<?php if (isset($content) && !empty($content)): ?>
					<?php echo $content; ?>
				<?php endif; ?>
			</section>
		</div>
		<?php if (isset($posts) && count($posts)): ?>
			<div class="row">
				<?php foreach ($posts as $post): ?>
					<div class="col-4 mt-2">
						<a href="<?php echo site_url($post->slug); ?>">
							<figure class="figure">
								<?php if ($post->image): ?>
									<img src="<?php echo $post->getImageUrl(); ?>" alt="<?php echo $post->title; ?>"
										 class="figure-img img-fluid rounded">
								<?php endif; ?>
								<figcaption class="figure-caption sr-only"><?php echo $post->title; ?></figcaption>
							</figure>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if (isset($pagination) && !empty($pagination)): ?>
				<div class="row">
					<div class="col-12">
						<?php echo $pagination->create_links(); ?>
					</div>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p class="text-center">nenhum resultado encontrado.</p>
		<?php endif; ?>
	</div>
</main>
