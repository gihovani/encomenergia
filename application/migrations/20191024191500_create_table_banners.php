<?php

/**
 * Class Migration_Create_table_pages
 * @property CI_DB_forge dbforge
 * @property Banner_model $banner_model
 * @property CI_Loader $load
 */
class Migration_Create_table_banners extends CI_Migration
{

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->load->model('banner_model');
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
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
        $this->dbforge->create_table('banners', TRUE);
    }

    private function addEntries()
    {
        for($i=1;$i<=5;$i++) {
			$_POST = [
				'title' => 'Banner 0'.$i,
				'link' => base_url(),
				'image' => 'banner.png'
			];
			$this->banner_model->insert();
		}
    }

    public function down()
    {
        $this->dbforge->drop_table('banners', TRUE);
    }
}
