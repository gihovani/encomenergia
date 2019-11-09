<div class="container">
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
			<?php $action = 'banners/update/'.$item->id;?>
            <form method="post" action="<?php echo site_url($action);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <?php if ($item->getImageUrl()):?>
						<div class="card text-center" style="width: 18em">
							<img class="card-img" src="<?php echo $item->getImageUrl();?>" alt="Imagem de Capa">
							<div class="card-footer">
								<?php $imagecut = sprintf('images/cut/?fileName=%s&height=%s&width=%s&returnTo=%s', $item->getImageUrl(false), $item->getImageHeight(), $item->getImageWidth(), $action);?>
								<a href="<?php echo site_url($imagecut);?>" class="btn btn-primary">Recortar</a>
							</div>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" name="image_remove" id="image_remove">
							<label class="form-check-label" for="image_remove">
								Apagar Imagem (clique no botão salvar)
							</label>
						</div>
                    <?php else:?>
						<label for="image">
							Imagem
						</label>
                    <?php endif;?>
                    <input type="file" class="form-control" name="image" id="image" aria-describedby="imageHelp">
                    <?php if(isset($errors['image'])):?>
                        <small id="imageHelp" class="form-text text-warning">
                            <?php echo $errors['image'];?>
                        </small>
                    <?php else:?>
                        <small id="imageHelp" class="form-text text-muted">
                            Selecione uma imagem do Banner.
                        </small>
                    <?php endif;?>

                </div>

				<div class="form-group">
					<label for="category">Categoria*</label>
					<input type="text"
						   class="form-control"
						   id="category"
						   name="category"
						   aria-describedby="categoryHelp"
						   placeholder="Categoria"
						   maxlength="50"
						   value="<?php echo set_value('category', $item->category);?>">
					<?php if(isset($errors['category'])):?>
						<small id="categoryHelp" class="form-text text-warning">
							<?php echo $errors['category'];?>
						</small>
					<?php else:?>
						<small id="categoryHelp" class="form-text text-muted">
							Digite o Categoria com no máximo 50 caracteres.
						</small>
					<?php endif;?>
				</div>

				<div class="form-group">
					<label for="title">Título*</label>
					<input type="text"
						   class="form-control"
						   id="title"
						   name="title"
						   aria-describedby="titleHelp"
						   placeholder="Título"
						   maxlength="50"
						   value="<?php echo set_value('title', $item->title);?>">
					<?php if(isset($errors['title'])):?>
						<small id="titleHelp" class="form-text text-warning">
							<?php echo $errors['title'];?>
						</small>
					<?php else:?>
						<small id="titleHelp" class="form-text text-muted">
							Digite o Título com no máximo 50 caracteres.
						</small>
					<?php endif;?>
				</div>

                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text"
                           class="form-control"
                           id="link"
                           name="link"
                           aria-describedby="linkHelp"
                           placeholder="Link"
                           maxlength="200"
                           value="<?php echo set_value('link', $item->link);?>">
                    <?php if(isset($errors['link'])):?>
                        <small id="linkHelp" class="form-text text-warning">
                            <?php echo $errors['link'];?>
                        </small>
                    <?php else:?>
                        <small id="linkHelp" class="form-text text-muted">
                            Digite o link para redirecionamento ao clicar no banner.
                        </small>
                    <?php endif;?>
                </div>

                <button type="submit" class="btn btn-block btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
