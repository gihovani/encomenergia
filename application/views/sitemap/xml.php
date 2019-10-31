<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
	<url>
		<loc><?php echo base_url();?></loc>
	</url>
	<?php if (isset($items) && count($items)):?>
	<?php foreach ($items as $item):?>
	<url>
		<loc><?php echo site_url($item->slug);?></loc>
			<?php if($item->type === 'post'): ?>
			<news:news>
				<news:publication>
					<news:name><?php echo $item->title;?></news:name>
					<news:language>pt-br</news:language>
				</news:publication>
				<news:publication_date><?php echo date('Y-m-d', strtotime($item->created_at));?></news:publication_date>
				<news:title><?php echo $item->title;?></news:title>
			</news:news>
			<?php endif;?>
	</url>
	<?php endforeach;?>
	<?php endif;?>
</urlset>
