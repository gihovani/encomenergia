<?php

/**
 * Class Migration_Create_table_contacts
 * @property CI_DB_forge dbforge
 * @property Contact_model $contact_model
 * @property CI_Loader $load
 */
class Migration_Create_table_contacts extends CI_Migration
{

	public function __construct($config = [])
	{
		parent::__construct($config);
		$this->load->model('contact_model');
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
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE,
			],
			'message' => [
				'type' => 'TEXT',
				'null' => NULL,
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
		$this->dbforge->create_table('contacts', TRUE);
	}

	private function addEntries()
	{
		$_POST = [
			'name' => 'Gihovani Filipp',
			'email' => 'gihovani@gg2.com.br',
			'phone' => '(48) 99666-6667',
			'message' => 'Try grilling kebab decorateed with olive oil, blended with lime.'
		];
		$this->contact_model->insert();
	}

	public function down()
	{
		$this->dbforge->drop_table('contacts', TRUE);
	}
}
