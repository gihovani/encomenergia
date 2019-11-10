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
            <form method="post" action="<?php echo site_url('configs/update/'.$item->id);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">E-mail*</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           aria-describedby="emailHelp"
                           placeholder="E-mail"
                           maxlength="200"
                           value="<?php echo set_value('email', $item->email);?>">
                    <?php if(isset($errors['email'])):?>
                        <small id="emailHelp" class="form-text text-warning">
                            <?php echo $errors['email'];?>
                        </small>
                    <?php endif;?>
                </div>

                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="text"
                           class="form-control"
                           id="phone"
                           name="phone"
                           aria-describedby="phoneHelp"
                           placeholder="Telefone"
                           maxlength="20"
                           value="<?php echo set_value('phone', $item->phone);?>">
                    <?php if(isset($errors['phone'])):?>
                        <small id="phoneHelp" class="form-text text-warning">
                            <?php echo $errors['phone'];?>
                        </small>
                    <?php endif;?>
                </div>

				<div class="form-group">
					<label for="facebook">Facebook</label>
					<input type="url"
						   class="form-control"
						   id="facebook"
						   name="facebook"
						   aria-describedby="facebookHelp"
						   placeholder="Facebook"
						   maxlength="200"
						   value="<?php echo set_value('facebook', $item->facebook);?>">
					<?php if(isset($errors['facebook'])):?>
						<small id="facebookHelp" class="form-text text-warning">
							<?php echo $errors['facebook'];?>
						</small>
					<?php endif;?>
				</div>

				<div class="form-group">
					<label for="instagram">Instagram</label>
					<input type="url"
						   class="form-control"
						   id="instagram"
						   name="instagram"
						   aria-describedby="instagramHelp"
						   placeholder="Instagram"
						   maxlength="200"
						   value="<?php echo set_value('instagram', $item->instagram);?>">
					<?php if(isset($errors['instagram'])):?>
						<small id="instagramHelp" class="form-text text-warning">
							<?php echo $errors['instagram'];?>
						</small>
					<?php endif;?>
				</div>

				<div class="form-group">
					<label for="youtube">Youtube</label>
					<input type="url"
						   class="form-control"
						   id="youtube"
						   name="youtube"
						   aria-describedby="youtubeHelp"
						   placeholder="Youtube"
						   maxlength="200"
						   value="<?php echo set_value('youtube', $item->youtube);?>">
					<?php if(isset($errors['youtube'])):?>
						<small id="youtubeHelp" class="form-text text-warning">
							<?php echo $errors['youtube'];?>
						</small>
					<?php endif;?>
				</div>

				<div class="form-group">
					<label for="whatsapp">WhatsApp (Telefone)</label>
					<input type="tel"
						   class="form-control"
						   id="whatsapp"
						   name="whatsapp"
						   aria-describedby="whatsappHelp"
						   placeholder="WhatsApp"
						   maxlength="20"
						   value="<?php echo set_value('whatsapp', $item->whatsapp);?>">
					<?php if(isset($errors['whatsapp'])):?>
						<small id="whatsappHelp" class="form-text text-warning">
							<?php echo $errors['whatsapp'];?>
						</small>
					<?php endif;?>
				</div>
                <button type="submit" class="btn btn-block btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
