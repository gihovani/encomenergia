<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?php echo site_url('login');?>">
                    <img src="<?php echo base_url('assets/img/encom_logo.svg');?>" width="30" height="30" class="d-inline-block align-top" alt="Encom Logo">
                    Encom
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
						<li class="nav-item dropdown<?php echo ($menuActive === 'posts') ? ' active' : '' ;?>">
							<a class="nav-link dropdown-toggle" href="#" id="navbarPosts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Notícias
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarPosts">
								<a class="dropdown-item" href="<?php echo site_url('posts/create');?>">Nova Notícia</a>
								<a class="dropdown-item" href="<?php echo site_url('posts/index');?>">Listar Todas</a>
							</div>
						</li>


						<li class="nav-item dropdown<?php echo ($menuActive === 'clients') ? ' active' : '' ;?>">
							<a class="nav-link dropdown-toggle" href="#" id="navbarClients" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Portfólios
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarClients">
								<a class="dropdown-item" href="<?php echo site_url('clients/create');?>">Novo Portfólio</a>
								<a class="dropdown-item" href="<?php echo site_url('clients/index');?>">Listar Todos</a>
							</div>
						</li>

						<li class="nav-item dropdown<?php echo ($menuActive === 'services') ? ' active' : '' ;?>">
							<a class="nav-link dropdown-toggle" href="#" id="navbarServices" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Serviços
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarServices">
								<a class="dropdown-item" href="<?php echo site_url('services/create');?>">Novo Serviço</a>
								<a class="dropdown-item" href="<?php echo site_url('services/index');?>">Listar Todos</a>
							</div>
						</li>
						<li class="nav-item dropdown<?php echo ($menuActive === 'pages') ? ' active' : '' ;?>">
							<a class="nav-link dropdown-toggle" href="#" id="navbarPages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Páginas
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarPages">
								<a class="dropdown-item" href="<?php echo site_url('pages/create');?>">Nova Página</a>
								<a class="dropdown-item" href="<?php echo site_url('pages/index');?>">Listar Todas</a>
							</div>
						</li>

						<li class="nav-item dropdown<?php echo ($menuActive === 'users') ? ' active' : '' ;?>">
							<a class="nav-link dropdown-toggle" href="#" id="navbarUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Usuários
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarUsers">
								<a class="dropdown-item" href="<?php echo site_url('users/create');?>">Novo Usuário</a>
								<a class="dropdown-item" href="<?php echo site_url('users/index');?>">Listar Todos</a>
							</div>
						</li>

						<?php if($login->admin):?>
							<li class="nav-item dropdown<?php echo ($menuActive === 'cms') ? ' active' : '' ;?>">
								<a class="nav-link dropdown-toggle" href="#" id="navbarCms" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									CMS
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarCms">
									<a class="dropdown-item" href="<?php echo site_url('cms/create');?>">Nova Página</a>
									<a class="dropdown-item" href="<?php echo site_url('cms/index');?>">Listar Todas</a>
								</div>
							</li>
						<?php endif;?>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarMore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Mais
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarMore">
								<a class="dropdown-item" href="<?php echo site_url('configs/update/1');?>">Configurações</a>
								<a class="dropdown-item" href="<?php echo site_url('contacts/index');?>">Contatos</a>
								<a class="dropdown-item" href="<?php echo base_url();?>">Visitar Site</a>
							</div>
						</li>
                    </ul>
                    <div class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                        Olá <?php echo ellipsize($login->name, 15);?>.
                    </div>
                    <a class="btn btn-info d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="<?php echo site_url('login/logout');?>">Logout</a>
                </div>
            </nav>
        </div>
    </div>
</div>
