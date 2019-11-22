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
		<?php if (isset($services) && count($services)): ?>
			<div class="row">
				<section class="col-12 mb-5">
					<div class="accordion" id="accordionServices">
						<?php $colors = ''; ?>
						<?php foreach ($services as $service): ?>
						<?php if(empty($colors)) $colors = explode(',', SERVICES_COLORS);?>
						<?php $color = array_shift($colors);?>
						<div class="card">
							<div class="card-header collapsed" id="h-<?php echo $service->slug;?>" data-toggle="collapse" data-target="#<?php echo $service->slug;?>" aria-expanded="true" aria-controls="<?php echo $service->slug;?>" style="background-color: <?php echo $color;?>">
								<h2 class="mb-0">
									<button class="btn btn-link" type="button">
										<?php echo $service->title;?>
									</button>
								</h2>
							</div>

							<div id="<?php echo $service->slug;?>" class="collapse" aria-labelledby="h-<?php echo $service->slug;?>" data-parent="#accordionServices">
								<div class="card-body content">
									<?php echo $service->content;?>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</section>
			</div>
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
