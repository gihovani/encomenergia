<main>
	<div class="container">
		<hr>
		<div class="row">
			<section class="col-lg-9 col-md-12" >
				<?php if(isset($title) && !empty($title)):?>
				<h1 class="text-encom"><?php echo $title;?></h1>
				<?php endif;?>
				<?php if(isset($image) && !empty($image)):?>
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"
						 class="img-responsive img-thumbnail mb-3">
				<?php endif;?>
				<?php if(isset($content) && !empty($content)):?>
					<?php echo $content;?>
				<?php endif;?>
			</section>
			<section class="col-lg-3 d-none d-lg-block">
				<?php if(isset($posts) && count($posts)):?>
					<h3 class="text-encom">Últimas Notícias</h3>
					<?php foreach ($posts as $post):?>
						<div class="post mb-3">
							<a class="news-content text-decoration-none" href="<?php echo site_url($post->slug);?>">
								<span class="news-categories"><?php echo $post->title;?></span>
								<img class="news-image" src="<?php echo $post->getImageUrl();?>" alt="<?php echo $post->title;?>" title="<?php echo $post->title;?>">
								<span class="news-title"><?php echo $post->description;?></span>
							</a>
						</div>
					<?php endforeach;?>
					<hr>
				<?php endif;?>
				<?php if(isset($services) && count($services)):?>
					<?php foreach ($services as $service):?>
						<div class="service">
							<a href="<?php echo site_url($service->slug);?>">
								<img class="news-image" src="<?php echo base_url('assets/img/services/'.$service->slug.'.png');?>" alt="<?php echo $service->title;?>" />
							</a>
						</div>
					<?php endforeach;?>
				<?php endif;?>
			</section>
		</div>
		<hr>
	</div>


</main>
