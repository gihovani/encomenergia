<?php
$config = [
    'pages/contact_submit' => [
        ['field' => 'name', 'label' => 'Nome', 'rules' => 'required'],
        ['field' => 'email', 'label' => 'E-mail', 'rules' => 'required|valid_email'],
        ['field' => 'message', 'label' => 'Mensagem', 'rules' => 'required']
    ],
    'login/index' => [
        ['field' => 'login', 'label' => 'Login', 'rules' => 'required|callback_login_check'],
        ['field' => 'password', 'label' => 'Senha', 'rules' => 'required']
    ],
    'users/create' => [
        ['field' => 'name', 'label' => 'Nome', 'rules' => 'trim|max_length[50]'],
        ['field' => 'login', 'label' => 'Login', 'rules' => 'required|is_unique[users.login]|max_length[50]'],
        ['field' => 'password', 'label' => 'Senha', 'rules' => 'required|max_length[50]']
    ],
    'users/update' => [
        ['field' => 'name', 'label' => 'Nome', 'rules' => 'trim|max_length[50]'],
        ['field' => 'login', 'label' => 'Login', 'rules' => 'required|max_length[50]'],
        ['field' => 'password', 'label' => 'Senha', 'rules' => 'required|max_length[50]']
    ],
    'posts/create' => [
        ['field' => 'type', 'label' => 'Tipo', 'rules' => 'trim|required|callback_doUpload'],
        ['field' => 'title', 'label' => 'Título', 'rules' => 'trim|required|max_length[70]|is_unique[posts.title]'],
        ['field' => 'description', 'label' => 'Descrição', 'rules' => 'trim|required|max_length[160]'],
        ['field' => 'keywords', 'label' => 'Palavras Chave', 'rules' => 'trim|max_length[100]'],
        ['field' => 'author', 'label' => 'Autor', 'rules' => 'trim|max_length[50]'],
        ['field' => 'content', 'label' => 'Conteúdo', 'rules' => 'trim'],
        ['field' => 'styles', 'label' => 'Estilo CSS', 'rules' => 'trim'],
        ['field' => 'scripts', 'label' => 'Script JS', 'rules' => 'trim']
    ],
    'posts/update' => [
		['field' => 'type', 'label' => 'Tipo', 'rules' => 'trim|required|callback_doUpload'],
		['field' => 'title', 'label' => 'Título', 'rules' => 'trim|required|max_length[70]'],
		['field' => 'description', 'label' => 'Descrição', 'rules' => 'trim|required|max_length[160]'],
		['field' => 'keywords', 'label' => 'Palavras Chave', 'rules' => 'trim|max_length[100]'],
		['field' => 'author', 'label' => 'Autor', 'rules' => 'trim|max_length[50]'],
		['field' => 'content', 'label' => 'Conteúdo', 'rules' => 'trim'],
		['field' => 'styles', 'label' => 'Estilo CSS', 'rules' => 'trim'],
		['field' => 'scripts', 'label' => 'Script JS', 'rules' => 'trim']
    ],
    'banners/create' => [
        ['field' => 'title', 'label' => 'Título', 'rules' => 'trim|max_length[70]|required|callback_doUpload'],
        ['field' => 'link', 'label' => 'Link', 'rules' => 'trim|max_length[200]'],
    ],
    'banners/update' => [
		['field' => 'title', 'label' => 'Título', 'rules' => 'trim|max_length[70]|required|callback_doUpload'],
		['field' => 'link', 'label' => 'Link', 'rules' => 'trim|max_length[200]'],
    ],
    'contacts/create' => [
        ['field' => 'name', 'label' => 'Nome', 'rules' => 'trim|max_length[50]|required'],
        ['field' => 'email', 'label' => 'E-mail', 'rules' => 'trim|max_length[200]|valid_email|required'],
        ['field' => 'phone', 'label' => 'Telefone', 'rules' => 'trim|max_length[20]'],
        ['field' => 'message', 'label' => 'Mensagem', 'rules' => 'trim|max_length[65000]'],
    ],
    'contacts/update' => [
        ['field' => 'name', 'label' => 'Nome', 'rules' => 'trim|max_length[50]|required'],
        ['field' => 'email', 'label' => 'E-mail', 'rules' => 'trim|max_length[200]|valid_email|required'],
        ['field' => 'phone', 'label' => 'Telefone', 'rules' => 'trim|max_length[20]'],
        ['field' => 'message', 'label' => 'Mensagem', 'rules' => 'trim|max_length[65000]'],
    ],
	'images/cut' => [
		['field' => 'image', 'label' => 'Imagem', 'rules' => 'trim|required|min_length[5]'],
		['field' => 'x1', 'label' => 'X1', 'rules' => 'trim|required'],
		['field' => 'x2', 'label' => 'X2', 'rules' => 'trim|required'],
		['field' => 'y1', 'label' => 'Y1', 'rules' => 'trim|required'],
		['field' => 'y2', 'label' => 'Y2', 'rules' => 'trim|required'],
		['field' => 'width', 'label' => 'Largura', 'rules' => 'trim|required'],
		['field' => 'height', 'label' => 'Altura', 'rules' => 'trim|required'],
	]
];
