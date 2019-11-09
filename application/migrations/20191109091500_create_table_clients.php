<?php

/**
 * Class Migration_Create_table_clients
 * @property CI_DB_forge dbforge
 * @property Client_model $client_model
 * @property CI_Loader $load
 */
class Migration_Create_table_clients extends CI_Migration
{

	public function __construct($config = [])
	{
		parent::__construct($config);
		$this->load->model('client_model');
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
			'category' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE,
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
		$this->dbforge->create_table('clients', TRUE);
	}

	private function addEntries()
	{
		for ($i = 1; $i <= 5; $i++) {
			$_POST = [
				'category' => 'Teste',
				'title' => 'Cliente 0' . $i,
				'link' => base_url(),
				'image' => 'client.jpg'
			];
			$this->client_model->insert();
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('clients', TRUE);
	}
}
