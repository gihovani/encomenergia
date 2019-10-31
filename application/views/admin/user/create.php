<div class="container">
    <div class="row justify-content-center mt-lg-5">
        <div class="col-6">
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
            <form method="post" action="<?php echo site_url('users/create');?>">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           aria-describedby="nameHelp"
                           placeholder="Nome"
                           value="<?php echo set_value('nome');?>">
                    <?php if(isset($errors['name'])):?>
                        <small id="nameHelp" class="form-text text-warning">
                            <?php echo $errors['name'];?>
                        </small>
                    <?php else:?>
                        <small id="nameHelp" class="form-text text-muted">
                            Digite como você gosta de ser chamado.
                        </small>
                    <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="login">Login*</label>
                    <input type="text"
                           class="form-control"
                           id="login"
                           name="login"
                           aria-describedby="loginHelp"
                           placeholder="Login"
                           value="<?php echo set_value('login');?>">
                    <?php if(isset($errors['login'])):?>
                        <small id="loginHelp" class="form-text text-warning">
                            <?php echo $errors['login'];?>
                        </small>
                    <?php else:?>
                        <small id="loginHelp" class="form-text text-muted">
                            Digite seu login de acesso ao painel.
                        </small>
                    <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="password">Senha*</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           aria-describedby="passwordHelp"
                           placeholder="Senha"
                           value="<?php echo set_value('password');?>">
                    <?php if(isset($errors['password'])):?>
                        <small id="passwordHelp" class="form-text text-warning">
                            <?php echo $errors['password'];?>
                        </small>
                    <?php else:?>
                        <small id="passwordHelp" class="form-text text-muted">
                            Digite seu senha, com pelo menos 6 digitos.
                        </small>
                    <?php endif;?>
                </div>

				<?php if($login->admin):?>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" name="admin" id="admin" <?php echo set_checkbox('admin', '1', false);?>>
						<label class="form-check-label" for="active">
							Admin
						</label>
					</div>
				</div>
				<?php endif;?>
                <button type="submit" class="btn btn-block btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
