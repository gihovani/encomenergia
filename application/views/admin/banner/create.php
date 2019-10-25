<div class="container">
    <div class="row mt-lg-5">
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
            <form method="post" action="<?php echo site_url('banners/create');?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="image">
                        Imagem
                    </label>
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
                    <label for="link">Link</label>
                    <input type="text"
                           class="form-control"
                           id="link"
                           name="link"
                           aria-describedby="linkHelp"
                           placeholder="Link"
                           maxlength="200"
                           value="<?php echo set_value('link');?>">
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
