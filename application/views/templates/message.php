<?php if (isset($message)):?>
<div class="container">
	<div class="alert alert-info alert-dismissible fade show" role="alert">
		<?php echo $message;?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>
<?php endif;?>
