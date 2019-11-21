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
				<div class="col-lg-12">
					<div class="portfolioFilter clearfix">
						<a href="#" data-filter="*" class="current">Todos</a>
					<?php foreach ($categories as $category): ?>
						<a href="#" data-filter=".<?php echo url_title(convert_accented_characters($category)); ?>"><?php echo $category; ?></a>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($items) && count($items)): ?>
			<div class="portfolioContainer">
				<?php foreach ($items as $item): ?>
					<div class="objects <?php echo url_title(convert_accented_characters($item->category)); ?>"
						 date-category="<?php echo url_title(convert_accented_characters($item->category)); ?>">
						<a href="<?php echo $item->getImageUrl(); ?>" data-fancybox="<?php echo url_title(convert_accented_characters($item->category)); ?>" data-caption="<?php echo $item->title; ?>">
							<img src="<?php echo $item->getImageUrl(); ?>" alt="<?php echo $item->title; ?>">
						</a>
					</div>
				<?php endforeach; ?>
			</div>
			<hr class="clearfix">
		<?php endif; ?>
	</div>
</main>
