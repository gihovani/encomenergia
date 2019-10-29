<?php if(isset($js) && is_array($js)):?>
	<?php foreach ($js as $tmp):?>
		<script type="text/javascript" src="<?php echo $tmp;?>"></script>
	<?php endforeach;?>
<?php endif;?>
</body>
</html>
