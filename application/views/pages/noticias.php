<main>
	<div class="container">
		<hr>
		<div class="row">
			<section class="col-12 section">
				<?php if(isset($title) && !empty($title)):?>
					<h2 class="section-title section-title-services mt-n4"><?php echo $title;?></h2>
				<?php endif;?>
				<?php if(isset($description) && !empty($description)):?>
					<h3><?php echo $description;?></h3>
				<?php endif;?>
				<?php if(isset($image) && !empty($image)):?>
					<img src="<?php echo $image;?>" alt="<?php echo $title;?>" class="img-responsive my-3">
				<?php endif;?>
				<?php if(isset($content) && !empty($content)):?>
					<?php echo $content;?>
				<?php endif;?>
				</section>
			</section>
		</div>
		<?php foreach ($posts as $post):?>
		<div class="row">
			<div class="col-12">
				<h1><?php echo $post->title;?></h1>
				<?php if($post->image):?>
				<img src="<?php echo $post->getImageUrl();?>" alt="<?php echo $post->title;?>" class="float-left img-responsive m-1 img-thumbnail" style="max-width: 200px">
				<?php endif;?>
				<article>
					<?php echo ellipsize(strip_tags($post->content), 500);?>
					<a href="<?php echo site_url($post->slug);?>" class="text-danger">ler notícia.</a>
				</article>

			</div>
		</div><hr />
		<?php endforeach;?>
		<?php if($pagination):?>
		<div class="row">
			<div class="col-12">
				<?php echo $pagination->create_links();?>
			</div>
		</div>
		<?php endif;?>
	</div>
</main>
