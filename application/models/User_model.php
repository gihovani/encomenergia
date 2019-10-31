<?php
/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 */

class User_model extends MY_Model
{
	protected $table = 'users';

	public $id = 0;
	public $name = '';
	public $login = '';
	public $admin = 0;
	public $password = '';
	public $created_at = '';
	public $updated_at = '';

	protected function setDataFromPost()
	{
		$this->name = $this->input->post('name');
		$this->login = $this->input->post('login');
		$this->password = $this->input->post('password');
		$this->admin = $this->input->post('admin');
	}
	public function update($id)
	{
		$this->setDataFromPost();
		if ($this->timestamps) {
			$this->updated_at = CURRENT_DATETIME;
		}

		unset($this->id, $this->created_at);
		if (!isset($_POST['admin'])) {
			unset($this->admin);
		}
		return $this->db->update($this->table, $this, [$this->primaryKey => $id]);
	}
	public function login()
	{
		$this->setDataFromPost();
		$items = $this->items(['login' => $this->login, 'password' => $this->password]);
		return count($items) ? $items[0] : null;
	}
}
