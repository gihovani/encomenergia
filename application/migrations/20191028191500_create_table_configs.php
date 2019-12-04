<?php

/**
 * Class Migration_Create_table_configs
 * @property CI_DB_forge dbforge
 * @property Config_model $config_model
 * @property CI_Loader $load
 */
class Migration_Create_table_configs extends CI_Migration
{

	public function __construct($config = [])
	{
		parent::__construct($config);
		$this->load->model('config_model');
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
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE,
			],
			'whatsapp' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE,
			],
			'facebook' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
			],
			'instagram' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
			],
			'youtube' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
			],
			'googlemap' => [
				'type' => 'VARCHAR',
				'constraint' => '5000',
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
		$this->dbforge->create_table('configs', TRUE);
	}

	private function addEntries()
	{
		$_POST = [
			'email' => 'gihovani@gg2.com.br',
			'phone' => '(61) 3234-0202',
			'facebook' => 'https://facebook.com/encomenergia',
			'instagram' => 'https://instagram.com/encomenergia',
			'youtube' => 'https://youtube.com/encomenergia'
		];
		$this->config_model->insert();
	}

	public function down()
	{
		$this->dbforge->drop_table('configs', TRUE);
	}
}
