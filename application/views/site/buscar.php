<main>
	<div class="container">
		<hr>
		<div class="row">
			<section class="col-12">
				<?php if(isset($title) && !empty($title)):?>
					<h2><?php echo $title;?></h2>
				<?php endif;?>
				<?php if(isset($image) && !empty($image)):?>
					<img src="<?php echo $image;?>" alt="<?php echo $title;?>" class="img-responsive my-3">
				<?php endif;?>
				<?php if(isset($content) && !empty($content)):?>
					<?php echo $content;?>
				<?php endif;?>
			</section>
		</div>
		<?php if(isset($posts) && count($posts)):?>
			<?php foreach ($posts as $post):?>
				<div class="row">
					<div class="col-12">
						<h3><?php echo $post->title;?></h3>
						<?php if($post->image):?>
							<a href="<?php echo site_url($post->slug);?>"><img src="<?php echo $post->getImageUrl();?>" alt="<?php echo $post->title;?>" class="float-left img-responsive m-1 img-thumbnail" style="max-width: 200px"></a>
						<?php endif;?>
						<article><a href="<?php echo site_url($post->slug);?>"><?php echo ellipsize(strip_tags(html_entity_decode($post->content)), 500);?></a></article>
					</div>
				</div><hr />
			<?php endforeach;?>
			<?php if(isset($pagination) && !empty($pagination)):?>
				<div class="row">
					<div class="col-12">
						<?php echo $pagination->create_links();?>
					</div>
				</div>
			<?php endif;?>
		<?php else:?>
			<p class="text-center">nenhum resultado encontrado.</p>
		<?php endif;?>
	</div>
</main>
