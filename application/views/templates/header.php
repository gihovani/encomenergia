<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<base href="<?php echo base_url();?>" />

    <?php if (isset($title)):?>
    <meta name="title" content="<?php echo $title; ?>">
    <?php endif;?>
    <?php if (isset($description)):?>
        <meta name="description" content="<?php echo $description; ?>">
    <?php endif;?>
    <?php if (isset($keywords)):?>
        <meta name="keywords" content="<?php echo $keywords; ?>">
    <?php endif;?>
    <?php if (isset($author)):?>
        <meta name="author" content="<?php echo $author;?>">
    <?php endif;?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="robots" content="index, follow">
    <meta name="Rating" content="General">
    <meta name="language" content="Portuguese">
    <meta name="Revisit-after" content="31 Days">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/icons/apple-icon-57x57.png');?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/icons/apple-icon-60x60.png');?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/icons/apple-icon-72x72.png');?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/icons/apple-icon-76x76.png');?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/icons/apple-icon-114x114.png');?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/icons/apple-icon-120x120.png');?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/icons/apple-icon-144x144.png');?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/icons/apple-icon-152x152.png');?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/icons/apple-icon-180x180.png');?>">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assets/icons/android-icon-192x192.png');?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/icons/favicon-32x32.png');?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/icons/favicon-96x96.png');?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/icons/favicon-16x16.png');?>">
	<link rel="manifest" href="<?php echo base_url('assets/icons/manifest.json');?>">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url('assets/icons/ms-icon-144x144.png');?>">
	<meta name="theme-color" content="#ffffff">
	<!-- /icons -->
    <!-- Bootstrap CSS -->
    <title><?php echo isset($title) ? $title : PROJECT_NAME; ?></title>
	<?php if(isset($css) && is_array($css)):?>
		<?php foreach ($css as $tmp):?>
			<link rel="stylesheet" type="text/css" href="<?php echo $tmp;?>" />
		<?php endforeach;?>
	<?php endif;?>
<body>
