<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="table-responsive-lg">
                <table class="table table-striped">
                    <caption>Lista de Usuários: (<?php echo isset($count) ? intval($count) : 0 ?>)</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Login</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($items) && count($items)):?>
                    <?php foreach ($items as $item):?>
                    <tr>
                        <th scope="row"><?php echo $item->id;?></th>
                        <td><?php echo $item->name;?></td>
                        <td><?php echo $item->login;?></td>
                        <td>
                            <a href="<?php echo site_url('users/update/'.$item->id);?>">Editar</a> -
							<a href="<?php echo site_url('users/delete/'.$item->id);?>" onclick="return confirm('Tem certeza que deseja remover este usuário?');">Remover</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>
                    <tr>
                        <td class="text-center" colspan="4">nenhum registro encontrado.</td>
                    </tr>
                    <?php endif;?>
                    </tbody>
                    <?php if(isset($pagination) && $pagination):?>
                        <tfoot>
                        <tr>
                            <td colspan="5"><?php echo $pagination->create_links();?></td>
                        </tr>
                        </tfoot>
                    <?php endif;?>
                </table>
            </div>
        </div>
    </div>
</div>
