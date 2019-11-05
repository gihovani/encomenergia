<div class="container">
    <div class="row">
        <div class="col">
            <div class="table-responsive-lg">
                <table class="table table-striped">
                    <caption>Lista de Contatos: (<?php echo isset($count) ? intval($count) : 0 ?>)</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
						<th scope="col">E-mail</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Instagram</th>
						<th scope="col">Facebook</th>
						<th scope="col">Youtube</th>
						<th scope="col">WhatsApp</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($items) && count($items)):?>
                    <?php foreach ($items as $item):?>
                    <tr>
                        <th scope="row"><?php echo $item->id;?></th>
                        <td><?php echo $item->email;?></td>
						<td><?php echo $item->phone;?></td>
						<td><?php echo $item->instagram;?></td>
						<td><?php echo $item->facebook;?></td>
						<td><?php echo $item->youtube;?></td>
						<td><?php echo $item->whatsapp;?></td>
                        <td>
                            <a href="<?php echo site_url('configs/update/'.$item->id);?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>
                    <tr>
                        <td class="text-center" colspan="5">nenhum registro encontrado.</td>
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
