<div class="container-fluid">
	<div class="row pt-5 pb-5">
		<div class="col">
			<?php if(isset($errors) && $errors):?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Dados incorretos.</strong> Por favor, os errors e tente novamente.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<ul>
						<?php foreach ($errors as $error):?>
							<li><?php echo $error;?></li>
						<?php endforeach;?>
					</ul>
				</div>
			<?php endif;?>
			<form method="post" action="<?php echo site_url($action);?>">
				<input title="Imagem" type="hidden" name="image" id="image" value="<?php echo $image;?>" required="required">
				<input title="Selecione a área do recorte" type="hidden" name="x1" id="x1">
				<input type="hidden" name="y1" id="y1">
				<input type="hidden" name="x2" id="x2">
				<input type="hidden" name="y2" id="y2">
				<input type="hidden" name="width" id="w" value="<?php echo $width; ?>">
				<input type="hidden" name="height" id="h" value="<?php echo $height; ?>">
				<?php
				//manter proporcao
				$currentWidth = ceil($currentWidth/$ratio);
				$currentHeight = ceil($currentHeight/$ratio);
				$width = ceil($width/$ratio);
				$height = ceil($height/$ratio);
				?>
				<table class="table">
					<thead>
						<tr>
							<th>Original</th>
							<th>Preview</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td valign="top">
								<img src="<?php echo $imageUrl; ?>" id="img-principal" alt="Selecione o espaço da imagem" width="<?php echo $currentWidth;?>" height="<?php echo $currentHeight; ?>" class="imgareaselect" data-thumb="img-thumbnail" />
							</td>
							<td valign="top">
								<div style="position:relative; overflow:hidden; margin: 0; width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;">
									<img id="img-thumbnail" src="<?php echo $imageUrl; ?>" style="position: relative; width: <?php echo $width; ?>px; height: <?php echo $height; ?>px; margin-left: 0px; margin-top: 0px;" alt="Previsualização da imagem" />
								</div>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2">
								<div class="btn-group btn-block " role="group" aria-label="Basic example">
									<button type="submit" class="btn btn-primary">Salvar</button>
									<button type="button" class="btn btn-outline-info" onclick="history.back()">Voltar</button>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
			<script type="text/javascript">
			var w = <?php echo $width; ?>,
				h = <?php echo $height; ?>,
				_width = <?php echo $currentWidth; ?>,
				_height = <?php echo $currentHeight; ?>,
				_ratio = <?php echo $ratio;?>;
			</script>
		</div>
	</div>
</div>
