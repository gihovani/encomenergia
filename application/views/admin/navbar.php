<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url('assets/img/encom_logo.svg');?>" width="30" height="30" class="d-inline-block align-top" alt="Encom Logo">
                    Encom
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item<?php echo ($menuActive === 'dashboard') ? ' active' : '' ;?>">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown<?php echo ($menuActive === 'posts') ? ' active' : '' ;?>">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarPosts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notícias
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarPosts">
                                <a class="dropdown-item" href="<?php echo site_url('posts/create');?>">Nova Notícia</a>
                                <a class="dropdown-item" href="<?php echo site_url('posts/index');?>">Listar Todas</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown<?php echo ($menuActive === 'banners') ? ' active' : '' ;?>">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarBanners" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Banners
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarBanners">
                                <a class="dropdown-item" href="<?php echo site_url('banners/create');?>">Novo Banner</a>
                                <a class="dropdown-item" href="<?php echo site_url('banners/index');?>">Listar Todos</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('contacts/index');?>">Contatos</a>
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
