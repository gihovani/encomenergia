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
						<?php echo $content; ?>
					</div>
				<?php endif; ?>
			</section>
		</div>
		<?php if (isset($categories) && count($categories) > 0): ?>
			<div class="row">
				<div id="filters" class="container-fluid mb-5 mt-4">
					<button class="btn btn-outline-danger" aria-pressed="true" data-filter="*">Todos</button>
					<?php foreach ($categories as $category): ?>
						<button class="btn btn-outline-danger"
								data-filter=".<?php echo url_title(convert_accented_characters($category)); ?>"><?php echo $category; ?></button>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($items) && count($items)): ?>
			<div class="grid">
				<div class="row">
					<?php foreach ($items as $item): ?>
						<div class="element-item col-md-3 <?php echo url_title(convert_accented_characters($item->category)); ?>"
							 date-category="<?php echo url_title(convert_accented_characters($item->category)); ?>">
							<a href="<?php echo $item->link; ?>">
								<figure class="figure img-thumbnail">
									<?php if ($item->image): ?>
										<img src="<?php echo $item->getImageUrl(); ?>" alt="<?php echo $item->title; ?>"
											 class="figure-img img-fluid rounded w-100 h-100">
									<?php endif; ?>
									<figcaption class="figure-caption text-center"><?php echo $item->title; ?></figcaption>
								</figure>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php else: ?>
			<div class="alert alert-warning">
				<h5>Atenção! Nenhum item Encontrado.</h5>
				<p class="text-encom mb-0">Tente pesquisar por uma palavra de maior amplitude.</p>
			</div>
		<?php endif; ?>
	</div>
</main>
