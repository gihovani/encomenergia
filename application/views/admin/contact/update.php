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
            <form method="post" action="<?php echo site_url('contacts/update/'.$item->id);?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name">Nome*</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           aria-describedby="nameHelp"
                           placeholder="Nome"
                           maxlength="50"
                           value="<?php echo set_value('name', $item->name);?>">
                    <?php if(isset($errors['name'])):?>
                        <small id="nameHelp" class="form-text text-warning">
                            <?php echo $errors['name'];?>
                        </small>
                    <?php endif;?>
                </div>

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
                    <label for="message">Mensagem</label>
                    <textarea class="form-control"
                              id="message"
                              name="message"
                              aria-describedby="messageHelp"
                              placeholder="Mensagem"><?php echo set_value('message', $item->message);?></textarea>
                    <?php if(isset($errors['message'])):?>
                        <small id="messageHelp" class="form-text text-warning">
                            <?php echo $errors['message'];?>
                        </small>

                    <?php endif;?>
                </div>

                <button type="submit" class="btn btn-block btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
