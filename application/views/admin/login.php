<div class="container">
    <div class="row justify-content-center mt-5 pt-5">
        <section class="col-6 section-login">
            <?php if(isset($errors) && $errors):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Login ou Senha incorretos.</strong><br/>
                Por favor, verifique-as e tente novamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif;?>
            <form method="post" action="<?php echo site_url('login/index');?>">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text"
                           class="form-control"
                           id="login"
                           name="login"
                           aria-describedby="loginHelp"
                           placeholder="Login"
                           value="<?php echo set_value('login');?>">
                    <small id="loginHelp" class="form-text text-muted">
                        Digite seu login/usuário de acesso ao painel.
                    </small>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Senha"
                           value="<?php echo set_value('password');?>">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Entrar</button>
            </form>
        </section>
    </div>
</div>
