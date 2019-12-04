<?php

/**
 * Class Migration_Create_table_posts
 * @property CI_DB_forge dbforge
 * @property Post_model $post_model
 * @property CI_Loader $load
 */
class Migration_Create_table_posts extends CI_Migration
{

	public function __construct($config = [])
	{
		parent::__construct($config);
		$this->load->model('post_model');
	}

	public function up()
	{
		$this->createTable();
		$this->addEntries();
	}

	private function createTable()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
			],
			'thumbnail' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '70',
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => '160',
				'null' => TRUE,
			],
			'keywords' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			],
			'author' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE,
			],
			'content' => [
				'type' => 'MEDIUMTEXT',
				'null' => TRUE,
			],
			'styles' => [
				'type' => 'MEDIUMTEXT',
				'null' => TRUE,
			],
			'scripts' => [
				'type' => 'MEDIUMTEXT',
				'null' => TRUE,
			],
			'active' => [
				'type' => 'TINYINT',
				'DEFAULT' => 0
			],
			'created_at' => [
				'type' => 'timestamp',
				'null' => TRUE,
			],
			'updated_at' => [
				'type' => 'timestamp',
				'null' => TRUE,
			]
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('posts', TRUE);
	}

	private function addEntries()
	{
		$data = [];
		$data[] = [
			'active' => 1,
			'type' => 'post',
			'image' => 'news-1.png',
			'title' => 'Aneel',
			'keywords' => 'The sea desires with amnesty, taste the cook islands.',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => '<h2>Titulo Aneel</h2><p>The sea desires with amnesty, taste the cook islands.</p><p>The sea desires with amnesty, taste the cook islands.</p>'
		];
		$data[] = [
			'active' => 1,
			'type' => 'post',
			'image' => 'news-1.png',
			'title' => 'Geradores Turbogeradores',
			'keywords' => 'The sea desires with amnesty, taste the cook islands.',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => '<h2>Titulo Geradores Turbogeradores</h2><p>The sea desires with amnesty, taste the cook islands.</p><p>The sea desires with amnesty, taste the cook islands.</p>'
		];
		$data[] = [
			'active' => 1,
			'type' => 'post',
			'image' => 'news-1.png',
			'title' => 'Fovoltaica',
			'keywords' => 'The sea desires with amnesty, taste the cook islands.',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => '<h2>Titulo Fovoltaica</h2><p>The sea desires with amnesty, taste the cook islands.</p><p>The sea desires with amnesty, taste the cook islands.</p>'
		];
		$data[] = [
			'active' => 1,
			'type' => 'post',
			'image' => 'news-1.png',
			'title' => 'Seu Dinheiro',
			'keywords' => 'The sea desires with amnesty, taste the cook islands.',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => '<h2>Titulo Seu Dinheiro</h2><p>The sea desires with amnesty, taste the cook islands.</p><p>The sea desires with amnesty, taste the cook islands.</p>'
		];
		$data[] = [
			'active' => 1,
			'type' => 'service',
			'title' => 'Engenharia Civil',
			'image' => 'engenharia-civil.png',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.'
		];
		$data[] = [
			'active' => 1,
			'type' => 'service',
			'title' => 'Engenharia de Automação',
			'image' => 'engenharia-auto.png',
			'keywords' => 'Engenharia de Automação, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.'
		];
		$data[] = [
			'active' => 1,
			'type' => 'service',
			'title' => 'Engenharia de Energia',
			'image' => 'engenharia-energia.png',
			'keywords' => 'Engenharia de Energia, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.'
		];
		$data[] = [
			'active' => 1,
			'type' => 'service',
			'title' => 'Engenharia Fotovoltáica',
			'image' => 'engenharia-fotovoltaica.png',
			'keywords' => 'Engenharia de Fotovoltáica, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.'
		];
		$data[] = [
			'active' => 1,
			'type' => 'service',
			'title' => 'Engenharia de Manutenção',
			'image' => 'engenharia-manutencao.png',
			'keywords' => 'Engenharia de Manutenção, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.'
		];
		$data[] = [
			'active' => 1,
			'type' => 'service',
			'title' => 'Engenharia de Telecomunicação',
			'image' => 'engenharia-telecomunic.png',
			'keywords' => 'Engenharia de Telecomunicação, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.'
		];
		$data[] = [
			'active' => 1,
			'type' => 'service',
			'title' => 'Engenharia Elétrica',
			'image' => 'engenharia-eletrica.png',
			'keywords' => 'Engenharia de Telecomunicação, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.'
		];
		$data[] = [
			'active' => 1,
			'type' => 'service',
			'title' => 'Engenharia Mecânica',
			'image' => 'engenharia-mecanica.png',
			'keywords' => 'Engenharia Mecânica, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.'
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'slug' => 'home',
			'title' => 'Página Inicial',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'title' => 'Quem  Somos',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'title' => 'Onde Atuamos',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'title' => 'Compliance',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'title' => 'Contato',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'title' => 'Portfólio',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'title' => 'Onde Atuamos',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'slug' => 'noticias',
			'title' => 'Veja todas as Notícias',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'slug' => 'servicos',
			'title' => 'Serviços de Engenharia',
			'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];
		$data[] = [
			'active' => 1,
			'type' => 'page',
			'slug' => 'buscar',
			'title' => 'Buscar ',
			'keywords' => 'Página Pesquisa, Encom Energia, Energia Solar, Energia Eólica',
			'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
			'content' => ''
		];

		foreach ($data as $entry) {
			$_POST = $entry;
			$this->post_model->insert();
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('posts', TRUE);
	}
}
