<main>
	<div class="container">
		<hr>
		<div class="row">
			<section class="col-8 section">
				<?php if(isset($title) && !empty($title)):?>
					<h2 class="section-title section-title-services mt-n4"><?php echo $title;?></h2>
				<?php endif;?>
				<?php if(isset($created_at) && !empty($created_at) || isset($author) && !empty($author)):?>
				<p>
					<?php if(isset($author) && !empty($author)):?>
					Por: <?php echo $author;?>
					<?php endif;?>
					<?php if(isset($created_at) && !empty($created_at)):?>
					em <?php echo date('d/m/Y', strtotime($created_at));?>
					<?php endif;?>
				</p>
				<?php endif;?>
				<?php if(isset($description) && !empty($description)):?>
					<h3><?php echo $description;?></h3>
				<?php endif;?>
				<?php if(isset($image) && !empty($image)):?>
					<img src="<?php echo $image;?>" alt="<?php echo $title;?>" class="img-responsive img-thumbnail">
				<?php endif;?>
				<?php if(isset($content) && !empty($content)):?>
					<?php echo $content;?>
				<?php endif;?>
			</section>
			<section class="col-4">
				<ul>
					<li><a href="">teste</a></li>
				</ul>
			</section>
		</div>
		<hr>
	</div>


</main>
