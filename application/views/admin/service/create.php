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
            <form method="post" action="<?php echo site_url('services/create');?>" enctype="multipart/form-data">
				<input type="hidden" name="type" value="service">

                <div class="form-group">
                    <label for="image">Imagem Capa</label>
                    <input type="file" class="form-control" name="image" id="image" aria-describedby="imageHelp">
                    <?php if(isset($errors['image'])):?>
                        <small id="imageHelp" class="form-text text-warning">
                            <?php echo $errors['image'];?>
                        </small>
                    <?php else:?>
                        <small id="imageHelp" class="form-text text-muted">
                            Selecione uma imagem de capa para o serviço.
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
						   maxlength="70"
						   value="<?php echo set_value('title');?>">
					<?php if(isset($errors['title'])):?>
						<small id="titleHelp" class="form-text text-warning">
							<?php echo $errors['title'];?>
						</small>
					<?php else:?>
						<small id="titleHelp" class="form-text text-muted">
							Digite o Título com no máximo 70 caracteres.
						</small>
					<?php endif;?>
				</div>

                <div class="form-group">
                    <label for="description">Descrição*</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           name="description"
                           aria-describedby="descriptionHelp"
                           placeholder="Descrição"
                           maxlength="160"
                           value="<?php echo set_value('description');?>">
                    <?php if(isset($errors['description'])):?>
                        <small id="descriptionHelp" class="form-text text-warning">
                            <?php echo $errors['description'];?>
                        </small>
                    <?php else:?>
                        <small id="titleHelp" class="form-text text-muted">
                            Digite uma descrição breve com no máximo 160 caracteres, que será mostrada pelo google.
                        </small>
                    <?php endif;?>
                </div>

                <div class="form-group">
                    <label for="keywords">Palavras Chave</label>
                    <input type="text"
                           class="form-control"
                           id="keywords"
                           name="keywords"
                           aria-describedby="keywordsHelp"
                           placeholder="Palavras Chave"
                           maxlength="100"
                           value="<?php echo set_value('keywords');?>">
                    <?php if(isset($errors['keywords'])):?>
                        <small id="keywordsHelp" class="form-text text-warning">
                            <?php echo $errors['keywords'];?>
                        </small>
                    <?php else:?>
                        <small id="keywordsHelp" class="form-text text-muted">
                            Digite até 10 palavras chaves separadas por virgula (,).
                        </small>
                    <?php endif;?>
                </div>

                <div class="form-group">
                    <label for="author">Autor</label>
                    <input type="text"
                           class="form-control"
                           id="author"
                           name="author"
                           aria-describedby="authorHelp"
                           placeholder="Autor"
                           maxlength="50"
                           value="<?php echo set_value('author', 'Encom Energia');?>">
                    <?php if(isset($errors['author'])):?>
                        <small id="authorHelp" class="form-text text-warning">
                            <?php echo $errors['author'];?>
                        </small>
                    <?php else:?>
                        <small id="authorHelp" class="form-text text-muted">
                            Digite o nome do autor deste texto.
                        </small>
                    <?php endif;?>
                </div>

                <div class="form-group">
                    <label for="content">Conteúdo</label>
                    <textarea class="ckeditor"
                              id="content"
                              name="content"
                              aria-describedby="contentHelp"
                              placeholder="Conteúdo"><?php echo set_value('content');?></textarea>
                    <?php if(isset($errors['content'])):?>
                        <small id="contentHelp" class="form-text text-warning">
                            <?php echo $errors['content'];?>
                        </small>
                    <?php else:?>
                        <small id="contentHelp" class="form-text text-muted">
                            Digite o conteúdo do texto/página.
                        </small>
                    <?php endif;?>
                </div>

				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" name="active" id="active" <?php echo set_checkbox('active', '1', true);?>>
						<label class="form-check-label" for="active">
							Ativo
						</label>
					</div>
				</div>
                <button type="submit" class="btn btn-block btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
