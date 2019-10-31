<?php

/**
 * Class Migration_Create_table_pages
 * @property CI_DB_forge dbforge
 * @property User_model $user_model
 * @property CI_Loader $load
 */
class Migration_Create_table_users extends CI_Migration
{

	public function __construct($config = [])
	{
		parent::__construct($config);
		$this->load->model('user_model');
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
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE,
			],
			'login' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'admin' => [
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
		$this->dbforge->create_table('users', TRUE);
	}

	private function addEntries()
	{
		$_POST = [
			'name' => 'Gihovani Filipp',
			'login' => 'gihovani',
			'password' => '12456',
			'admin' => 1
		];
		$this->user_model->insert();
	}

	public function down()
	{
		$this->dbforge->drop_table('users', TRUE);
	}
}
