<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <!-- Bootstrap CSS -->
    <title><?php echo isset($title) ? $title : PROJECT_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-4.3.1/css/bootstrap.min.css');?>" />
    <?php if (isset($styles) && isset($slug) && !empty($styles)):?>
        <link rel="stylesheet" href="<?php echo site_url('files/' . $slug . '.css');?>">
    <?php endif;?>
<body>
<?php if (isset($message)):?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?php echo $message;?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif;?>
