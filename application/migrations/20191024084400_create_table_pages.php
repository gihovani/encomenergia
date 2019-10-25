<?php

/**
 * Class Migration_Create_table_pages
 * @property CI_DB_forge dbforge
 * @property Page_model $page_model
 * @property CI_Loader $load
 */
class Migration_Create_table_pages extends CI_Migration
{

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->load->model('page_model');
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
        $this->dbforge->create_table('pages', TRUE);
    }

    private function addEntries()
    {
        $data = [];
        for ($i=0;$i<10;$i++) {
            $data[] = [
                'type' => 'post',
                'title' => 'Esse é um teste do Gg2 - '.$i,
                'keywords' => 'The sea desires with amnesty, taste the cook islands.',
                'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
                'content' => '<h2>Titulo '.$i.'</h2><p>The sea desires with amnesty, taste the cook islands.</p><p>The sea desires with amnesty, taste the cook islands.</p>'
            ];
        }
        $data[] = [
            'type' => 'page',
            'slug' => 'home',
            'title' => 'Página Inicial',
            'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
            'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
            'content' => ''
        ];
        $data[] = [
            'type' => 'page',
            'slug' => 'about',
            'title' => 'Sobre a Encom Energia',
            'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
            'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
            'content' => ''
        ];
        $data[] = [
            'type' => 'page',
            'slug' => 'posts',
            'title' => 'Veja todas as Notícias',
            'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
            'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
            'content' => ''
        ];
        $data[] = [
            'type' => 'page',
            'slug' => 'contact',
            'title' => 'Fale Conosco',
            'keywords' => 'Página Inicial, Encom Energia, Energia Solar, Energia Eólica',
            'description' => 'The sea desires with amnesty, taste the cook islands, The sea desires with amnesty, taste the cook islands.',
            'content' => ''
        ];
        foreach ($data as $entry) {
            $_POST = $entry;
            $this->page_model->insert();
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('pages', TRUE);
    }
}
