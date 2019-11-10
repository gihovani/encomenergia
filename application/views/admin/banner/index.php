<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="table-responsive-lg">
                <table class="table table-striped">
                    <caption>Lista de Banners: (<?php echo isset($count) ? intval($count) : 0 ?>)</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Título</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($items) && count($items)):?>
                    <?php foreach ($items as $item):?>
                    <tr>
                        <th scope="row"><?php echo $item->id;?></th>
                        <td><?php if ($item->getImageUrl()):?>
								<img src="<?php echo $item->getImageUrl();?>" class="img-responsive" style="max-width: 200px" />
							<?php endif;?></td>
                        <td><?php echo $item->title;?></td>
                        <td>
                            <a href="<?php echo site_url('banners/update/'.$item->id);?>">Editar</a>
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
